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
    <title>Authorization</title>
</head>
<body>
    <?php
        if ( isset($data["do_login"]) ) {
            // Создаём массив куда впишем все ошибки
            $errors = array();
            // Проверяем на пустоту все данные с обрезанием пробелов
            if ( trim($data['login']) == '' ) {
                $errors[] = "Enter you login";
            }

            // В пароле не обрезаем, пробелы могут быть использованы в качестве пароля
            if ( $data['password'] == '' ) {
                $errors[] = "Enter you password";
            }
            
            // Проверяем наличеие ошибок, если их нет - авторизуем
            if ( empty($errors) ) {
                // Сверяем данные в бд с введёнными
                if ( checkUserData(trim($data['login']), $data['password']) ) {
                    $_SESSION['logged_user'] = (string) takeName(trim($data["login"]));
                    echo "<div style='text-align: center;'><h1 style='color: green;'>You are logged in. Go to <a href='index.php'>main page</a></h1></div>";
                } else {
                    echo "<div style='text-align: center;'><h1 style='color: red;'>" . "Incorrect password or login." . "</h1></div>";
                }
            } else {
                echo "<div style='text-align: center;'><h1 style='color: red;'>" . array_shift($errors) . "</h1></div>";
            }
        }
    ?>
    <div class="main">
        <h2>Authorization</h2>
        <form id="authform" action='/auth.php' method="POST">
            <label for="login">Login</label>
            <input name="login" type="text" placeholder="Your login" value="<?php echo $data["login"]; ?>">

            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Your password" value="<?php echo $data["password"]; ?>">

            <button id="submitButton" name="do_login" class=button>Login</button>
        </form>
    </div>
    <script type="text/javascript" charset="utf8" src="libs/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="src/main.js"></script>
    <script type="text/javascript" charset="utf8" src="src/ajax.js"></script>
</body>
</html>