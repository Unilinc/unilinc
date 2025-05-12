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
    const modal = document.getElementById("upload_form");
    const overlay = document.getElementById("modal-overlay");

    document.getElementById("new-file").addEventListener("click", function () {
        modal.style.display = "block";
        overlay.style.display = "block";
    });

    overlay.addEventListener("click", function () {
        modal.style.display = "none";
        overlay.style.display = "none";
    });

    document.getElementById("close-modal").addEventListener("click", function () {
        modal.style.display = "none";
        overlay.style.display = "none";
    });
});

function clearForm() {
    let form = document.getElementById('upload_form');
    if (form) {
        form.reset(); 
    }

    if (fileInput) {
        fileInput.value = '';
    }

    let fileNameDisplay = document.getElementById('fileName');
    if (fileNameDisplay) {
        fileNameDisplay.textContent = 'No file chosen';
    }

    let formBox = document.getElementById("upload_form");
    let overlay = document.getElementById("modal-overlay");

    if (formBox) formBox.style.display = 'none';
    if (overlay) overlay.style.display = 'none';
}

document.getElementById('upload_form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const fileInput = document.getElementById('fileInput');
    const courseCode = document.querySelector('input[name="course_code"]').value.trim();
    const popupMessage = document.getElementById('popup_message');
    const closeButton = document.getElementById('close-modal'); 

    function showMessage(message) {
        popupMessage.textContent = message;
        popupMessage.style.display = 'block';
        setTimeout(() => {
            popupMessage.style.display = 'none';
        }, 3000);
    }

    if (fileInput.files.length === 0) {
        showMessage('Kindly select files to upload');
        return;
    }

    if (courseCode === '') {
        showMessage('Kindly provide course code');
        return;
    }

    if (fileInput.files.length > 5) {
        showMessage('Uploaded files cannot be more than 5 files');
        return;
    }

    const formData = new FormData();
    let files = document.getElementById("fileInput").files;
    for (let i = 0; i < files.length; i++) {
        formData.append("fileInput[]", files[i]);  
    }
    formData.append('course_code', courseCode);
    formData.append("lecturer_id", "<?php echo $_SESSION['lecturer_id']; ?>");

    const progressContainer = document.createElement('div');
    progressContainer.classList.add('progress-container');
    const progressBar = document.createElement('div');
    progressBar.classList.add('progress-bar');
    const fileName = document.createElement('span');
    fileName.classList.add('file-name');
    fileName.textContent = `Uploading: ${files[0].name}`;
    const progressPercentage = document.createElement('span');
    progressPercentage.classList.add('progress-percentage');

    progressContainer.appendChild(fileName);
    progressContainer.appendChild(progressBar);
    progressContainer.appendChild(progressPercentage);
    document.body.appendChild(progressContainer);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/project/dashboard/lecturer/upload.php', true);

    xhr.upload.onprogress = function(event) {
        if (event.lengthComputable) {
            const percent = (event.loaded / event.total) * 100;
            progressBar.style.width = `${percent}%`;  
            progressPercentage.textContent = `${Math.round(percent)}%`;  
        }
    };

    xhr.onload = function () {
        if (xhr.status === 200) {
            showMessage('Selected files uploaded successfully');
            clearForm();

            setTimeout(() => {
                location.reload();  
            }, 3000);

        } else {
            showMessage('Error uploading files. Please try again.');
        }
    };

    xhr.send(formData);
});

document.getElementById('close-modal').addEventListener('click', function() {
    clearForm();
});

document.addEventListener("DOMContentLoaded", function () {
    const fileDisplayContainer = document.getElementById("files");  

    function displayUploadedFiles(files) {
        fileDisplayContainer.innerHTML = ''; 
        files.forEach(file => {
            const fileDiv = document.createElement('div');
            fileDiv.classList.add('file-item');
            fileDiv.id = `file-item-${file.file_id}`; 

            const fileLink = document.createElement('a');
            fileLink.classList.add('filelink');
            fileLink.href = file.file_path; 
            
            const fileNameDiv = document.createElement('div');
            fileNameDiv.classList.add('filetext');
            fileNameDiv.textContent = file.file_name;
            fileNameDiv.style.maxWidth = '90%';  
            fileNameDiv.style.overflow = 'hidden';  
            fileNameDiv.style.textOverflow = 'ellipsis';

            const deleteButton = document.createElement('button');
            deleteButton.classList.add('close-btn');
            deleteButton.textContent = '×'; 

            deleteButton.addEventListener('click', function () {
                showDeleteModal(file.file_id);
            });
            
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
            fileDiv.appendChild(deleteButton); 
            fileLink.appendChild(fileNameDiv);
            fileDisplayContainer.appendChild(fileDiv);
        });
    }

    function showDeleteModal(fileId) {
        const modal = document.getElementById('delete-modal');
        const confirmDeleteButton = document.getElementById('confirm-delete');
        const cancelDeleteButton = document.getElementById('cancel-delete');
    
        modal.style.display = 'flex';  
    
        confirmDeleteButton.onclick = function() {
            deleteFile(fileId); 
            modal.style.display = 'none';  
        };
    
        cancelDeleteButton.onclick = function() {
            modal.style.display = 'none';  
        };
    }

    function deleteFile(fileId) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/project/dashboard/lecturer/delete_file.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            const popupMessage = document.getElementById('popup_message'); 
    
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
    
                setTimeout(() => {
                    location.reload();  
                }, 3000);
                
                if (response.status === 'success') {
                    showMessage(response.message); 
                    document.getElementById(`file-item-${fileId}`).remove();
                } else {
                    showMessage(response.message); // Error message
                }
            } else {
                showMessage('Error deleting file. Please try again.');
            }
        };
        xhr.send('file_id=' + fileId);
    }
    
    // Function to display the message in the popup
    function showMessage(message) {
        const popupMessage = document.getElementById('popup_message');
        popupMessage.textContent = message;
        popupMessage.style.display = 'block';
        setTimeout(() => {
            popupMessage.style.display = 'none';
        }, 3000); // Hide after 3 seconds
    }
    

    // Fetch and display uploaded files
    fetch('/project/dashboard/lecturer/upload.php', {
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
