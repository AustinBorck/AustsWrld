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

    <?php if (!$user['profile_picture'] || is_null($user['profile_picture'])) { ?>
        <form id="upload_picture" enctype="multipart/form-data">
            <input type="file" name="image" id="imageInput"><br>
            <input type="submit" value="Upload">
        </form>
    <?php } else { ?>
        <form id="remove_photo" method="post" enctype="multipart/form-data">
            <button id="remove_picture" type="submit">Remove Picture</button>
        </form><br>
        <div id="imageContainer">
            <img src="<?php echo $user['profile_picture']; ?>" alt="<?php echo $user['fname']; ?>'s Profile Picture">
        </div>
    <?php } ?>

    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <h3>Confirm</h3>
            <p>Are you sure you want to remove the profile picture?</p>
            <div class="modal-buttons">
                <button id="confirmDeleteBtn" class="btn-confirm">Delete</button>
                <button id="cancelDeleteBtn" class="btn-cancel">Cancel</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/profile.js" async defer></script>
</body>

</html>