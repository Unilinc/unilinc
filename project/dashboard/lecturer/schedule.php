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
            <p style="text-align: center;">Welcome! <br><?php echo htmlspecialchars($lecturer_name); ?>.</p>
                <a href="/project/dashboard/lecturer/schedule.php">Schedule</a>
                <a href="/project/dashboard/lecturer/events.php">Events</a>
                <a href="/project/dashboard/lecturer/profile.php">Profile</a>
                <a href="/project/dashboard/lecturer/contact.php">FAQ</a>
                <a href="/project/dashboard/lecturer/logout.php">Logout</a>
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
                        <th>Lecture Details</th>
                        <th id="th_time">Time</th>
                        <th id="th_opt">Opt</th>
                    </tr>
                </thead>

                <tbody id="schedule-body">
                </tbody>
            </table>
        </div>
        <div class="add_schedule" id="add-schedule">
            <img id="click-icons-add" src="/project/images/add-button.JPG" alt="add-button" width="20px" height="20px" />
        </div>
    </div>

    <div class="modal" id="schedule-modal">
        <h3>
            Add New Schedule
        </h3>
        <form id="schedule-form">
            <input type="hidden" name="action" value="add_schedule">
            <input type="hidden" value="<?php echo htmlspecialchars($lecturer_id); ?>" name="lecturer_id" required>
            <input type="hidden" value="<?php echo htmlspecialchars($lecturer_name); ?>" name="lecturer_name" required>
            <label>Course Name: <br><input type="text" name="course_name" required></label><br>
            <label>Venue: <br><input type="text" name="venue" required></label><br>
            <label>Topic Title: <br><input type="text" name="topic" required></label><br>
            <label>Lecture Date: <br><input type="date" name="lecture_date" required></label><br>
            <label>Lecture Start Time: <br><input type="time" name="lecture_start_time" required></label><br>
            <label>Lecture End Time: <br><input type="time" name="lecture_end_time" required></label><br>
            <div class="button-container">
                <button type="submit">Submit</button>
                <button type="button" id="close-modal">Close</button>
            </div>
        </form>
    </div>

    <div class="modal" id="delete-modal">
        <h3>Are you sure you want to delete this schedule?</h3>
        <div class="button-container">
            <button id="confirm-delete">Yes</button>
            <button id="cancel-delete">No</button>
        </div>
    </div>

    <div class="modal" id="calendar-modal">
        <h3>Select a Date</h3>
        <input type="date" id="calendar-input" />
        <div class="button-container">
            <button id="calendar-select">Select</button>
            <button id="calendar-close">Close</button>
        </div>
    </div>
    

    <div class="modal" id="success-modal">
        <h3 id="success-message"></h3>
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

    <script type="text/javascript" src="/project/javascript/schedule.js"></script>
</body>
</html>
