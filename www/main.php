<?php
    // Считываем XML в переменную
    $users = simplexml_load_file("bd.xml");
    // Создаём "соль" для шифрования
    $salt = "Q4sf56ujg7";

    // Добавление данных в БД
    function addUser($login, $password, $email, $name)
    {
        global $users;
        $user = $users->addChild('user');
        $user->addChild('login', $login);
        $user->addChild('password', encrypt($password));
        $user->addChild('email', $email);
        $user->addChild('name', $name);
    }

    // Проверка уникальных данных на уникальность в БД 
    function isLoginAndEmailUniq($login, $email)
    {

    }

    // Шифрование пароля
    function encrypt($password)
    {
        global $salt;
        return md5(md5($salt) . md5($password));
    }

    // Сверка пароля введённого пользователем с паролем в бд
    function checkPassword($login, $password)
    {
        global $users;
        foreach ($users->xpath('//user') as $user) {
            if ((string) $user->login === $login) {
                if ((string) $user->password === $password) {
                    return true;
                }
            }
        }

        return false;
    }

    // Проверка наличия пользователя в БД
    function isUserExist($login)
    {
        global $users;
        foreach ($users->xpath('//user') as $user) {
            if ((string) $user->login === $login) {
                return true;
            }
        }

        return false;
    }


    // Приветствие пользователя


    // Вывод ошибки



    // Тесты
    addUser('ddd', 'ddd', 'dd', 'dd');

    echo "\n";