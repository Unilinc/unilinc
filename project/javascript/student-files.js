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

document.addEventListener("DOMContentLoaded", function () {
    const fileDisplayContainer = document.getElementById("files");

    // Function to display uploaded files
    function displayUploadedFiles(files) {
        fileDisplayContainer.innerHTML = ''; 
        files.forEach(file => {
            const fileDiv = document.createElement('div');
            fileDiv.classList.add('file-item');
            fileDiv.id = `file-item-${file.file_id}`;

            const fileLink = document.createElement('a');
            fileLink.classList.add('filelink');
            fileLink.href = file.file_path;
            fileLink.target = "_blank";

            const fileNameDiv = document.createElement('div');
            fileNameDiv.classList.add('filetext');
            fileNameDiv.textContent = file.file_name;
            fileNameDiv.style.maxWidth = '90%';
            fileNameDiv.style.overflow = 'hidden';
            fileNameDiv.style.textOverflow = 'ellipsis';

            const fileExtension = file.file_name.split('.').pop().toLowerCase();
            let backgroundImage = '';

            if (fileExtension === 'pdf') {
                backgroundImage = 'url("/project/css/pdf.jpeg")';
            } else if (fileExtension === 'doc' || fileExtension === 'docx') {
                backgroundImage = 'url("/project/css/doc.jpg")';
            }

            fileDiv.style.backgroundImage = backgroundImage;
            fileDiv.style.backgroundSize = '50px 50px';
            fileDiv.style.backgroundPosition = 'center';
            fileDiv.style.backgroundRepeat = 'no-repeat';

            fileDiv.appendChild(fileLink);
            fileLink.appendChild(fileNameDiv);
            fileDisplayContainer.appendChild(fileDiv);
        });
    }

    // Fetch and display uploaded files for the student
    fetch('/project/dashboard/student/upload-files.php', {
        method: 'GET'
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            displayUploadedFiles(data.files);
        } else {
            console.log('No files found or error occurred');
        }
    })
    .catch(error => {
        console.error('Error fetching files:', error);
    });
});
