<?php
session_start();  
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Log</title>
    <link rel="stylesheet" href="/project/css/schedule.css">
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
        <div class="head_text">
            <div id="schedule_text">
                Schedule Log
            </div>

            <div class="function">
                <div id="check_calendar_button">
                    <img id="click-icons-check" src="/project/images/calendar.png" alt="calendar" width="24px" height="24px" />
                </div>
            </div>
        </div>

            <div class="header">
                <button id="prev-date">&lt;</button>
                <div class="date-container">
                    <h3 id="current-date"></h3>
                </div>
                <button id="next-date">&gt;</button>
            </div>

        <div class="schedule_table" id="schedule_table">
            <table>
                <thead>
                    <tr>
                        <th id="th_indicator">S/N</th>
                        <th id="th_details">Lecture Details</th>
                        <th id="th_time">Time</th>
                        <th id="th_rate">Rate</th>
                    </tr>
                </thead>

                <tbody id="schedule-body">
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="calendar-modal">
        <h3>Select a Date</h3>
        <input type="date" id="calendar-input" />
        <button id="calendar-select">Select</button>
        <button id="calendar-close">Close</button>
    </div>

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

        <div id="footer_content">
            <a href="files.php" class="footer_link">
                <span><img src="/project/images/files.png" alt="files_img" width="24" height="24"/></span>
                <span>Files</span>
            </a>
        </div>
    </div>

    <div class="popup" id="popup_message"></div>

    <div id="preloader">
        <img src="/project/images/nav_bar-logo.png" alt="Brand Logo" id="logo">
        <div id="loader-bar"></div>
        <p id="connectionMessage" style="color: white; display: none;">Internet connection disabled. Please Reconnect!</p>
    </div>

    
    <script type="text/javascript" src="/project/javascript/student-schedule.js"></script>
</body>
</html>
