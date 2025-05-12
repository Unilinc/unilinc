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
    <script type="text/javascript" src="/project/javascript/loader.js"></script>
    <script type="text/javascript" src="/project/javascript/profile.js"></script>
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
        <div class="form_box">
            <div class="profile_head">Student <br>Profile Information</div>

            <div id="signup_form">
                <label for="student_name" id="form_label">Student Full Name</label>
                <input type="text" value="<?php echo htmlspecialchars($student_name); ?>" readonly>

                <label for="student_reg_no" id="form_label">Student Registration Number</label>
                <input type="text" value="<?php echo htmlspecialchars($student_reg_no); ?>" readonly>

                <label for="student_uni" id="form_label">Tertiary Institution</label>
                <input type="text" value="FUTO" readonly>

                <label for="student_fac" id="form_label">Faculty</label>
                <input type="text" value="<?php echo htmlspecialchars($student_faculty); ?>" readonly>

                <label for="student_dept" id="form_label">Department</label>
                <input type="text" id="student_dept" value="<?php echo htmlspecialchars($student_dept); ?>" readonly>

                <label for="student_level" id="form_label">Current Level</label>
                <input type="text" value="<?php echo htmlspecialchars($student_level); ?>" readonly>

                <label for="student_email" id="form_label">Email Address</Address></label>
                <input type="text" value="<?php echo htmlspecialchars($student_email); ?>" readonly>

                <label for="student_phone" id="form_label">Phone Number</label>
                <input type="text" value="<?php echo htmlspecialchars($student_phone); ?>" readonly>

                <label for="student_phone" id="form_label">Offered Courses</label>
                <input type="text" value="<?php echo htmlspecialchars($student_courses); ?>" readonly>

                <div class="update">
                   <div id="update_profile">Update Profile</div>
                </div>
            </div>
        </div>

        <div class="modal" id="modal">
            <form id="student_profile_info">
            <span class="close" onclick="closeModal()">×</span>
            <h2><b>Update <br> Student Information</b></h2>
                <input type="hidden" value="<?php echo htmlspecialchars($student_name); ?>" >
                <input type="hidden" name="reg_no" value="<?php echo htmlspecialchars($student_reg_no); ?>" >
                <label for="student_dept" id="form_label">Department</label>
                <input id="update_container" name="dept" value="<?php echo htmlspecialchars($student_dept); ?>" readonly />
                <label for="" id="form_label">Update Current Level</label>
                <select id="update_level_container" name="level">
                    <option value="" disabled selected hidden>-- Select --</option>
                    <option value="100 LEVEL">100 LEVEL</option>
                    <option value="200 LEVEL">200 LEVEL</option>
                    <option value="300 LEVEL">300 LEVEL</option>
                    <option value="400 LEVEL">400 LEVEL</option>
                    <option value="500 LEVEL">500 LEVEL</option>
                </select>

                <div id="courses_container">
                </div>
    
                <div class="save_update">
                   <button type="submit" id="save_update_profile">Save Changes</button>
                </div>

                <div id="response_message" class="text-center"></div>
            </form>
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
    </div>
</body>
</html>
