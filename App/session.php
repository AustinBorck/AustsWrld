<?php
session_start();

function requireAuthentication() {
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        header("Location: login.php");
        exit;
    }
}

