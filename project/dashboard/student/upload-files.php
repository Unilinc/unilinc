<?php
session_start();
include "db.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['student_reg_no'])) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized access.']);
    exit;
}

$student_reg_no = $_SESSION['student_reg_no'];

// Get student's registered courses
$studentQuery = "SELECT courses FROM students WHERE reg_no = '$student_reg_no'";
$studentResult = mysqli_query($conn, $studentQuery);

if ($studentResult && mysqli_num_rows($studentResult) > 0) {
    $studentRow = mysqli_fetch_assoc($studentResult);
    $studentCourses = array_map('trim', explode(',', $studentRow['courses'])); // Trim spaces

    if (empty($studentCourses)) {
        echo json_encode(['status' => 'error', 'message' => 'No registered courses found.']);
        exit;
    }

    // Build a dynamic SQL condition using FIND_IN_SET()
    $courseConditions = [];
    foreach ($studentCourses as $course) {
        $courseConditions[] = "FIND_IN_SET('$course', uploaded_files.course_code)";
    }
    $courseQuery = implode(" OR ", $courseConditions);

    // Retrieve only files matching student's courses
    $fileQuery = "SELECT file_id, file_name, file_path, course_code 
                  FROM uploaded_files 
                  WHERE ($courseQuery)
                  ORDER BY upload_date DESC";

    $fileResult = mysqli_query($conn, $fileQuery);
    $files = [];

    if ($fileResult && mysqli_num_rows($fileResult) > 0) {
        while ($row = mysqli_fetch_assoc($fileResult)) {
            $files[] = $row;
        }
        echo json_encode(['status' => 'success', 'files' => $files]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No files found for your courses.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Student courses not found.']);
}


$conn->close();
?>
