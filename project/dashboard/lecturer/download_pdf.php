<?php

session_start();

require('fpdf/fpdf.php'); 
include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['lecturer_id'])) {
    $lecturer_id = $_SESSION['lecturer_id'];
} else {
    echo json_encode(["success" => false, "message" => "Unauthorized access. Please log in."]);
    exit();
}

$filter = $_POST['filter'];

$dateQuery = "";
if ($filter === "semester") {

    if (!isset($_POST['semester_start_date'], $_POST['semester_end_date'])) {
        die("Missing semester dates.");
    }

    $startDate = $_POST['semester_start_date']; 
    $endDate = $_POST['semester_end_date']; 

    if (strpos($startDate, '/') !== false) { 
        $startDateObj = DateTime::createFromFormat('m/d/Y', $startDate);
        $endDateObj = DateTime::createFromFormat('m/d/Y', $endDate);

        if ($startDateObj === false || $endDateObj === false) {
            die("Invalid date format. Please use MM/DD/YYYY.");
        }

        $startDate = $startDateObj->format('Y-m-d');
        $endDate = $endDateObj->format('Y-m-d');
    }
    
    $dateQuery = "DATE(`timestamp`) BETWEEN '$startDate' AND '$endDate'";
} else {
    die("Invalid filter value.");
}

// Get data from request
$course = isset($_POST['course']) ? $_POST['course'] : "N/A";
$lecturer_name = $_SESSION['lecturer_name'];

// Query to get student attendance records
$sql = "SELECT student_name, student_reg_no, department, level, COUNT(*) AS attendance_count
        FROM attendance
        WHERE lecturer_id = '$lecturer_id' 
          AND $dateQuery
        GROUP BY student_name, student_reg_no, department, level
        ORDER BY student_name ASC";

$result = $conn->query($sql);

// Create a PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// Report Title
$pdf->Cell(190, 10, 'Student Attendance Report', 0, 1, 'C');
$pdf->Ln(5);

// Report Details
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Course: ' . $course, 0, 1);
$pdf->Cell(50, 10, 'Lecturer: ' . $lecturer_name, 0, 1);
$pdf->Cell(50, 10, 'Date range: ' . $startDate . ' - ' . $endDate, 0, 1);
$pdf->Cell(50, 10, 'Semester: ____________________', 0, 1);
$pdf->Cell(50, 10, 'Session: ____________________', 0, 1);
$pdf->Ln(10);

// Table Header
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, 'S/N', 1);
$pdf->Cell(50, 10, 'Student Name', 1);
$pdf->Cell(35, 10, 'Reg No', 1);
$pdf->Cell(25, 10, 'Department', 1);
$pdf->Cell(20, 10, 'Level', 1);
$pdf->Cell(25, 10, 'Attendance', 1);
$pdf->Cell(30, 10, 'Remark', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);

// Table Rows
$sn = 1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(10, 10, $sn, 1);
        $pdf->Cell(50, 10, $row['student_name'], 1);
        $pdf->Cell(35, 10, $row['student_reg_no'], 1);
        $pdf->Cell(25, 10, $row['department'], 1);
        $pdf->Cell(20, 10, $row['level'], 1);
        $pdf->Cell(25, 10, $row['attendance_count'], 1);
        $pdf->Cell(30, 10, '', 1);
        $pdf->Ln();
        $sn++;
    }
} else {
    $pdf->Cell(190, 10, 'No records found', 1, 1, 'C');
}

// Output PDF
$pdf->Output('D', 'Attendance_Report.pdf'); // Force Download

$conn->close();
exit();
?>
