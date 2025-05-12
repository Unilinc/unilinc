function toggleForm(formId) {
    const lecturerForm = document.getElementById("lecturer_login_form");
    const studentForm = document.getElementById("student_login_form");

    const lecturerBar = document.querySelector(".login_form_bar:first-child");
    const studentBar = document.querySelector(".login_form_bar:last-child");


    if (formId === 'lecturer_login_form') {
        lecturerForm.style.display = "flex";
        studentForm.style.display = "none";

        lecturerBar.classList.add("active");
        studentBar.classList.remove("active");
    } 
    else if (formId === 'student_login_form') {
        lecturerForm.style.display = "none";
        studentForm.style.display = "flex";
        
        studentBar.classList.add("active");
        lecturerBar.classList.remove("active");
    }

    document.getElementById("reg_no").addEventListener("input", function() {
        const maxLength = 11;
        if (this.value.length > maxLength) {
            this.value = this.value.slice(0, maxLength);
        }
    });
}

window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');
            const userType = urlParams.get('user_type');
            let message = '';

            if (userType === 'student') {
                if (error === 'invalid_name') {
                    message = 'The student name you entered is incorrect.';
                } else if (error === 'invalid_reg_no') {
                    message = 'The registration number you entered is incorrect.';
                } else if (error === 'invalid_name_and_reg_no') {
                    message = 'Both the student name and registration number are incorrect.';
                } else if (error === 'success') {
                    message = 'Login successful!';
                }
            } else if (userType === 'lecturer') {
                if (error === 'invalid_password') {
                    message = 'Incorrect password, please try again.';
                } else if (error === 'no_account') {
                    message = 'Email is not registered.';
                } else if (error === 'success') {
                    message = 'Login successful!';
                }
            }

            if (message) {
                const popup = document.getElementById('popup');
                const popupMessage = document.getElementById('popup-message');
                popupMessage.innerText = message;
                popup.style.display = 'block';
                setTimeout(() => { popup.style.display = 'none'; }, 3000);
            }
        };

        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var toggleButton = document.getElementById("toggleButton");
        
            passwordInput.type = (passwordInput.type === "password") ? "text" : "password";
            toggleButton.textContent =  (passwordInput.type === "password") ? "Show" : "Hide";
        }

        function showPreloaderAndRedirect(url) {
            const preloader = document.getElementById('preloader');
            preloader.style.display = 'flex'; 
            setTimeout(() => {
                preloader.style.display = 'none'; 
                window.location.href = url; 
            }, 5000); 
        }