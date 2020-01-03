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
    elseif ($password !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    //если такой логин уже занят
    else{
        //знак вопроса 
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        //всегда проверяем на наличие ошибок если скл запрос не сработает
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{

            //По сути -проверяем есть ли  пользователь в базе с таким же логином
            mysqli_stmt_bind_param($stmt, "s", $username);
            //Выполняем все это
            mysqli_stmt_execute($stmt);
            //выводим результат
            mysqli_stmt_store_result($stmt);
            // Возвращаем к-во рядов
            $resultCheck = mysqli_stmt_num_rows($stmt);
            //если $resultCheck больше одного, то значит юзер с таким именем уже есть, выводим ошибку
            if ($resultCheck >0){
                header("Location: ../signup.php?error=usertaken&mail".$email);
                exit();
            }
            //если $resultCheck не больше 0, значит можно вносить юзера в датабазу
            else{
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                //опять же - проверяем запрос
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else{
                    //Хешим пароль
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    //s - string, i - integer, b - blob, d - double
                    //По сути - указываем то что будем класть в датабазу (если две строки - с юзернеймом, и паролем, нужно писать две буквы s)
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    //вставляем данніе в таблицу о картинках юзеров
                    $sql = "SELECT * FROM users WHERE uidUsers='$username';";
                    $resultCheck = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($resultCheck)>0){
                            while($row = mysqli_fetch_assoc($resultCheck)){
                                $userId = $row['idUsers'];
                                $sql = "INSERT INTO profileimage (userId, status) values ('$userId', 1)";
                                mysqli_query($conn, $sql);

                            }
                        }


                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
            

        }
    
    }
    //Закріваем sql  для экономии памяти и тд
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
//Если юзер попытается залезть в эту форму без нажатия непосредственно кнопки "Signup"
else{
    header("Location: ../signup.php");
    exit();
}