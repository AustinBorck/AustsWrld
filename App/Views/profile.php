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
</head>
<body>
    <?php include '../Views/header.php'; ?>
        <h2><?php echo($user['fname'] . ' ' . $user['lname'])?></h2>
    </div>
</body>
</html>
