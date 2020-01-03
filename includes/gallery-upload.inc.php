<?php

if (isset($_POST['gallery-submit'])){
    $newFileName = $_POST['gallery-filename'];
    if (empty($newFileName)){
        $newFileName = "gallery";
    }else{
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = $_POST['gallery-filetitle'];
    $imageDesc = $_POST['gallery-filedesc'];

    $file = $_FILES['gallery-file'];


    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];
    // берем расширение файла
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");

    if(in_array($fileActualExt, $allowed)){
        //Если нет ошибки при загрузке
        if($fileError === 0){
            //Поверка на размер изображения
            if($fileSize > 20000){
                // теперь загружаем файл. Присваиваем имя файлу, которій мі собираемся загружать на сервер.
                $imageFullName = $newFileName. "." . uniqid("", true). "." .$fileActualExt;// true - значит что мі
                // используем больше знаков для уникального имени файла
                //тут указіваем путь куда грузить картинку
                $fileDestination = "../img/gallery/" .$imageFullName;

                include_once "dbh.inc.php";
                // если юзер не прописал описание и т.д.
                if(empty($imageTitle)|| empty($imageDesc) ){
                    header("Location: ../index.php?upload-empty");
                    exit();
                }else{
                    $sql = "select * from gallery ;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo "SQL statement failed!";
                    }else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount +1;

                        $sql = "insert into gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) values (?,?,?,?);";
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            echo "SQL statement failed!";
                        }else{
                            mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                            mysqli_stmt_execute($stmt);
                            //пихаем загруженній файл
                            move_uploaded_file($fileTempName, $fileDestination);

                            header("Location: ../index.php?upload=success");
                        }
                    }
                }


            }else{
                echo 'Your file is too  big';
            }

        }else{
            echo 'Ypu have an error';
        }
    }else{
        echo 'You need to upload a file of a propper type';
        exit();
    }

}