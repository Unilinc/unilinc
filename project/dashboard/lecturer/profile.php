<?php
session_start();  
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/project/css/profile.css">
    <link rel="icon" type="image/ico" href="/project/images/icon.JPG">
    <script type="text/javascript" src="/project/javascript/loader.js"></script>
    <script type="text/javascript" src="/project/javascript/attendance.js"></script>
    <link rel="manifest" href="/project/manifest.json" />
</head>
<body>
    <div class="navbar">
        <div id="navbar_img">
            <img src="/project/images/nav_bar-logo.png" alt="nav_bar-logo" width="42px" height="42px" />
        </div>

        <div id="nav-menu">
            <div id="menu-icon" onclick="toggleMenu()">☰</div>
            <div id="menu-options">
            <p style="text-align: center;">Welcome! <br><?php echo htmlspecialchars($lecturer_name); ?>.</p>
                <a href="/project/dashboard/lecturer/schedule.php">Schedule</a>
                <a href="/project/dashboard/lecturer/events.php">Events</a>
                <a href="/project/dashboard/lecturer/profile.php">Profile</a>
                <a href="/project/dashboard/lecturer/contact.php">FAQ</a>
                <a href="/project/dashboard/lecturer/logout.php">Logout</a>
            </div>
        </div>
    </div>
    </div>

    <div class="Webcontainer" id="content-container">
        <div class="form_box">

        <div class="profile_head">Staff <br>Profile Information</div>

            <div id="signup_form">
                <label for="lecturer_name" id="form_label">Lecturer Full Name</label>
                <input type="text" value="<?php echo htmlspecialchars($lecturer_name); ?>" readonly>
            
                <label for="lecturer_email" id="form_label">Lecturer Email Address</label>
                <input type="text" value="<?php echo htmlspecialchars($lecturer_email); ?>" readonly>

                <label for="lecturer_phone_no" id="form_label">Lecturer Phone Number</label>
                <input type="text" value="<?php echo htmlspecialchars($lecturer_phone); ?>" readonly>

                <label for="lecturer_uni" id="form_label">Tertiary Institution</label>
                <input type="text" value="FUTO" readonly>
            
                <label for="lecturer_fac" id="form_label">Faculty</label>
                <input type="text" value="<?php echo htmlspecialchars($lecturer_faculty); ?>" readonly>
            
                <label for="lecturer_dept" id="form_label">Department</label>
                <input type="text" value="<?php echo htmlspecialchars($lecturer_department); ?>" readonly>
            </div>
        </div>


    </div>

    <div class="footer-box"></div>
    <div class="footer">
    <div id="footer_content">
            <a href="home.php" class="footer_link">
                <span><img src="/project/images/home.png" alt="profile_img" width="24" height="24"/></span>
                <span>Home</span>
            </a>
        </div>

        <div id="footer_content">
            <a href="attendance.php" class="footer_link">
                <span><img src="/project/images/generate.png" alt="QR_img" width="24" height="24"/></span>
                <span>Generate</span>
            </a>
        </div>

        <div id="footer_content">
            <a href="statistics.php" class="footer_link">
                <span><img src="/project/images/stats.png" alt="stats_img" width="24" height="24"/></span>
                <span>Statistics</span>
            </a>
        </div>

        <div id="footer_content">
            <a href="files.php" class="footer_link">
                <span><img src="/project/images/files.png" alt="files_img" width="24" height="24"/></span>
                <span>Files</span>
            </a>
        </div>
    </div>

    <div id="preloader">
        <img src="/project/images/nav_bar-logo.png" alt="Brand Logo" id="logo">
        <div id="loader-bar"></div>
        <p id="connectionMessage" style="color: white; display: none;">Internet connection disabled. Please Reconnect!</p>
    </div>
</body>
</html>
