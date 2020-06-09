<?php
    require "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Test</title>
</head>
<body>
    <div class="main">
        <h2>Main page</h2>
        <?php if ( isset($_SESSION["logged_user"]) ) : ?>
        <h1>Hello, <?php echo $_SESSION["logged_user"]; ?>!</h1>
        <hr></ht>
        <a href="/logout.php">Logout</a>
        <?php else : ?>
            <input type="button" onClick="window.location='http://testprojinmonao/register.php'" value="Register page">
            <input type="button" onClick="window.location='http://testprojinmonao/auth.php'" value="Autorization page">
        <?php endif; ?>
    </div>
</body>
</html>