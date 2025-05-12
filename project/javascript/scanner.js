document.addEventListener("DOMContentLoaded", function () {   
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
            
            const studentName = document.querySelector("#studentDetails span:nth-child(1)").textContent.replace("Name: ", "").trim();
            const studentRegNo = document.querySelector("#studentDetails span:nth-child(3)").textContent.replace("Registration Number: ", "").trim();
            const studentFaculty = document.querySelector("#studentDetails span:nth-child(5)").textContent.replace("Faculty: ", "").trim();
            const studentDept = document.querySelector("#studentDetails span:nth-child(7)").textContent.replace("Department: ", "").trim();
            const studentLevel = document.querySelector("#studentDetails span:nth-child(9)").textContent.replace("Level: ", "").trim();
        
            const params = `Sname=${encodeURIComponent(studentName)}&reg_no=${encodeURIComponent(studentRegNo)}&faculty=${encodeURIComponent(studentFaculty)}&department=${encodeURIComponent(studentDept)}&level=${encodeURIComponent(studentLevel)}&course=${encodeURIComponent(parsedData.course)}&timestamp=${encodeURIComponent(parsedData.timestamp)}`;
            
            xhr.send(params);
        }        
    });

    function toggleMenu() {
        const menuIcon = document.getElementById("menu-icon");
        const menuOptions = document.getElementById("menu-options");
    
        if (menuOptions.style.transform === "translateX(110%)" || menuOptions.style.transform === "") {
            menuOptions.style.transform = "translateX(0%)"; 
            menuIcon.textContent = "×";  
        } else {
            menuOptions.style.transform = "translateX(110%)";  
            menuIcon.textContent = "☰";  
        }
    }
    
    document.addEventListener('click', (event) => {
        const menu = document.getElementById("menu-options");
        const menuIcon = document.getElementById("menu-icon");
    
        if (!menu.contains(event.target) && !menuIcon.contains(event.target)) {
            menu.style.transform = "translateX(110%)";
            menuIcon.textContent = "☰";
        }
    });