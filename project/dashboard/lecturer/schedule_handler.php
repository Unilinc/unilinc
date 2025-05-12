<?php

session_start();

header('Content-Type: application/json');
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'add_schedule') {
        $lecturer_name = $_POST['lecturer_name'];
        $course_name = $_POST['course_name'];
        $venue = $_POST['venue'];
        $topic = $_POST['topic'];
        $lecture_date = date('Y-m-d', strtotime($_POST['lecture_date']));
        $lecture_start_time = $_POST['lecture_start_time'];
        $lecture_end_time = $_POST['lecture_end_time'];

        $formatted_time = date("g:ia", strtotime($lecture_start_time)) . ' - ' . date("g:ia", strtotime($lecture_end_time));

        // Check for existing lectures that overlap in time
        $check_sql = "SELECT * FROM schedule 
                      WHERE lecture_date = '$lecture_date' 
                      AND venue = '$venue' 
                      AND (
                          ('$lecture_start_time' >= lecture_start_time AND '$lecture_start_time' < lecture_end_time) OR
                          ('$lecture_end_time' > lecture_start_time AND '$lecture_end_time' <= lecture_end_time) OR
                          (lecture_start_time >= '$lecture_start_time' AND lecture_end_time <= '$lecture_end_time')
                      )";

        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            echo json_encode(["success" => false, "message" => "Lecture time clashes with another lecture"]);
        } else {
            // No conflict, proceed with insertion
            $insert_sql = "INSERT INTO schedule (lecturer_id, lecturer_name, course_name, venue, topic, lecture_date, lecture_start_time, lecture_end_time, formatted_time) 
                           VALUES ('$lecturer_id', '$lecturer_name', '$course_name', '$venue', '$topic', '$lecture_date', '$lecture_start_time', '$lecture_end_time', '$formatted_time')";

            if ($conn->query($insert_sql) === TRUE) {
                echo json_encode(["success" => true, "message" => "Schedule added successfully"]);
            } else {
                echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
            }
        }
    }

    if ($_POST['action'] === 'toggle_status') {
        $schedule_id = $_POST['schedule_id'];
        $status = $_POST['status'];

        $sql = "UPDATE schedule SET status = '$status' WHERE id = $schedule_id";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["success" => true, "message" => "Status updated successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
        }
    }

    if ($_POST['action'] === 'delete_schedule') {
        $schedule_id = $_POST['schedule_id'];

        $sql = "DELETE FROM schedule WHERE id = $schedule_id";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["success" => true, "message" => "Schedule deleted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $dateFilter = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'); 

    $sql = "SELECT * FROM schedule WHERE lecture_date = '$dateFilter' AND lecturer_id = '$lecturer_id' ORDER BY lecture_start_time";
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