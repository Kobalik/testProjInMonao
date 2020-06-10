<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Authorization</title>
</head>
<body>
    <div class="main">
        <h2>Authorization</h2>
        <form id="authform" action='/formLogin.php' method="POST">
            <label for="login">Login</label>
            <input name="login" type="text" placeholder="Your login" value="<?php echo $data["login"]; ?>">

            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Your password" value="<?php echo $data["password"]; ?>">

            <button id="submitButton" name="do_login" class=button>Login</button>
        </form>
        <input type="button" onClick="window.location='http://testprojinmonao/register.php'" value="Register page">
        <input type="button" onClick="window.location='http://testprojinmonao/index.php'" value="Main page">
    </div>
    <script type="text/javascript" charset="utf8" src="libs/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="src/main.js"></script>
    <script type="text/javascript" charset="utf8" src="src/ajax.js"></script>
</body>
</html>