<?php

if (isset($_POST['domain-reg'])){
    session_start();
    $domainNameFull = $_POST['domain-name'];

    $allowed_zones = array("best", "shop", "xyz", "club", "design", "tech", "website", "store" , "online", "fun", "site", "space", "icu", "name", "net", "pro", "com", "top");
    //Проверяем пустую ли строку казал пользователь
    if (empty($domainNameFull)){
        header("Location:../domain-reg.php?error=domainnameempty");
        exit();
    }else{
        //Проверяем доменное имя на допустимые символы
        if (!preg_match("/^[A-Za-z0-9(\.\-)]*$/", $domainNameFull)){
            header("Location: ../domain-reg.php?error=domainnameforbiddensymbols");
            exit();
        }else{
            //разбиваем доменное имя на части между точками
            $domainNameExp = explode(".", $_POST['domain-name']);
            //Если больше уровней доменного имени, или меньше, значит оно неправильное.
            if (count($domainNameExp)>3 or count($domainNameExp)<2 ){
                header("Location: ../domain-reg.php?error=domainnamewrongform");
                exit();
            }
            elseif (count($domainNameExp)==3){
                if ($domainNameExp[2]=== "ua" and $domainNameExp[1]=== "com" ) {
                    foreach ($domainNameExp as $domainNameLvl) {
                        //Пустой ли домен каждого уровня
                        if (empty($domainNameLvl)) {
                            header("Location: ../domain-reg.php?error=domainnameempty");
                            exit();
                        } //Или же слишком длинный
                        elseif (strlen($domainNameLvl) > 63) {
                            header("Location: ../domain-reg.php?error=domainnametoomuchsymbols");
                            exit();
                        }
                    }
                    //Проверяем начинается или заканчивается ли доменное имя на дефис
                    if (preg_match("/^[\-]/", $domainNameExp[0]) or preg_match("/[\-]$/", $domainNameExp[0]) ){
                        header("Location: ../domain-reg.php?error=domainnamewrongsign");
                        exit();
                    }else{
                        require 'dbh.inc.php';
                        //Кладем в базу.
                        $domainRegistrarId = $_SESSION['userId'];
                        $domainTimeReg = date("Y-m-d H:i:s");
                        $domainName = $domainNameExp[0];
                        $domainZone = $domainNameExp[1].".".$domainNameExp[2];


                        $sql = "select domainName from domains where domainName=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)){
                            header("Location: ../domain-reg.php?error=sqlerror");
                            exit();
                        }else{
                            mysqli_stmt_bind_param($stmt, "s", $domainName);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            $resultCheck = mysqli_stmt_num_rows($stmt);
                            if ($resultCheck >0){
                                header("Location: ../domain-reg.php?error=domainnametaken");
                                exit();
                            }else{
                                $sql  = "insert into domains (domainRegistrantId, domainName, domainZone, domainTimeReg) values (?,?,?,?);";
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sql)){
                                    header("Location: ../domain-reg.php?error=sqlerror");
                                    exit();
                                }else{
                                    mysqli_stmt_bind_param($stmt, "ssss", $domainRegistrarId, $domainName, $domainZone, $domainTimeReg );
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../domain-reg.php?domain-reg=success");
                                    exit();
                                }
                            }
                        }
                    }
                }else{
                    header("Location: ../domain-reg.php?error=domainnamewrongform");
                    exit();
                }
            }
            elseif (count($domainNameExp)==2){
                foreach ($domainNameExp as $domainNameLvl) {
                    //Пустой ли домен каждого уровня
                    if (empty($domainNameLvl)) {
                        header("Location: ../domain-reg.php?error=domainnameempty");
                        exit();
                    } //Или же слишком длинный
                    elseif (strlen($domainNameLvl) > 63) {
                        header("Location: ../domain-reg.php?error=domainnametoomuchsymbols");
                        exit();
                    }
                }

                    if (in_array($domainNameExp[1], $allowed_zones)){
                        if (preg_match("/^[\-]/", $domainNameExp[0]) or preg_match("/[\-]$/", $domainNameExp[0]) ){
                            header("Location: ../domain-reg.php?error=domainnamewrongsign");
                            exit();
                        }else{
                            require 'dbh.inc.php';
                            //Кладем в базу.
                            $domainRegistrarId = $_SESSION['userId'];
                            $domainTimeReg = date("Y-m-d H:i:s");
                            $domainName = $domainNameExp[0];
                            $domainZone = $domainNameExp[1];

                            $sql = "select domainName from domains where domainName=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)){
                                header("Location: ../domain-reg.php?error=sqlerror");
                                exit();
                            }else{
                                mysqli_stmt_bind_param($stmt, "s", $domainName );
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_store_result($stmt);
                                $resultCheck = mysqli_stmt_num_rows($stmt);
                                if ($resultCheck >0){
                                    header("Location: ../domain-reg.php?error=domainnametaken");
                                    exit();
                                }else{
                                    $sql  = "insert into domains (domainRegistrantId, domainName, domainZone, domainTimeReg) values (?,?,?,?);";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)){
                                        header("Location: ../domain-reg.php?error=sqlerror");
                                        exit();
                                    }else{
                                        mysqli_stmt_bind_param($stmt, "ssss", $domainRegistrarId, $domainName, $domainZone, $domainTimeReg );
                                        mysqli_stmt_execute($stmt);
                                        header("Location: ../domain-reg.php?domain-reg=success");
                                        exit();
                                    }
                                }
                            }
                        }
                    }else{
                        header("Location: ../domain-reg.php?error=domainnamezoneisnotallowed");
                        exit();
                    }

                //Проверяем начинается или заканчивается ли доменное имя на дефис

            }

            }



    }
}else{
    header("Location: ../index.php");
}