function toggleForm(formId) {
    const lecturerForm = document.getElementById("lecturer_signup_form");
    const studentForm = document.getElementById("student_signup_form");
    const chooseStatus = document.getElementById("choose_status");

    const lecturerBar = document.querySelector(".signup_form_bar:first-child");
    const studentBar = document.querySelector(".signup_form_bar:last-child");

    if (chooseStatus) chooseStatus.style.display = "none";

    if (formId === "lecturer_signup_form" && lecturerForm && studentForm) {
        lecturerForm.style.display = "flex";
        studentForm.style.display = "none";

        if (lecturerBar) lecturerBar.classList.add("active");
        if (studentBar) studentBar.classList.remove("active");
    } 
    else if (formId === "student_signup_form" && lecturerForm && studentForm) {
        lecturerForm.style.display = "none";
        studentForm.style.display = "flex";

        if (studentBar) studentBar.classList.add("active");
        if (lecturerBar) lecturerBar.classList.remove("active");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const SphoneInput = document.getElementById("student_phone_no");
    if (SphoneInput) {
        SphoneInput.addEventListener("input", function () {
            const maxLength = 11;
            if (this.value.length > maxLength) {
                this.value = this.value.slice(0, maxLength);
            }
        });
    }

    const LphoneInput = document.getElementById("lecturer_phone_no");
    if (LphoneInput) {
        LphoneInput.addEventListener("input", function () {
            const maxLength = 11;
            if (this.value.length > maxLength) {
                this.value = this.value.slice(0, maxLength);
            }
        });
    }

    const regInput = document.getElementById("reg_no");
    if (regInput) {
        regInput.addEventListener("input", function () {
            const maxLength = 11;
            if (this.value.length > maxLength) {
                this.value = this.value.slice(0, maxLength);
            }
        });
    }

    const passwordInput = document.getElementById("password");

    if (passwordInput) {
        passwordInput.addEventListener("input", function () {
            const value = this.value;

            const hasUppercase = /[A-Z]/.test(value);
            const hasLowercase = /[a-z]/.test(value);
            const hasNumber = /\d/.test(value);
            const hasSpecial = /[\W_]/.test(value);
            const hasMinLength = value.length >= 8;

            updateValidationMessage("length", hasMinLength);
            updateValidationMessage("uppercase", hasUppercase);
            updateValidationMessage("lowercase", hasLowercase);
            updateValidationMessage("number", hasNumber);
            updateValidationMessage("special", hasSpecial);
        });
    }

    function updateValidationMessage(elementId, isValid) {
        const element = document.getElementById(elementId);
        if (element) {
            if (isValid) {
                element.classList.remove("invalid");
                element.classList.add("valid");
            } else {
                element.classList.remove("valid");
                element.classList.add("invalid");
            }
        }
    }

    window.onload = function () {
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get("error");
        const userType = urlParams.get("user_type");
        const redirectTo = urlParams.get("redirect_to");
        let message = "";
    
        if (userType === "student") {
            if (error === "duplicate_account") {
                message = "A duplicate account already exists for this student.";
            } else if (error === "registration_successful") {
                message = "Student registration successful!";
            } else if (error === "missing_fields") {
                message = "Please fill in all required fields for student registration.";
            } 
        } else if (userType === "lecturer") {
            if (error === "duplicate_account") {
                message = "A duplicate account already exists for this lecturer.";
            } else if (error === "registration_successful") {
                message = "Lecturer registration successful!";
            } else if (error === "missing_fields") {
                message = "Please fill in all required fields for lecturer registration.";
            }
        }
    
        if (message) {
            const popup = document.getElementById("popup");
            const popupMessage = document.getElementById("popup-message");
            if (popup && popupMessage) {
                popupMessage.innerText = message;
                popup.style.display = "block";
                if (error === "registration_successful" && redirectTo) {
                    setTimeout(() => {
                        window.location.href = redirectTo;
                    }, 3000);
                } else {
                    setTimeout(() => {
                        popup.style.display = "none";
                    }, 3000);
                }
            }
        }
    };
    
});

function togglePassword() {
    var passwordInput = document.getElementById("password");
    var toggleButton = document.getElementById("toggleButton");

    passwordInput.type = (passwordInput.type === "password") ? "text" : "password";
    toggleButton.textContent =  (passwordInput.type === "password") ? "Show" : "Hide";
}
