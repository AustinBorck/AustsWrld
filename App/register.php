<?php
use App\Models\User;
require 'db.php';

if ($_POST) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $email = $_POST['email'];

    if ($password != $confirm_password) {
        header("Location: ../index.php?error=password_mismatch");
        exit;
    }

    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        header("Location: index.php?error=username_taken");
        exit;
    }

    $query = "INSERT INTO users (fname, lname, username, password, email, active) VALUES (:fname, :lname, :username, :password, :email, 1)";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindValue(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $result = $stmt->execute();

    if ($result) {
        $user = [
            'fname' => $fname,
            'lname' => $lname,
            'username' => $username,
            'email' => $email
        ];
        loginUser($user);
    } else {
        header("Location: index.php?error=unknown_error");
        exit;
    }
}

function loginUser($user)
{
    $_SESSION['user'] = $user;
    header("Location: Views/dashboard.php");
}