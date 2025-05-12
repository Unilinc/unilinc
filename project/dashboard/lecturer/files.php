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
        <div class="file-container">
            <h3>Your Uploaded Files</h3>
            <div id="file-grid">
                <div id="files">

                </div>
            
                <div id="new-file">
                    <div class="new-file-icon">
                        <img src="/project/images/add-button.JPG" alt="add-button" width="20px" height="20px" />
                    </div>
                </div>
            </div>
        </div>

        <div id="delete-modal" style="display: none;">
            <div id="delete-modal-content">
                <p>Are you sure you want to delete this file?</p>
                <button id="confirm-delete">Yes</button>
                <button id="cancel-delete">No</button>
            </div>
        </div>

        <div class="form_box">
            <div id="modal-overlay"></div>            
            <form id="upload_form" enctype="multipart/form-data">
                <span id="close-modal">&times;</span>
                <p>
                    <b>Upload New Material</b>
                </p>

                <input type="file" id="fileInput" name="fileInput[]" multiple accept=".pdf, .doc, .docx">
    
                <div class="upload-container" id="dropArea">
                    <div class="upload-icon">+</div>
                    <div class="upload-text">Drag and Drop files here or Click to Upload</div>
                    <span id="fileName">No file chosen</span>
                </div>

                <div class="upload-sub">
                    <input type="text" name="course_code" placeholder="Enter Course code"/>

                    <button type="submit">Upload</button>
                </div>
            </form>

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

    <script type="text/javascript" src="/project/javascript/files.js"></script>
    <script>
        let dropArea = document.getElementById("dropArea");
        let fileInput = document.getElementById("fileInput");
        let fileNameDisplay = document.getElementById("fileName");

        // When clicking the upload area, trigger file input
        dropArea.addEventListener("click", () => fileInput.click());

        // When selecting files
        fileInput.addEventListener("change", function () {
            displayFileNames(this.files);
        });

        // Drag & Drop Events
        dropArea.addEventListener("dragover", (event) => {
            event.preventDefault();
            dropArea.classList.add("active");
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("active");
        });

        dropArea.addEventListener("drop", (event) => {
            event.preventDefault();
            dropArea.classList.remove("active");

            let files = event.dataTransfer.files;
            fileInput.files = files; // Assign dropped files to input
            displayFileNames(files);
        });

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
