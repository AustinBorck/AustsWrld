<?php

if ($_POST['logout']) {
    unset($_SESSION['user']);
    $_SESSION['authenticated'] = false;
    session_destroy();
    header("Location: ../App");
    exit;
}