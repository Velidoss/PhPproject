<?php

if (isset($_POST['trdm-reg'])){
    session_start();
    require 'dbh.inc.php';
    $trdmName = mysqli_real_escape_string($conn,$_POST['trdm-name']);
    $trdmOwner = mysqli_real_escape_string($conn, $_SESSION['userUid']);
    $trdmDateCreated = mysqli_real_escape_string($conn,date("Y-m-d H:i:s"));
    if (empty($trdmName)){
        header('Location: ../trademark-reg.php?error=trdmnameempty');
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $trdmName)){
        header("Location: ../trademark-reg.php?error=trdmnamenotmatch");
        exit();
    }else{
        $sql = "SELECT trdmName FROM trademarks WHERE trdmName=?";
        $stmt = mysqli_stmt_init($conn);
        //всегда проверяем на наличие ошибок если скл запрос не сработает
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../trademark-reg.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $trdmName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            //если $resultCheck больше одного, то значит такой трейдмарк уже зарегистрирован, выводим ошибку
            if ($resultCheck >0){
                header("Location: ../trademark-reg.php?error=trdmalrdexist");
                exit();}
            else{
                $sql = "INSERT INTO trademarks (trdmOwner, trdmName, trdmDateCreated) values (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../trademark-reg.php?error=sqlerror");
                    exit();
                }else{
                    mysqli_stmt_bind_param($stmt, "sss", $trdmOwner, $trdmName, $trdmDateCreated);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../trademark-reg.php?trademark-reg=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}else{
    header("Location: ../index.php");
    exit();
}