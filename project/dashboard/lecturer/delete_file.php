<?php
session_start();
include "db.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array("status" => "error", "message" => "Unknown error");

if (!isset($_SESSION['lecturer_id'])) {
    $response['message'] = "Unauthorized access";
    echo json_encode($response);
    exit;
}

$lecturerId = $_SESSION['lecturer_id'];
$fileId = $_POST['file_id'] ?? '';
$errors = [];

if ($fileId) {
    $sql = "SELECT file_name, file_path FROM uploaded_files WHERE file_id = '$fileId' AND lecturer_id = '$lecturerId'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $file = mysqli_fetch_assoc($result);
        $filePath = $_SERVER['DOCUMENT_ROOT'] . $file['file_path'];

        if (file_exists($filePath)) {
            if (!unlink($filePath)) {
                $errors[] = 'Error deleting file from the server';
            }
        } else {
            $errors[] = 'File not found on server';
        }

        if (empty($errors)) {
            $sqlDelete = "DELETE FROM uploaded_files WHERE file_id = '$fileId' AND lecturer_id = '$lecturerId'";
            if (mysqli_query($conn, $sqlDelete)) {
                // Add success message to the errors array (used for both success and error)
                $errors[] = 'File deleted successfully';
            } else {
                $errors[] = 'Error deleting file from database';
            }
        }
    } else {
        $errors[] = 'File not found';
    }
}

if (count($errors) > 0) {
    // If there are any errors or success messages, return them in the response
    echo json_encode(['status' => (in_array('File deleted successfully', $errors) ? 'success' : 'error'), 'message' => implode(", ", $errors)]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Unknown error']);
}

$conn->close();
?>
