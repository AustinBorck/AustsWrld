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
    <div class="container">
        <h2>test</h2>
        <button class="post-button">Make a Post</button>
    </div>

    <div class="modal">
        <form name="create-post">
            <div class="modal-content">
                <span class="close">&times;</span>
                <input type="text" name="title" placeholder="Title">
                <textarea name="content" placeholder="Content"></textarea>
                <button type="submit">Post</button>
            </div>
        </form>
    </div>
    <script src="../js/dashboard.js" async defer></script>
</body>
</html>
