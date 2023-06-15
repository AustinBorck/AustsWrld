<?php
require_once('../session.php');
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AUSTS_WRLD</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>
    <?php include '../Views/header.php'; ?>
    <h2><?php echo $user['fname'] . ' ' . $user['lname']; ?></h2>

    <?php if (is_null($user['profile_picture'])) { ?>
        <form id="upload_picture" enctype="multipart/form-data">
            <input type="file" name="image" id="imageInput">
            <input type="submit" value="Upload">
        </form>
    <?php } else { ?>
        <div id="imageContainer">
            <img src="<?php echo $user['profile_picture']; ?>" alt="<?php echo $user['fname']; ?>'s Profile Picture">
        </div>
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/profile.js" async defer></script>
</body>


</html>