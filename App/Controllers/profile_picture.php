<?php

require('../db.php');
require('../session.php');

if (!$_POST['remove_picture'] && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
  $file_name = $_SESSION['user']['username'] . $_FILES['image']['name'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_path = '../../data/private/profilepictures/' . $file_name;

  // Move the uploaded file to the desired directory
  move_uploaded_file($file_tmp, $file_path);

  $user_name = $_SESSION['user']['username'];

  $query = "UPDATE users SET profile_picture = :file_path WHERE username = :user_name";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':file_path', $file_path, PDO::PARAM_STR);
  $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
  $_SESSION['user']['profile_picture'] = $file_path;
  $stmt->execute();
}

if ($_POST['remove_photo']) {
  $user_name = $_SESSION['user']['username'];
  $profile_picture = $_SESSION['user']['profile_picture'];
  $query = "UPDATE users SET profile_picture = NULL WHERE username = :user_name";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
  $_SESSION['user']['profile_picture'] = NULL;
  if (file_exists($profile_picture)) {
    unlink($profile_picture);
  }
  $stmt->execute();
}