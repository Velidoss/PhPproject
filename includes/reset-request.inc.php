<?php

if (isset($_POST["reset-request-submit"])){

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://phpproject/create_new_password.php?selector=" .$selector."&validator=".bin2hex($token);

    $expires = date("U") + 1800;

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdresetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "there was an error!";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $userEmail );
        mysqli_stmt_execute($stmt);
    }

}else{
    header("Location: ../index.php");
}