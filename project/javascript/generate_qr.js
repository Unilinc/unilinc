function generateQRCode() {
    const dept = document.getElementById("dept").value;
    const lvl = document.getElementById("lvl").value;
    const course = document.getElementById("course").value;

    if (!dept || !lvl || !course) {
        const popup = document.getElementById('popup_message');
        popup.classList.add('show');
        setTimeout(() => popup.classList.remove('show'), 3000);
        return;
    }

    const now = new Date();
    const offset = now.getTimezoneOffset() * 60000; 
    const localTimestamp = new Date(now - offset).toISOString().slice(0, 19).replace("T", " "); 

    const qrData = JSON.stringify({ lecturer: lecturerId, department: dept, level: lvl, course: course, timestamp: localTimestamp });

    const canvas = document.getElementById("qrcodeCanvas");
    QRCode.toCanvas(canvas, qrData, function(error) {
        if (error) console.error(error);
        else console.log("QR code generated successfully!");
    });

    document.getElementById("qrModal").style.display = "block";
}

function closeModal() {
    document.getElementById("qrModal").style.display = "none";
}

window.onclick = function(event) {
    const modal = document.getElementById("qrModal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
}