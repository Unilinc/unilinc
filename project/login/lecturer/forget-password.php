<?php
session_start();
include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && !isset($_POST['code']) && !isset($_POST['password'])) {
        $email = $_POST['email'];
        $query = "SELECT * FROM lecturers WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $code = rand(100000, 999999);
            $_SESSION['reset_code'] = $code;
            $_SESSION['reset_email'] = $email;

            $sender = 'noreply@unilink.ct.ws';
            $subj = "Password Reset Code";
            $headers = "From: UniLink Support<$sender>\n";
	    $headers .= "Reply-To: support@unilink.ct.ws\r\n";
	    $headers .= "X-Priority: 1\r\n";
	    $headers .= "MIME-Version: 1.0\r\n";
	    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $msg = "<HTML><BODY>
                     <TABLE>
                     <tr><td>========= DETAILS ==========</td></tr>
                     <tr><td>Your password reset code is: $code<td/></tr>
                     </TABLE>
                     </BODY></HTML>";
             if (mail($email, $subj, $msg, $headers)) {
    		echo "step=verify";
	     } else {
		echo "error=Email sending failed.";
	     }
		exit;
        } else {
            echo "error=Email not found.";
            exit;
        }
    } elseif (isset($_POST['code'])) {
        $entered_code = $_POST['code'];
        if ($entered_code == $_SESSION['reset_code']) {
            echo "step=reset";
            exit;
        } else {
            echo "error=Invalid code.";
            exit;
        }
    } elseif (isset($_POST['password'])) {
        session_start();
        $email = $_SESSION['reset_email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

    // Fetch the current password hash from the database
        $query = "SELECT password FROM lecturers WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
    
        if ($row = mysqli_fetch_assoc($result)) {
            $old_hashed_password = $row['password'];

        // Check if the new password matches the old password
            if (password_verify($password, $old_hashed_password)) {
                echo "error=New password cannot be same as old one!";
                exit;
            }
            } else {
                echo "error=User not found.";
                exit;
            }

        if ($password !== $confirm_password) {
            echo "error=Passwords do not match.";
            exit;
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $update_query = "UPDATE lecturers SET password = '$hashed_password' WHERE email = '$email'";

        if (mysqli_query($conn, $update_query)) {
            session_destroy();
            echo "step=redirect";
            exit;
        } else {
            echo "error=Failed to reset password.";
            exit;
        }
    }
}
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="/project/javascript/loader.js"></script>
<title>Password Reset</title>
<style>
        html {
            scroll-behavior: smooth;
        }

        html::-webkit-scrollbar {
            height: 2px;
            width: 5px;
        }

        html::-webkit-scrollbar-track {
            background: #ffffff; /* Background color of the scrollbar track */
            border-radius: 2px;
        }

        html::-webkit-scrollbar-thumb {
            background: rgb(0, 146, 63); /* Color of the scrollbar handle */
            border-radius: 2px; /* Rounds the scrollbar handle */
        }

        html::-webkit-scrollbar-button {
            display: none; /* Hides the scrollbar arrows */
        }

        body {
            font-family: Arial, sans-serif;
            background: #ffffff;
            min-height: 100vh;
            margin: 0px;
        }

        .Webcontainer {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    width: 100vw;
    height: 100vh;
}

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: auto;
        }

        .form-step {
            display: none;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        }
        .visible {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        .disabled-button {
            background: gray !important;
            cursor: not-allowed;
        }
        .disabled-button:hover {
            outline: gray 1px solid;
        }

        #return_button {
            font-size: 16px;
            position: absolute;
            top: 4%;
            left: 4%;
            cursor: pointer;
            font-weight: 700;
            color:rgb(0, 146, 63);
        }

        a {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
            color: rgb(0, 146, 63);
        }

        input {
            margin: 10px 0;
            padding: 10px;
            width: 93%;
            border: 1px solid rgb(0, 146, 63);
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        input:focus {
            border-color: rgb(0, 146, 63);
            outline: none;
        }
        button {
            background-color: rgb(0, 146, 63);
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }
        button:hover {
            background: rgb(1, 110, 48);
            outline: rgb(1, 110, 48) 1px solid;
            outline-offset: 2px;
        }
        input[readonly] {
    background:rgb(236 236 236);
    cursor: not-allowed;
}

#code-input {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

#code-input input {
    width: 20px;
    height: 20px;
    text-align: center;
    font-size: 16px;
    border: 2px solid rgb(0, 146, 63);
    border-radius: 5px;
    outline: none;
    transition: 0.3s;
}

