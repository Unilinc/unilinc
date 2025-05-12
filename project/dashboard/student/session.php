<?php 
define('SESSION_TIMEOUT', 3600);

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: /project/login.html?error=unauthorized_access");
    exit();
}

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > SESSION_TIMEOUT) {
    session_unset();
    session_destroy();
    header("Location: /project/login.html?error=session_timeout");
    exit();
}

$_SESSION['last_activity'] = time();

$student_name = $_SESSION['student_name'];  
$student_reg_no = $_SESSION['student_reg_no']; 
$student_email = $_SESSION['student_email'];       
$student_phone = $_SESSION['student_phone'];
$student_faculty = $_SESSION['student_faculty'];
$student_level = $_SESSION['student_level'];
$student_dept = $_SESSION['student_department'];
$student_courses = $_SESSION['student_courses'];
$student_dept_short = $_SESSION['student_department_short'];

?>