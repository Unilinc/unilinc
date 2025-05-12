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

$studentRegNo = $_SESSION['student_reg_no'];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['course']) && isset($_GET['date'])) {
    $course = $_GET['course'];
    $date = $_GET['date'];

    // Check if student attended the class on the given date
    $query = "SELECT DATE(CONVERT_TZ(timestamp, '+00:00', '+01:00')) AS lecture_date 
              FROM attendance 
              WHERE student_reg_no = '$student_reg_no' 
              AND course = '$course' 
              AND DATE(CONVERT_TZ(timestamp, '+00:00', '+01:00')) = '$date'";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $attendance = $result->fetch_assoc();
        $lectureDate = $attendance['lecture_date'];

        // Fetch lecture details
        $lectureQuery = "SELECT topic, lecturer_name FROM schedule 
                         WHERE course_name = '$course' 
                         AND lecture_date = '$lectureDate'";

        $lectureResult = $conn->query($lectureQuery);

        if ($lectureResult->num_rows > 0) {
            $lecture = $lectureResult->fetch_assoc();
            $lecturer = $lecture['lecturer_name'];

            // Check if student has already rated this lecture
            $ratingCheckQuery = "SELECT * FROM ratings 
                                 WHERE student_reg_no = '$student_reg_no' 
                                 AND course = '$course' 
                                 AND lecturer = '$lecturer' 
                                 AND DATE(timestamp) = '$lectureDate'";

            $ratingCheckResult = $conn->query($ratingCheckQuery);

            $alreadyRated = ($ratingCheckResult->num_rows > 0);

            echo json_encode([
                "attended" => true,
                "topic" => $lecture['topic'] ?? "Unknown",
                "lecturer" => $lecture['lecturer_name'] ?? "Unknown",
                "alreadyRated" => $alreadyRated
            ]);
        } else {
            echo json_encode(["attended" => false]);
        }
    } else {
        echo json_encode(["attended" => false]);
    }
    exit;
}


// Handle rating submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($data['course']) || !isset($data['rating']) || !isset($data['lecturer'])) {
        echo json_encode(["success" => false, "message" => "Invalid data."]);
        exit;
    }

    $course = $data['course'];
    $rating = intval($data['rating']);
    $lecturer = $data['lecturer'];
    
    // Ensure student_reg_no is available
    if (!isset($_SESSION['student_reg_no'])) {
        echo json_encode(["success" => false, "message" => "Unauthorized access."]);
        exit;
    }

    $student_reg_no = $_SESSION['student_reg_no'];

    // Check if student already rated this lecture
    $ratingCheckQuery = "SELECT * FROM ratings 
                         WHERE student_reg_no = '$student_reg_no' 
                         AND course = '$course' 
                         AND lecturer = '$lecturer' 
                         AND DATE(timestamp) = CURDATE()";
    
    $ratingCheckResult = $conn->query($ratingCheckQuery);

    if ($ratingCheckResult === false) {
        echo json_encode(["success" => false, "message" => "Database error."]);
        exit;
    }

    if ($ratingCheckResult->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "You have already rated this lecture."]);
        exit;
    }

    // Insert rating
    $insertQuery = "INSERT INTO ratings (student_reg_no, lecturer, course, rating) 
                    VALUES ('$student_reg_no', '$lecturer', '$course', '$rating')";


    if ($conn->query($insertQuery)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Database error."]);
    }
    exit;
}

echo json_encode(["success" => false, "message" => "Invalid request."]);
exit;
?>