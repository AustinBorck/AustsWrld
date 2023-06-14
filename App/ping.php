<?php

if (isset($_POST['a'])) {
    startSession();
}

function startSession() {
    session_start();
    if (!isset($_SESSION['CSRF_TOKEN'])) {
        $_SESSION['CSRF_TOKEN'] = genCSRF();
    }
}

function genCSRF() {
    return bin2hex(random_bytes(32));
}
