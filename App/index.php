<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AUSTS_WRLD</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../App/css/login.css">
    </head>
    <body>
    <div class="container">
        <h2>WELCOME TO AUSTS_WRLD</h2>

        <form name="login" action="App/login.php" method="post">
            <input type="text" placeholder="Username" name="username"/>
            <input type="password" placeholder="Password" name="password"/>
            <input type="submit" id="login_button" value="Login" />
        </form>
        <button id="register">Signup</button>
    </div>

    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Registration Form</h2>
            <form id="registrationForm" method="post" action="App/register.php">
                <label for="name">Name:</label>
                <input name="name" type="text" id="name" required>
                <br>
                <label for="username">Username:</label>
                <input name="username" type="text" id="username" required>
                <br>
                <label for="password">Password:</label>
                <input name="password" type="password" id="password" required>
                <br>
                <label for="confirm-password">Confirm Password:</label>
                <input name="confirm-password" type="password" id="confirm-password" required>
                <br>
                <label for="email">Email:</label>
                <input name="email" type="text" id="email" required>
                <br>
                <button id="register_btn" type="submit">Register</button>
            </form>
        </div>
    </div>

    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span id="error_message" class="message"></span>
        </div>
    </div>
        
    <script src="../App/js/login.js" async defer></script>
    </body>
</html>
