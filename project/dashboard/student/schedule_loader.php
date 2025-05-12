<?php

session_start();

header('Content-Type: application/json');
include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['student_reg_no'])) {
    $student_reg_no = $_SESSION['student_reg_no'];
} else {
    echo json_encode(["success" => false, "message" => "Unauthorized access. Please log in."]);
    exit();
}

$student_sql = "SELECT courses FROM students WHERE reg_no = '$student_reg_no'";
$student_result = $conn->query($student_sql);

if ($student_result->num_rows > 0) {
    $student_data = $student_result->fetch_assoc();
    $student_courses = array_map('trim', explode(',', $student_data['courses'])); // Trim spaces
} else {
    echo json_encode(["success" => false, "message" => "Student not found."]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $dateFilter = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

    $courseConditions = [];
    foreach ($student_courses as $course) {
        $courseConditions[] = "FIND_IN_SET('$course', schedule.course_name)";
    }
    $courseQuery = implode(" OR ", $courseConditions);

    $sql = "SELECT * FROM schedule 
            WHERE lecture_date = '$dateFilter' 
            AND ($courseQuery) 
            ORDER BY lecture_start_time";
    $result = $conn->query($sql);

    $schedules = [];
    while ($row = $result->fetch_assoc()) {
        $row['lecture_date'] = date('l, M jS, Y', strtotime($row['lecture_date']));
        $schedules[] = $row;
    }

    echo json_encode($schedules);
}


$conn->close();

?>
