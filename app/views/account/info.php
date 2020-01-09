<main>
    <div class="container">
        <div class="user-info">
            <div class="user-info-img">

<?php
include_once "includes/dbh.inc.php";
if (isset($_SESSION['userId'])){
    $user = $_SESSION['userId'];
    //проверяем наличие пользователей
    $sql = "SELECT * FROM users where idUsers='$user'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)> 0){
        // проверяем по id, есть ли пользователь с загруженной картинкой
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['idUsers'];
            // проверяем по id, есть ли у пользователя картинки
            $sqlImg = "SELECT * FROM profileimage WHERE userId='$id'";
            $resultImg = mysqli_query($conn, $sqlImg);
            $sqlDomains = "SELECT * FROM domains WHERE domainRegistrantId='$id'";
            $resultDomains = mysqli_query($conn, $sqlDomains);
            while($rowImg = mysqli_fetch_assoc($resultImg)){

                //если равно 0, то значит что картинка еще не загружена.
                if($rowImg['status'] == 0){
                    $fileName= "uploads/profile".$id."*";
                    $fileInfo = glob($fileName);
                    $fileExt = explode(".", $fileInfo[0]);
                    $fileActualExt = $fileExt[1];
                    echo "<img src='uploads/profile".$id.".".$fileActualExt."?".mt_rand()."'>";
                }else{
                    echo '<img src="uploads/profiledefault.png">';
                }
                echo $row['uidUsers'];

            }
            while($rowDomains = mysqli_fetch_assoc($resultDomains)){
                $domainName = $rowDomains['domainName'].".".$rowDomains['domainZone'];
                $domainNameTimeReg = $rowDomains['domainTimeReg'];
                echo "
                <div class='user-domains-list'><p>".$domainName." registered at".$domainNameTimeReg."</p></div>
                    
                ";
            }
        }
    }else{
        echo 'There are no users yet(';
    }

}else{
    echo 'You have to <a href="login.php?login">Log in!</a>';
}

?>
            </div>
            <div class="user-info-personal">

            </div>
        </div>
        <div class="upload">
            <form class="upload-form" action="includes/upload-file.inc.php" method="post" enctype="multipart/form-data">
                <input name="uploadfile" type="file" >
                <button type="submit" name="upload_file">Upload a file!</button>
            </form>
            <form class="delete-form" action="includes/delete-file.inc.php" method="post">

                <button type="submit" name="upload_file">Delete profile image.</button>
            </form>
        </div>

    </div>
</main>
