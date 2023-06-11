<?php

if ($_POST['logout']) {
    unset($_SESSION['user']);
    session_destroy();
    header("Location: ../App");
    exit;
}