#code-input input:focus {
    border-color: rgb(1, 110, 48);
    box-shadow: 0px 0px 5px rgba(148, 250, 117, 0.5);
}

#code-input span {
    font-size: 20px;
    font-weight: bold;
}

#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.9); 
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 9999; 
    transition: opacity 0.3s ease;
}

#logo {
    width: 50px; 
    margin-bottom: 0px;
}

#loader-bar {
    width: 8%; 
    height: 5px;
    background: rgb(255, 255, 255); 
    position: relative;
    overflow: hidden;
}

#loader-bar::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 25%;
    height: 100%;
    background: green; 
    animation: backAndForth 2s infinite ease-in-out;
}

@keyframes backAndForth {
    0% {
        left: -10%;
    }
    50% {
        left: 90%; 
    }
    100% {
        left: -10%; 
    }
}

.toggle, .toggle-con {
	position: absolute;
	top: 12%;
    left: 83%;
	transform: translateY(-50%);
	cursor: pointer;
	color: rgb(0, 146, 63);
    z-index: 9999;
	border-radius: 18px;
	font-weight: 500;
	width: 54px;
	font-size: 14px;
	height: 22px;
	text-align: center;
}

.toggle-con {
    top: 35%;
    left: 83%;
}

.popup {
    display: none;
    position: fixed;
    top: 10%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background-color: #ffffff;
    color: rgb(0, 0, 0);
    border-radius: 5px;
    border: 1px solid black;
    z-index: 1000;
    text-align: center;
}

.popup.show {
    display: block;
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translate(-50%, -60%); }
    to { opacity: 1; transform: translate(-50%, -50%); }
}

#validation-message {
    list-style-type: circle;
    width: auto;
    font-size: 14px;
    color: red;
    font-weight: 600;
    text-align: left;
    line-height: 12px;
}

#validation-message li {
    font-size: 14px;
    margin: 5px 0;
}

#validation-message .invalid {
    color: red;
}

#validation-message .valid {
    color: green;
}

@media (max-width: 768px) {
    .form-container {
        width: 90%;
        padding: 15px;
    }

    .toggle, .toggle-con {
        left: 80%;
    }

    #code-input input {
        width: 35px;
        height: 35px;
        font-size: 18px;
    }
}

@media (max-width: 480px) {
    .form-container {
        width: 95%;
        padding: 10px;
    }

    .toggle, .toggle-con {
        left: 75%;
    }

    #code-input {
        gap: 2px;
    }

    #code-input input {
        width: 30px;
        height: 30px;
        font-size: 16px;
    }
}

</style>

<script>
function showPopup(message) {
        let popup = document.getElementById("error-popup");
        let popupMessage = document.getElementById("popup-message");
        popupMessage.innerHTML = message;
        popup.classList.add("show");

        // Hide popup after 3 seconds
        setTimeout(() => {
            popup.classList.remove("show");
        }, 3000);
    }
    
    function showForm(step) {
        document.getElementById(step).classList.add("visible");
    }

    function submitForm(event, formId) {
        event.preventDefault();
        let form = document.getElementById(formId);
        let formData = new FormData(form);
        let button = form.querySelector("button");
        let input = form.querySelector("input");
        button.disabled = true;
        button.classList.add("disabled-button");
        input.readOnly = true;

    fetch("", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.includes("step=verify")) {
            showForm("verify");
        } else if (data.includes("step=reset")) {
            showForm("reset");
        } else if (data.includes("step=redirect")) {
            window.location.href = "success.php";
        } else if (data.includes("error=")) {
            showPopup(data.split("error=")[1]);
            button.disabled = false;
            button.classList.remove("disabled-button");
            input.readOnly = false;
        }
    });
}

function moveToNext(input, index) {
    let inputs = document.querySelectorAll("#code-input input[type='text']");
    
    if (!/^\d$/.test(input.value)) {
        input.value = "";
        return;
    }

    if (input.value.length === 1 && index < inputs.length) {
        inputs[index].focus();
    }

    let fullCode = Array.from(inputs).map(i => i.value).join("");
    document.getElementById("full-code").value = fullCode;

    if (fullCode.length === 6) {
        document.getElementById("verify-btn").click();
    }
}


document.addEventListener("DOMContentLoaded", () => {
    showForm("forgot");
});

