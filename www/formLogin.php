<?php

    require "db.php";
    require "func.php";

    $data = $_POST;


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
            echo "You are logged in. Go to main page";
        } else {
            echo "Incorrect password or login.";
        }
    } else {
        echo array_shift($errors);
    }

