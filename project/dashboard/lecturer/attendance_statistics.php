<?php
session_start();

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

if (!isset($_POST['dept'], $_POST['lvl'], $_POST['course'], $_POST['filter'])) {
    die("Invalid request.");
}

$department = $_POST['dept'];
$level = $_POST['lvl'];
$course = $_POST['course'];
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

$sql = "SELECT student_name, student_reg_no, department, level, COUNT(*) AS attendance_count
        FROM attendance
        WHERE lecturer_id = '$lecturer_id' 
          AND $dateQuery AND course = '$course'
        GROUP BY student_name, student_reg_no, department, level
        ORDER BY student_name ASC";

$result = $conn->query($sql);

$output = "<h2>Student Attendance Report</h2>
            <div id='report'>
            <table id='result_table'>
               <tr>
                   <th>S/N</th>
                   <th>Student Name</th>
                   <th>Reg No</th>
                   <th>Department</th>
                   <th>Level</th>
                   <th>Attendance Count</th>
               </tr>";

if ($result && $result->num_rows > 0) {
    $sn = 1;
    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>
                        <td>" . $sn . "</td>
                        <td>" . htmlspecialchars($row['student_name']) . "</td>
                        <td>" . htmlspecialchars($row['student_reg_no']) . "</td>
                        <td>" . htmlspecialchars($row['department']) . "</td>
                        <td>" . htmlspecialchars($row['level']) . "</td>
                        <td>" . htmlspecialchars($row['attendance_count']) . "</td>
                    </tr>";
        $sn++;
    }
} else {
    $output .= "<tr><td colspan='6'>No records found</td></tr>";
}

$output .= "</table>";

echo $output;

$conn->close();
?>
