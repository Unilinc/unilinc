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

$lecturer_id = $_SESSION['lecturer_id'];
$lecturer_name = $_SESSION['lecturer_name'];
$lecturer_email = $_SESSION['lecturer_email'];
$lecturer_phone = $_SESSION['lecturer_phone'];
$lecturer_faculty = $_SESSION['lecturer_faculty'];
$lecturer_department = $_SESSION['lecturer_department'];
?>