<?php

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

        <form name="login" action="../App/Controllers/login.php" method="post">
            <input type="text" placeholder="Username" name="username"/>
            <input type="password" placeholder="Password" name="password"/>
            <input type="submit" id="login_button" value="Login" />
        </form>
        <button id="register">Sign Up</button>
    </div>

    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Registration Form</h2>
            <form id="registrationForm" method="post" action="App/Controllers/register.php">
                <label for="fname">First Name:</label>
                <input name="fname" type="text" id="fname" required>
                <br>
                <label for="lname">Last Name:</label>
                <input name="lname" type="text" id="lname" required>
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
