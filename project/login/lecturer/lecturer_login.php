<?php
session_start();

include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT lecturer_id, name, phone, faculty, department, password FROM lecturers WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['lecturer_id'] = $row['lecturer_id'];   
            $_SESSION['lecturer_name'] = $row['name'];         
            $_SESSION['lecturer_email'] = $email;              
            $_SESSION['lecturer_phone'] = $row['phone'];       
            $_SESSION['lecturer_faculty'] = $row['faculty'];   
            $_SESSION['lecturer_department'] = $row['department']; 
            $_SESSION['is_logged_in'] = true;                 

            header("Location: /project/dashboard/lecturer/home.php");
            exit();
         } else {

            $error = 'invalid_password';
        }
    } else {

        $sqlPasswordCheck = "SELECT * FROM lecturers WHERE password = '$password'";
        $resultPassword = $conn->query($sqlPasswordCheck);

        if ($resultPassword->num_rows > 0) {
            $error = 'invalid_email';
        } else {
            $error = 'invalid_account';
        }
    }

    header("Location: /project/login.html?error=$error&user_type=lecturer");
    exit();
}

$conn->close();
?>
