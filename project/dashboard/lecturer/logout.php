<?php
session_start();

session_unset();  
session_destroy(); 


header("Location: /project/login.html?logout=success");
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: white; 
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 9999; 
    visibility: hidden;
    opacity: 0; 
    transition: opacity 0.3s ease;
}

/* Brand logo */
#logo {
    width: 50px; /* Adjust size */
    margin-bottom: 0px;
}

/* Loader bar */
#loader-bar {
    width: 8%; 
    height: 5px;
    background: rgb(255, 255, 255); 
    position: relative;
    overflow: hidden;
}

/* Loading animation */
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
    </style>
</head>
<body>
    <div id="preloader">
        <img src="/project/images/nav_bar-logo.png" alt="Brand Logo" id="logo">
        <div id="loader-bar"></div>
    </div>
</body>
</html>