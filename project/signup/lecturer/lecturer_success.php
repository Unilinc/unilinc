<?php
$name = $_GET['Lname'] ?? '';
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
        <h1>Dear <?php echo htmlspecialchars($name); ?>,</h1>
        <h1>You're successfully signed up for UniLink!</h1>
        <p>Thank you! 👍 </p>
    </div>
</body>
</html>
