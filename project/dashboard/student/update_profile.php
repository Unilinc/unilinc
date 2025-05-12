<?php
session_start();  
include 'db.php';

header('Content-Type: application/json');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentRegNo = $_POST['reg_no'] ?? '';
    $department = $_POST['dept'] ?? '';
    $newLevel = $_POST['level'] ?? '';
    $selectedCourses = $_POST['courses'] ?? [];

    if (empty($studentRegNo) || empty($department) || empty($newLevel) || empty($selectedCourses)) {
        echo json_encode(['success' => false, 'error' => 'Choose level and select courses!']);
        exit;
    }

    $coursesString = implode(", ", $selectedCourses);

    $sql = "UPDATE students 
            SET level = '$newLevel', courses = '$coursesString' 
            WHERE reg_no = '$studentRegNo' AND dept = '$department'";

    if ($conn->query($sql) === TRUE) {

        $_SESSION['student_level'] = $newLevel;

        echo json_encode(['success' => true, 'message' => 'Student profile updated successfully!']);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error updating record: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}

$conn->close();
?>
