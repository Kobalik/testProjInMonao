<?php
    // Создаём "соль" для шифрования
    $salt = "Q4sf56ujg7";

    // Добавление данных в БД
    function addUser($login, $password, $email, $name)
    {
        global $users;
        if ( isLoginAndEmailUniq($login, $email) ){
            $user = $users->addChild('user');
            $user->addChild('login', $login);
            $user->addChild('password', encrypt($password));
            $user->addChild('email', $email);
            $user->addChild('name', $name);
            $users->asXML('bd.xml');
            return "Success you are sign up! Go to <a href='auth.php'>authorization page</a>";
        }
        return false;

    }

    // Проверка уникальных данных на уникальность в БД 
    function isLoginAndEmailUniq($login, $email)
    {
        global $users;
        foreach ($users->xpath('//user') as $user) {
            if ((string) $user->login === $login || (string) $user->email === $email) {
                return false;
            }
        }
        return true;
    }

    // Шифрование пароля
    function encrypt($password)
    {
        global $salt;
        return md5(md5($salt) . md5($password));
    }

    // Сверка пароля введённого пользователем с паролем в бд
    function checkUserData($login, $password)
    {
        global $salt;
        global $users;
        foreach ($users->xpath('//user') as $user) {
            if ((string) $user->login === $login) {
                if ((string) $user->password === md5(md5($salt) . md5($password))) {
                    return true;
                }
            }
        }

        return false;
    }

    // Поиск имени по логину
    function takeName($login)
    {
        global $users;
        foreach ($users->xpath('//user') as $user) {
            if ((string) $user->login === $login) {
                return $user->name;
            }
        }

        return false;
    }

