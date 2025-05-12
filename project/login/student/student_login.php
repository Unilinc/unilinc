<?php
session_start();

include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Sname = $_POST['Sname'];
    $reg_no = $_POST['reg_no'];

    $sql = "SELECT fac, dept, dept_short, level, email, phone_no, courses FROM students WHERE Sname = '$Sname' AND reg_no = '$reg_no'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['student_reg_no'] = $reg_no;   
        $_SESSION['student_name'] = $Sname;         
        $_SESSION['student_email'] = $row['email'];              
        $_SESSION['student_phone'] = $row['phone_no'];       
        $_SESSION['student_faculty'] = $row['fac'];
        $_SESSION['student_level'] = $row['level'];
        $_SESSION['student_department'] = $row['dept']; 
        $_SESSION['student_department_short'] = $row['dept_short']; 
        $_SESSION['student_courses'] = $row['courses'];
        $_SESSION['is_logged_in'] = true; 

        header("Location: /project/dashboard/student/home.php");
        exit();
    } else {

        $sql_name_check = "SELECT * FROM students WHERE Sname = '$Sname'";
        $result_name = $conn->query($sql_name_check);
        
        $sql_reg_no_check = "SELECT * FROM students WHERE reg_no = '$reg_no'";
        $result_reg_no = $conn->query($sql_reg_no_check);
        
        $error = '';
        if ($result_name->num_rows == 0) {
            $error = 'invalid_name';
        } else if ($result_reg_no->num_rows == 0) {
            $error = 'invalid_reg_no';
        } else if ($result_name->num_rows == 0 && $result_reg_no->num_rows == 0) {
            $error = 'invalid_name_and_reg_no';
        }

        
        header("Location: /project/login.html?error=$error&user_type=student");
    }
}

$conn->close();
?>
