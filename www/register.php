<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Register</title>
</head>
<body>
    <div class="main">
        <h2>Register</h2>
        <form action="/formReg.php" method="POST">
            <label for="login">Login</label>
            <input name="login" type="text" placeholder="Your login" value="<?php echo $data["login"]; ?>">

            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Your password" value="<?php echo $data["password"]; ?>">

            <label for="confirm_password">Confirm password</label>
            <input name="confirm_password" type="password" placeholder="Please confirm you password" value="<?php echo $data["confirm_password"]; ?>">

            <label for="email">Email</label>
            <input name="email" type="text" placeholder="Your email" value="<?php echo $data["email"]; ?>">

            <label for="name">Name</label>
            <input name="name" type="text" placeholder="Your name" value="<?php echo $data["name"]; ?>">
            
            <button id="submitButton" name="do_register" class=button>Sign up</button>
        </form>
        <input type="button" onClick="window.location='http://testprojinmonao/auth.php'" value="Autorization page">
        <input type="button" onClick="window.location='http://testprojinmonao/index.php'" value="Main page">
    </div>
    <script type="text/javascript" charset="utf8" src="libs/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="src/main.js"></script>
    <script type="text/javascript" charset="utf8" src="src/ajax.js"></script>
</body>
</html>