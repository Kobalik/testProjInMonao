<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="main">
        <?php echo "123"; ?>
        <h2>Register</h2>
        <form action="register.php">
            <label for="password">Login</label>
            <input id="login" type="text">

            <label for="password">Password</label>
            <input id="password" type="text">

            <label for="confirm_password">Confirm password</label>
            <input id="confirm_password" type="text">

            <label for="email">Email</label>
            <input id="email" type="text">

            <label for="name">Name</label>
            <input id="name" type="text">

            <input value="submit" type="submit">
        </form>
    </div>
</body>
</html>