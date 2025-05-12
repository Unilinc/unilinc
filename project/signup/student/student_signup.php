<?php
include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Sname = $_POST['Sname'];
    $reg_no = $_POST['reg_no'];
    $fac = $_POST['fac'];
    $dept = $_POST['dept'];
    $dept_short = $_POST['dept_short'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];

    $sqlCheck = "SELECT * FROM students WHERE reg_no = '$reg_no' AND Sname = '$Sname'";
    $result = $conn->query($sqlCheck);

    if ($result->num_rows > 0) {
        $error = "duplicate_account";
    } else {
        $sql = "INSERT INTO students (Sname, reg_no, fac, dept, dept_short, level, email, phone_no) VALUES ('$Sname', '$reg_no', '$fac', '$dept', '$dept_short', '$level', '$email', '$phone_no')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: /project/signup/student/student_success.php?Sname=" . urlencode($Sname) . "&reg_no=" . urlencode($reg_no));
            exit();
        } else {
            $error = "missing_fields";
        }
    }

    header("Location: /project/signup.html?error=$error&user_type=student");
    exit();
}

$conn->close();
?>
