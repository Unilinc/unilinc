document.addEventListener("DOMContentLoaded", () => {
    const lecturerForm = document.getElementById("lecturer_signup_form");
    const studentForm = document.getElementById("student_signup_form");
    const popup = document.getElementById("popup");
    const popupMessage = document.getElementById("popup-message");

    const showPopup = (message) => {
        popupMessage.textContent = message;
        popup.style.display = "block";
        setTimeout(() => {
            popup.style.display = "none";
        }, 3000);
    };

    const validateLecturerForm = () => {
        let isValid = true;

        const Lname = document.getElementById("Lname");
        if (!Lname.value.length >= 8) {
            isValid = false;
            Lname.style.border = "2px solid red";
            showPopup("Full name is required.");
            return false;
        } else {
            Lname.style.border = "none";
        }

        const phoneNo = document.getElementById("phone_no");
        if (phoneNo.value.length !== 11) {
            isValid = false;
            phoneNo.style.border = "2px solid red";
            showPopup("Phone number must be exactly 11 characters.");
            return false;
        } else {
            phoneNo.style.border = "none";
        }

        const email = document.getElementById("lecturer_email");
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
            isValid = false;
            email.style.border = "2px solid red";
            showPopup("Enter a valid email address.");
            return false;
        } else {
            email.style.border = "none";
        }

        const password = document.getElementById("password");
        const lengthValid = password.value.length >= 8;
        const uppercaseValid = /[A-Z]/.test(password.value);
        const lowercaseValid = /[a-z]/.test(password.value);
        const numberValid = /[0-9]/.test(password.value);
        const specialValid = /[^A-Za-z0-9]/.test(password.value);

        if (!lengthValid || !uppercaseValid || !lowercaseValid || !numberValid || !specialValid) {
            isValid = false;
            password.style.border = "2px solid red";
            showPopup("Password does not meet the criteria.");
            return false;
        } else {
            password.style.border = "none";
        }

        return isValid;
    };

    const validateStudentForm = () => {
        let isValid = true;

        const Sname = document.getElementById("Sname");
        if (!Sname.value.length >= 8) {
            isValid = false;
            Sname.style.border = "2px solid red";
            showPopup("Student full name is required.");
            return false;
        } else {
            Sname.style.border = "none";
        }

        const regNo = document.getElementById("reg_no");
        if (regNo.value.length !== 11) {
            isValid = false;
            regNo.style.border = "2px solid red";
            showPopup("Registration number must be exactly 11 characters.");
            return false;
        } else {
            regNo.style.border = "none";
        }

        const fac = document.getElementById("fac");
        if (!fac.value) {
            isValid = false;
            fac.style.border = "2px solid red";
            showPopup("Faculty must be selected.");
            return false;
        } else {
            fac.style.border = "none";
        }

        const dept = document.getElementById("dept");
        if (!dept.value) {
            isValid = false;
            dept.style.border = "2px solid red";
            showPopup("Department must be selected.");
            return false;
        } else {
            dept.style.border = "none";
        }

        const level = document.getElementById("level");
        if (!level.value) {
            isValid = false;
            level.style.border = "2px solid red";
            showPopup("Level must be selected.");
            return false;
        } else {
            level.style.border = "none";
        }

        const phoneNo = document.getElementById("student_phone_no", "lecturer_phone_no");
        if (phoneNo.value.length !== 11) {
            isValid = false;
            phoneNo.style.border = "2px solid red";
            showPopup("Phone number must be exactly 11 characters.");
            return false;
        } else {
            phoneNo.style.border = "none";
        }

        const email = document.getElementById("student_email");
        const emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailReg.test(email.value)) {
            isValid = false;
            email.style.border = "2px solid red";
            showPopup("Enter a valid email address.");
            return false;
        } else {
            email.style.border = "none";
        }

        return isValid;
    };

    lecturerForm.addEventListener("submit", (event) => {
        if (!validateLecturerForm()) {
            event.preventDefault();
        }
    });

    studentForm.addEventListener("submit", (event) => {
        if (!validateStudentForm()) {
            event.preventDefault();
        }
    });
});
