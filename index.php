<?php
    require 'header.php';
    define ('ROOT', dirname(__FILE__));
    require_once(ROOT.'/app/core/Router.php');
    
    $router = new Router();
    $router->run();

?>

<main>
    <div class="wrapper-main">  
        <section class="section-default">  

        <?php
        if (isset($_SESSION['userId'])){
            echo '<p class="login-status">You are logged in!</p>';

        }
        else{
            echo '<p class="login-status">You have to log in to explore everything!</p>';
        }

        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if(strpos($fullUrl, "error=emptypostfields")==true){
            echo "<p class='error-message'>You did not filled all fields!</p>";
        }
        elseif (strpos($fullUrl, "error=emptypostname")==true){
            echo "<p class='error-message'>Fill in postname!</p>";
        }
        elseif (strpos($fullUrl, "error=emptypostcontent")==true){
            echo "<p class='error-message'>You did not filled aany content!</p>";
        }
        elseif (strpos($fullUrl, "error=emptypostcategory")==true){
            echo "<p class='error-message'>Write category!</p>";
        }

        ?>
        </section> 
    </div>
    <section class="gallery-links">
        <div class="container wrapper">
            <h2>Trademark logos gallery</h2>
            <div class="gallery-container">
                <?php

                include_once "includes/dbh.inc.php";

                $sql = "select * from gallery order by orderGallery desc ";
                $stmt = mysqli_stmt_init($conn);
                //чекаем ошибки
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    echo 'SQL statement failed';
                }else{
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while($row = mysqli_fetch_assoc($result)){
                        echo '<a href="#">
                        <div style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].');    width: 100%;
    height:235px;" ></div>
                        <h3>'.$row["titleGallery"].'</h3>
                        <p>'.$row["descGallery"].'</p>
                    </a>';
                    }
                }


                 ?>
            </div>
            <?php
                if (isset($_SESSION['userId'])){
                    echo '            
            <div class="gallery-upload">
                <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="gallery-filename" placeholder="trademark name">
                    <input type="text" name="gallery-filetitle" placeholder="trademark title">
                    <input type="text" name="gallery-filedesc" placeholder="trademark description">
                    <input type="file" name="gallery-file">
                    <button type="submit" name="gallery-submit" >Upload</button>
                </form>
            </div>';
                }

            ?>

        </div>
    </section>
</main>

<?php
    require 'footer.php';
?>