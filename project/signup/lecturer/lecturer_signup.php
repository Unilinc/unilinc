<?php
include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Lname'];
    $phone = $_POST['phone_no'];
    $email = $_POST['email'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sqlCheck = "SELECT * FROM lecturers WHERE phone = '$phone' OR email = '$email'";
    $result = $conn->query($sqlCheck);

    if ($result->num_rows > 0) {
        $error = "duplicate_account";
    } else {
        do {
            $lecturer_id = rand(100000, 999999);
            $checkIdQuery = "SELECT lecturer_id FROM lecturers WHERE lecturer_id = '$lecturer_id'";
            $idResult = $conn->query($checkIdQuery);
        } while ($idResult->num_rows > 0);

        $sql = "INSERT INTO lecturers (lecturer_id, name, phone, email, password, faculty, department)
                VALUES ('$lecturer_id', '$name', '$phone', '$email', '$password', '$faculty', '$department')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: /project/signup/lecturer/lecturer_success.php?Lname=" . urlencode($name));
            exit();
        } else {
            $error = "missing_fields";
        }
    }

    header("Location: /project/signup.html?error=$error&user_type=lecturer");
    exit();
}

$conn->close();
?>
