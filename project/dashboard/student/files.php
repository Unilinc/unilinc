<?php
session_start();  
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Files</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link rel="stylesheet" href="/project/css/files.css">
    <script type="text/javascript" src="/project/javascript/loader.js"></script>
    <link rel="icon" type="image/ico" href="/project/images/icon.JPG">
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
                <p style="text-align: center;">Welcome, <br><?php echo htmlspecialchars($student_name); ?>!</p>
                <a href="/project/dashboard/student/schedule.php">Schedule</a>
                <a href="/project/dashboard/student/profile.php">Profile</a>
                <a href="/project/dashboard/student/contact.php">FAQ</a>
                <a href="/project/dashboard/student/logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div class="Webcontainer" id="content-container">
        <div class="file-container">
            <h3>Course Materials/Files</h3>
            <div id="file-grid">
                <div id="files">

                </div>
            </div>
        </div>

            <div class="popup" id="popup_message">Please select all fields</div>
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
            <a href="scanner.php" class="footer_link">
                <span><img src="/project/images/scan.png" alt="scan_img" width="24" height="24"/></span>
                <span>Scan Code</span>
            </a>
        </div>

        <div id="footer_content">
            <a href="events.php" class="footer_link">
                <span><img src="/project/images/event.png" alt="event_img" width="24" height="24"/></span>
                <span>Events</span>
            </a>
        </div>

        <div id="footer_content" style="border-top: 2px solid black;">
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

    <script type="text/javascript" src="/project/javascript/student-files.js"></script>
    <script>
        let dropArea = document.getElementById("dropArea");
        let fileInput = document.getElementById("fileInput");
        let fileNameDisplay = document.getElementById("fileName");

        function displayFileNames(files) {
            if (files.length > 0) {
                fileNameDisplay.textContent = Array.from(files)
                    .map(file => file.name)
                    .join(", ");
            } else {
                fileNameDisplay.textContent = "No file chosen";
            }
        }
    </script>
</body>
</html>
