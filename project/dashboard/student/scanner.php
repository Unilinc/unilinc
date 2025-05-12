<?php
session_start();  
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanning System</title>
    <link rel="stylesheet" href="/project/css/scanner.css">
    <link rel="icon" type="image/ico" href="/project/images/icon.JPG">
    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.min.js"></script>
    <script type="text/javascript" src="/project/javascript/loader.js"></script>
    <link rel="manifest" href="/project/manifest.json" />
</head>

<style>
    #startScannerButton {
        display: block;
        margin: 50px auto;
        padding: 10px 20px;
        font-size: 18px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #startScannerButton:hover {
        background-color: #45a049;
    }

    #cameraContainer {
        display: none;
        text-align: center;
    }

    video {
        width: 100%;
        max-width: 400px;
        border: 1px solid black;
    }

    canvas {
        width: 100%;
        max-width: 400px;
        display: none;
    }
</style> 
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
    <h1 style="text-align: center; margin-top: 16%;">Smart Attendance System</h1>

    <div id="studentDetails" style="text-align: center; margin-bottom: 20px; font-size: 18px;">
        <span>Name: <?php echo htmlspecialchars($student_name); ?></span><br>
        <span>Registration Number: <?php echo htmlspecialchars($student_reg_no); ?></span><br>
        <span>Faculty: <?php echo htmlspecialchars($student_faculty); ?></span><br>
        <span>Department: <?php echo htmlspecialchars($student_dept); ?></span><br>
        <span>Level: <?php echo htmlspecialchars($student_level); ?></span>
        
    </div>

    <button id="startScannerButton">Mark attendance</button>

    <div id="cameraContainer">
        <video id="video" autoplay></video>
        <canvas id="canvas"></canvas>
    </div>
    <p id="result"></p>

    </div>

    <div class="footer-box"></div>
    <div class="footer">
        <div id="footer_content">
            <a href="home.php" class="footer_link">
                <span><img src="/project/images/home.png" alt="profile_img" width="24" height="24"/></span>
                <span>Home</span>
            </a>
        </div>

        <div id="footer_content" style="border-top: 1px solid black;">
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
    </div>

    <script>
    function toggleMenu() {
    const menuIcon = document.getElementById("menu-icon");
    const menuOptions = document.getElementById("menu-options");

    if (menuOptions.style.transform === "translateX(100%)" || menuOptions.style.transform === "") {
        menuOptions.style.transform = "translateX(0%)"; 
        menuIcon.textContent = "×";  
    } else {
        menuOptions.style.transform = "translateX(100%)";  
        menuIcon.textContent = "☰";  
    }
}

document.addEventListener('click', (event) => {
    const menu = document.getElementById("menu-options");
    const menuIcon = document.getElementById("menu-icon");

    if (!menu.contains(event.target) && !menuIcon.contains(event.target)) {
        menu.style.transform = "translateX(100%)";
        menuIcon.textContent = "☰";
    }
});

</script>

<script>
    const loggedInStudent = {
        Sname: "<?php echo htmlspecialchars($student_name); ?>",
        reg_no: "<?php echo htmlspecialchars($student_reg_no); ?>",
        faculty: "<?php echo htmlspecialchars($student_faculty); ?>",
        department: "<?php echo htmlspecialchars($student_dept); ?>",
        department_short: "<?php echo htmlspecialchars($student_dept_short); ?>",
        level: "<?php echo htmlspecialchars($student_level); ?>"
    };
  
    function showPopupMessage(message) {
        const popup = document.getElementById("popup_message");
        popup.textContent = message;
        popup.style.display = "block";
        
        setTimeout(() => {
            popup.style.display = "none";
        }, 3000);
    }

        const video = document.getElementById("video");
        const canvas = document.getElementById("canvas");
        const resultDisplay = document.getElementById("result");
        let scanInterval;

        document.getElementById("startScannerButton").addEventListener("click", startQRScanner);

        async function startQRScanner() {
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                showPopupMessage("Camera access is not supported on this device or browser.");
            return;
            }

            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } });
                video.srcObject = stream;
                document.getElementById("cameraContainer").style.display = "block";

                scanQRCode();
            } catch (err) {
                console.error("Error accessing camera:", err);
            showPopupMessage("Camera access is required to scan QR codes.");
        }
        }

        function scanQRCode() {
            const ctx = canvas.getContext("2d");
            scanInterval = setInterval(() => {
                if (video.readyState === video.HAVE_ENOUGH_DATA) {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                    const code = jsQR(imageData.data, canvas.width, canvas.height);

                    if (code) {
                        clearInterval(scanInterval);
                        stopCamera();

                        sendDataToServer(code.data);
                    }
                }
            }, 500); 
        }

        function stopCamera() {
            const stream = video.srcObject;
            if (stream) {
                const tracks = stream.getTracks();
                tracks.forEach((track) => track.stop());
            }
            document.getElementById("cameraContainer").style.display = "none";
        }

        function sendDataToServer(qrData) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/project/dashboard/lecturer/attendance_list.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("Response from server:", xhr.responseText);
                showPopupMessage("Attendance marked successfully!");
            }
        };

        let parsedData;
        try {
            parsedData = JSON.parse(qrData);
        } catch (error) {
            showPopupMessage("Invalid QR code data format.");
            return;
        }

        if (
            loggedInStudent.department_short !== parsedData.department ||
            loggedInStudent.level !== parsedData.level ||
            !parsedData.course || !parsedData.lecturer
        ) {
            showPopupMessage("QR code does not match your registered details.");
            return;
        }

        const params = `Sname=${encodeURIComponent(loggedInStudent.Sname)}&reg_no=${encodeURIComponent(loggedInStudent.reg_no)}&lecturer=${encodeURIComponent(parsedData.lecturer)}&department=${encodeURIComponent(parsedData.department)}&level=${encodeURIComponent(parsedData.level)}&course=${encodeURIComponent(parsedData.course)}&timestamp=${encodeURIComponent(parsedData.timestamp)}`;
        xhr.send(params);
    }
    </script>
</body>
</html>


