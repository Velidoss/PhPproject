<?php

if (isset($_POST['login-submit'])){

    require 'dbh.inc.php';
    //предсотавляем возможность зарегаться с помощью емейла     
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    //если одно из полей пустое - отправляем ошбику и отправляем на индексную страницу
    if (empty($mailuid) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else{
        //берем из датабазы емейл или юзернейм и проверяем на наличие
        $sql ="SELECT * FROM users WHERE uidUsers=? OR emailUsers=?; ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            //результат ответа от датабазы
            $result =mysqli_stmt_get_result($stmt);
            //Отбираем то что было отправлено в форму - пароль и юзернейм
            if ($row = mysqli_fetch_assoc($result)){
                // проверяем есть ли в базе данных такой же пароль. ответом будет правда или лошь
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false){
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                elseif ($pwdCheck == true){
                    //Если праоль правильный, то начинаем сессию. но нужно начинать сессию на каждой странице
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];

                    header("Location: ../index");
                    exit();
                }

            }
            else{
                //если не найден такой юзер в базе данных
                header("Location: ../index.php?error=nouser");
                exit();
            }

        }
    }

}
else{
    header("Location: ../index");
    exit();
}