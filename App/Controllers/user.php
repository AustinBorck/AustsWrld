<?php
use App\Models\User;
require '../db.php';

if ($_POST['update']) {
    updateUser($_POST);
}

function updateUser($data)
{
    $query = "UPDATE users SET fname = :fname, lname = :lname, username = :username, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':fname', $data['fname'], PDO::PARAM_STR);
    $stmt->bindValue(':lname', $data['lname'], PDO::PARAM_STR);
    $stmt->bindValue(':username', $data['username'], PDO::PARAM_STR);
    $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
    $stmt->bindValue(':id', $data['id'], PDO::PARAM_INT);
    $result = $stmt->execute();

    if ($result) {
        header("Location: ../Views/dashboard.php?success=profile_updated");
        exit;
    } else {
        header("Location: ../Views/dashboard.php?error=unknown_error");
        exit;
    }
}