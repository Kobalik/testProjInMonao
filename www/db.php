<?php
    // Считываем XML в переменную
    $users = simplexml_load_file("bd.xml");

    session_start();