<?php

require('../db.php');
require('../session.php');

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
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
  $stmt->execute();
}
