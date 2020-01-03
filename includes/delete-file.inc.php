<?php
session_start();
include_once "dbh.inc.php" ;
$sessionId = $_SESSION['userId'];
$fileName= "../uploads/profile".$sessionId."*";
$fileInfo = glob($fileName);
$fileExt = explode(".", $fileInfo[0]);
$fileActualExt = $fileExt[1];


$file = "../uploads/profile".$sessionId.".".$fileActualExt;

if (!unlink($file)){
    echo 'File was not deleted!';
}

$sql = "UPDATE profileimage SET status=1 WHERE  userId='$sessionId';";
mysqli_query($conn,$sql);

header("Location:../account_info.php?deleteimgsuccess");