document.addEventListener("DOMContentLoaded", () => {
    const resetForm = document.getElementById("reset-form");
    const passwordInput = document.querySelector("input[name='password']");
    const confirmPasswordInput = document.querySelector("input[name='confirm_password']");
    const validationMessage = document.getElementById("validation-message");
    const toggleButton = document.getElementById("toggleButton");
    const toggleComButton = document.getElementById("toggleComButton");
    
    const requirements = {
        length: document.getElementById("length"),
        uppercase: document.getElementById("uppercase"),
        lowercase: document.getElementById("lowercase"),
        number: document.getElementById("number"),
        special: document.getElementById("special"),
    };

    function togglePassword(input, button) {
        input.type = (input.type === "password") ? "text" : "password";
        button.textContent = (input.type === "password") ? "Show" : "Hide";
    }

    toggleButton.addEventListener("click", () => togglePassword(passwordInput, toggleButton));
    toggleComButton.addEventListener("click", () => togglePassword(confirmPasswordInput, toggleComButton));

    passwordInput.addEventListener("input", () => {
        const value = passwordInput.value;
        
        requirements.length.classList.toggle("valid", value.length >= 8);
        requirements.length.classList.toggle("invalid", value.length < 8);
        
        requirements.uppercase.classList.toggle("valid", /[A-Z]/.test(value));
        requirements.uppercase.classList.toggle("invalid", !/[A-Z]/.test(value));
        
        requirements.lowercase.classList.toggle("valid", /[a-z]/.test(value));
        requirements.lowercase.classList.toggle("invalid", !/[a-z]/.test(value));
        
        requirements.number.classList.toggle("valid", /[0-9]/.test(value));
        requirements.number.classList.toggle("invalid", !/[0-9]/.test(value));
        
        requirements.special.classList.toggle("valid", /[^A-Za-z0-9]/.test(value));
        requirements.special.classList.toggle("invalid", !/[^A-Za-z0-9]/.test(value));
    });

    resetForm.addEventListener("submit", (event) => {
        let isValid = true;
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password) || !/[^A-Za-z0-9]/.test(password)) {
            showPopup("Password does not meet the required criteria.");
            isValid = false;
        }

        if (password !== confirmPassword) {
            showPopup("Passwords do not match.");
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
});

</script>
</head>

<body>
    <div class="Webcontainer">
        
    <div id="return_button"><a href="/project/login.html">Back to Login</a></div>
    <div class="form-container">
        <div id="forgot" class="form-step visible">
            <h2>Forgot Password</h2>
            <form id="forgot-form" onsubmit="submitForm(event, 'forgot-form');">
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit">Send Code</button>
            </form>
        </div>
        
        <div id="verify" class="form-step">
            <h2></h2>
            <form id="verify-form" onsubmit="submitForm(event, 'verify-form');">
                <div id="code-input">
                    <input type="text" maxlength="1" oninput="moveToNext(this, 1)" required>
                        <span>-</span>
                    <input type="text" maxlength="1" oninput="moveToNext(this, 2)" required>
                        <span>-</span>
                    <input type="text" maxlength="1" oninput="moveToNext(this, 3)" required>
                        <span>-</span>
                    <input type="text" maxlength="1" oninput="moveToNext(this, 4)" required>
                        <span>-</span>
                    <input type="text" maxlength="1" oninput="moveToNext(this, 5)" required>
                        <span>-</span>
                    <input type="text" maxlength="1" oninput="moveToNext(this, 6)" required>
                    <input type="hidden" id="full-code" name="code">
                </div>
                <button type="submit">Verify Code</button>
            </form>
        </div>
        
        <div id="reset" class="form-step">
            <h2></h2>
            <form id="reset-form" onsubmit="submitForm(event, 'reset-form');">
                <input id="pass" type="password" name="password" placeholder="New Password" required>
                <div id="toggleButton" class="toggle" onclick="togglePassword()">Show</div>
                <input id="con-pass" type="password" name="confirm_password" placeholder="Confirm Password" required>
                <div id="toggleComButton" class="toggle-con" onclick="togglePassword()">Show</div>
                <ul id="validation-message">
                    <li id="length" class="invalid">Minimum length of 8 characters</li>
                    <li id="uppercase" class="invalid">At least one uppercase letter</li>
                    <li id="lowercase" class="invalid">At least one lowercase letter</li>
                    <li id="number" class="invalid">At least one number</li>
                    <li id="special" class="invalid">At least one special character</li>
                </ul>
                <button type="submit" id="changePasswordBtn">Change Password</button>
            </form>
        </div>
    </div>

    <div id="error-popup" class="popup">
        <span id="popup-message"></span>
    </div>

    <div id="preloader">
        <img src="/project/images/nav_bar-logo.png" alt="Brand Logo" id="logo">
        <div id="loader-bar"></div>
        <p id="connectionMessage" style="color: white; display: none;">Internet connection disabled. Please Reconnect!</p>
    </div>

    </div>
</body>
</html>