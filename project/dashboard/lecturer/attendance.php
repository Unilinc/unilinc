<?php
session_start();  
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Attendance Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link rel="stylesheet" href="/project/css/attendance.css">
    <script src="/project/javascript/qrcode.min.js"></script>
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
        <div class="form_box">
            <p><b>Attendance Management System</b></p>
            <form id="signup_form" onsubmit="event.preventDefault(); generateQRCode()" style="display: flex;">
                <label for="Dept">Department</label>
                <select id="dept" name="dept" onchange="updateLvl()">
                    <option value="" disabled selected hidden>---Select---</option>
                    <option value="IFT">Information Technology</option>
                    <option value="SOE">Software Engineering</option>
                    <option value="CSC">Computer Science</option>
                    <option value="CYB">Cyber Security</option>
                    <option value="AGR">Agribusiness</option>
                    <option value="AEC">Agricultural Economics</option>
                    <option value="AEX">Agricultural Extension</option>
                    <option value="AST">Animal Science and Technology</option>
                    <option value="CST">Crop Science and Technology</option>
                    <option value="FAT">Fisheries and Aquaculture Technology</option>
                    <option value="FWT">Forestry and Wildlife Technology</option>
                    <option value="SST">Soil Science and Technology</option>
                    <option value="ANT">Human Anatomy</option>
                    <option value="RAD">Radiography</option>
                    <option value="HPH">Human Physiology</option>
                    <option value="ABE">Agricultural and Bio resources Engineering</option>
                    <option value="BME">Biomedical Engineering</option>
                    <option value="CHE">Chemical Engineering</option>
                    <option value="CIE">Civil Engineering</option>
                    <option value="FST">Food Science and technology</option>
                    <option value="MME">Material and Metallurgical Engineering</option>
                    <option value="MEE">Mechanical Engineering</option>
                    <option value="PET">Petroleum Engineering</option>
                    <option value="PTE">Polymer and Textile Engineering</option>
                    <option value="CPE">Computer Engineering</option>
                    <option value="EPE">Electrical (Power Systems) Engineering</option>
                    <option value="ELE">Electronics Engineering</option>
                    <option value="MCE">Mechatronics Engineering</option>
                    <option value="TCE">Telecommunications Engineering</option>
                    <option value="BCH">Biochemistry</option>
                    <option value="BIO">Biology</option>
                    <option value="BTC">Biotechnology</option>
                    <option value="MCB">Microbiology</option>
                    <option value="FSC">Forensic Science</option>
                    <option value="ARC">Architecture</option>
                    <option value="BLD">Building Technology</option>
                    <option value="EME">Estate Management and Evaluation</option>
                    <option value="EVM">Environmental Management</option>
                    <option value="QST">Quantity Surveying</option>
                    <option value="SVG">Surveying and Geoinformatics</option>
                    <option value="URP">Urban and Regional Planning</option>
                    <option value="DNT">Dental Technology</option>
                    <option value="EHS">Environmental Health Science</option>
                    <option value="OPT">Optometry</option>
                    <option value="PTO">Prosthetics and Orthotics</option>
                    <option value="PUH">Public Health Technology</option>
                    <option value="CMH">Chemistry</option>
                    <option value="GEO">Geology</option>
                    <option value="MTH">Mathematics</option>
                    <option value="PHY">Physics</option>
                    <option value="SLT">Science Laboratory Technology</option>
                    <option value="STA">Statistics</option>
                    <option value="EMV">Estate Management and Valuation</option>
                    <option value="ENI">Entrepreneurship and Innovation</option>
                    <option value="LTT">Logistics and Transport Technology</option>
                    <option value="MTL">Maritime Technology and Logistics</option>
                    <option value="LSCM">Supply Chain Management</option>
                    <option value="PMT">Project Management Technology</option>
                </select>

                <label for="Level">Level</label>
                <select id="lvl" name="lvl" onchange="updateCourse()">
                    <option value="" disabled selected hidden>---Select---</option>
                </select>

                <label for="course">Lecture Course</label>
                <select id="course" name="course">
                    <option value="" disabled selected hidden>---Select---</option>
                </select>

                <button type="submit">Generate QR Code</button>
            </form>

            <div class="popup" id="popup_message">Please select all fields</div>

            <div id="qrModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <p>Scan this QR Code:</p>
                    <canvas id="qrcodeCanvas"></canvas>
                </div>
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

        <div id="footer_content"  style="border-top: 1px solid black;">
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

    <script type="text/javascript" src="/project/javascript/attendance.js"></script>
    <script type="text/javascript" src="/project/javascript/generate_qr.js"></script>
    <script>
    var lecturerId = "<?php echo htmlspecialchars($lecturer_id); ?>"; 
    </script>
</body>
</html>
