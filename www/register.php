<?php 
    require "db.php";
    require "func.php";

    $data = $_POST;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Register</title>
</head>
<body>
    <?php
        if ( isset($data["do_register"]) ) {
            $errors = array();
            if ( trim($data['login']) == '' ) {
                $errors[] = "Enter you login";
            }

            if ( $data['password'] == '' ) {
                $errors[] = "Enter you password";
            }

            if ( $data['confirm_password'] != $data['password'] ) {
                $errors[] = "Passwords must match";
            }

            if ( trim($data['email']) == '' ) {
                $errors[] = "Enter you Email";
            }

            if ( trim($data['name']) == '' ) {
                $errors[] = "Enter you name";
            }

            if ( empty($errors) ) {
                // Регистрируем
                $reg = addUser(trim($data['login']), $data['password'], trim($data['email']), trim($data['name']));
                if ( $reg ) {
                    echo "<div style='text-align: center;'><h1 style='color: green;'>". $reg ."</h1></div>";
                } else {
                    echo "<div style='text-align: center;'><h1 style='color: red;'> Login or email not uniq </h1></div>";
                }
            } else {
                echo "<div style='text-align: center;'><h1 style='color: red;'>" . array_shift($errors) . "</h1></div>";
            }
        }
    ?>
    <div class="main">
        <h2>Register</h2>
        <form action="/register.php" method="POST">
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
    </div>
    <script type="text/javascript" charset="utf8" src="libs/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="src/main.js"></script>
    <script type="text/javascript" charset="utf8" src="src/ajax.js"></script>
</body>
</html>