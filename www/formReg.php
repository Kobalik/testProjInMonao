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

    if ( $data['confirm_password'] != $data['password'] ) {
        $errors[] = "Passwords must match";
    }

    if ( trim($data['email']) == '' ) {
        $errors[] = "Enter you Email";
    }

    if ( trim($data['name']) == '' ) {
        $errors[] = "Enter you name";
    }

    // Проверяем наличеие ошибок, если их нет - регистрируем
    if ( empty($errors) ) {
        // При регистрации происходит проверка на уникальность логина и почты
        $reg = addUser(trim($data['login']), $data['password'], trim($data['email']), trim($data['name']));
        if ( $reg ) {
            echo $reg;
        } else {
            echo "Login or email not uniq";
        }
    } else {
        echo array_shift($errors);
    }