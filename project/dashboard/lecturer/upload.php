<?php
session_start();
include "db.php"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['lecturer_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized access.']);
    exit;
}

$lecturerId = $_SESSION['lecturer_id'];
$courseCode = $_POST['course_code'] ?? '';

// Define upload directory
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/project/uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileInput'])) {
    $errors = [];
    $uploadedFiles = [];

    // Check if uploaded files exceed the limit of 5
    if (count($_FILES['fileInput']['name']) > 5) {
        $errors[] = 'Uploaded files cannot be more than 5 files';
    }

    // Process each file
    foreach ($_FILES['fileInput']['tmp_name'] as $key => $tmp_name) {
        $fileName = basename($_FILES['fileInput']['name'][$key]);
        $fileSize = $_FILES['fileInput']['size'][$key];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $filePath = $uploadDir . $fileName;

        // Validate file size (max 10MB)
        if ($fileSize > 10485760) {
            $errors[] = "File too large: $fileName (Max size is 10MB)";
            continue;
        }

        // Validate file type
        $allowedTypes = ['pdf', 'doc', 'docx'];
        if (!in_array(strtolower($fileType), $allowedTypes)) {
            $errors[] = "Invalid file type: $fileName (Only PDF, DOC, and DOCX are allowed)";
            continue;
        }

        // Move file to server folder
        if (move_uploaded_file($tmp_name, $filePath)) {
            // Save file details in the database
            $fileDir = str_replace($_SERVER['DOCUMENT_ROOT'], "", $filePath);
            $sql = "INSERT INTO uploaded_files (lecturer_id, file_name, file_path, course_code) 
                    VALUES ('$lecturerId', '$fileName', '$fileDir', '$courseCode')";

            if (mysqli_query($conn, $sql)) {
                $fileId = mysqli_insert_id($conn); // Get the unique ID of the inserted file
                $uploadedFiles[] = [
                    'file_id' => $fileId,
                    'file_name' => $fileName,
                    'file_path' => $fileDir
                ];
            } else {
                $errors[] = "Database error: " . mysqli_error($conn);
            }
        } else {
            $errors[] = "File upload failed for: $fileName";
        }
    }

    // Return a JSON response with status and message
    if (count($errors) > 0) {
        echo json_encode(['status' => 'error', 'message' => implode(", ", $errors)]);
    } else {
        echo json_encode(['status' => 'success', 'message' => 'Files uploaded successfully', 'files' => $uploadedFiles]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Fetch uploaded files by the lecturer
    $sql = "SELECT file_id, file_name, file_path FROM uploaded_files WHERE lecturer_id = '$lecturerId'";
    $result = mysqli_query($conn, $sql);
    $files = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $files[] = $row;
        }
        echo json_encode(['status' => 'success', 'files' => $files]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No files found.']);
    }
}

$conn->close();
?>
