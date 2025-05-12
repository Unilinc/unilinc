<?php
include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$studentName = trim($_POST['Sname']);
$lecturer_id = $_POST['lecturer'];
$studentRegNo = $_POST['reg_no'];
$department = $_POST['department'];
$level = $_POST['level'];
$course = $_POST['course'];
$timestamp = $_POST['timestamp'];
$dateOnly = date('Y-m-d', strtotime($timestamp));

if (empty($studentName) || empty($lecturer_id) || empty($studentRegNo) || empty($department) || empty($level) || empty($course) || empty($timestamp)) {
    echo json_encode(["status" => "error", "message" => "Invalid data received."]);
    exit;
}

$checkQuery = "SELECT * FROM attendance 
               WHERE student_reg_no = '$studentRegNo' 
               AND lecturer_id = '$lecturer_id' 
               AND department = '$department' 
               AND level = '$level' 
               AND course = '$course' 
               AND DATE(timestamp) = '$dateOnly'";

$result = $conn->query($checkQuery);

if ($result->num_rows > 0) {
    echo json_encode(["status" => "success", "message" => "Attendance already marked for today."]);
    exit;
}

$sql = "INSERT INTO attendance (student_name, lecturer_id, student_reg_no, department, level, course, timestamp) 
        VALUES ('$studentName', '$lecturer_id', '$studentRegNo', '$department', '$level', '$course', '$timestamp')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Attendance marked successfully!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
}

$conn->close();
?>
