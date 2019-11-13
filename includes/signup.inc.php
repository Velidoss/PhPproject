<?php

if (isset($_POST['signup-submit'])){


    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-rep'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        //так ак мы не хотим выполнять никакой код после того как юзер получил ошибку
        exit(); 
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid".$username);
        exit();
    }
    //для поиска юзаем регексп
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invaliduid&mail".$email);
        exit();
    }

}