<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <script>
        setTimeout(function() {
            window.location.href = "/project/login.html";
        }, 5000); 
    </script>
</head>
<body style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <div style="width:auto; height: auto; text-align: center;">
        <img src="/project/images/tick.gif" width="240px"/>
        <h2>Password Reset Successful</h2>
        <p>You will be redirected to the login page in 5 seconds.</p>
    </div>
</body>
</html>