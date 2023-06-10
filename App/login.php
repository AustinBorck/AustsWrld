<?php

use App\Models\User;
require 'db.php';

if($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            loginUser($user);
            exit;
        } else {
            header("Location: index.php?error=incorrect_password");
            exit;
        }
    } else {
        header("Location: index.php?error=user_not_found");
        exit;
    }
}

function loginUser($user)
{
    $_SESSION['user'] = $user;
    header("Location: App/dashboard.php");
}

