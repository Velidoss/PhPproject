<?php
session_start();
include_once 'dbh.inc.php';
$id = $_SESSION['userId'];

if(isset($_POST['upload_file'])) {

    //image info
    $uploadFile = $_FILES['uploadfile'];

    $uploadFileName = $_FILES['uploadfile']['name'];
    $uploadFileNmpName = $_FILES['uploadfile']['tmp_name'];
    $uploadFileSize = $_FILES['uploadfile']['size'];
    $uploadFileError = $_FILES['uploadfile']['error'];
    $uploadFileType = $_FILES['uploadfile']['type'];

    $uploadFileExt = explode('.', $uploadFileName);
    $uploadFileActualExt = strtolower(end($uploadFileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($uploadFileActualExt, $allowed)) {
        if ($uploadFileError === 0) {
            if ($uploadFileSize < 1000000) {
                $uploadFileNameNew = "profile".$id.".".$uploadFileActualExt;
                $uploadFileDestination = '../uploads/' . $uploadFileNameNew;
                move_uploaded_file($uploadFileNmpName, $uploadFileDestination);
                $sql = "Update profileimage set status = 0 where userId='$id' ";
                $resultCheck = mysqli_query($conn, $sql) ;
                header("Location: ../account_info.php?uploadsuccess");

            } else {
                echo 'Your file is too big!';
            }

        } else {
            echo 'There was an  error uploading your file';
        }
    } else {
        echo 'You cannot upload files of this type';
    }
}
else{

    }