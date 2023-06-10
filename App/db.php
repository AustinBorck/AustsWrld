<?php

$server_name = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'austsworld';


try {
    $pdo = new PDO("mysql:host=$server_name;dbname=$db_name", $user_name, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}
