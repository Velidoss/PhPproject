<?php
//include_once "includes/dbh.inc.php";
include "header.php";
include 'includes/autoloader.inc.php';
?>
<?php

if (isset($_SESSION['userId'])){
                echo '

                <div class="container ">
                <button type="button" class="make-post-trigger">Make a post!</button>
                    <div class="make-post collapse">
                        <form action="classes/Posts.class.php" class="make-post-form" method="post">
                            <label for="postname">Enter posts name </label>
                            <input name="postname" type="text">
                            <label for="postcategory">Enter posts category </label>
                            <input name="postcategory" type="text">
                            <label for="posttext">Enter post text</label>
                            <textarea name="posttext" cols="30" rows="10" max-length="200" ></textarea>
                            
                        </form>
                        <form class="upload-form" action="includes/upload-file.inc.php" method="post" enctype="multipart/form-data">
                            <input name="uploadfile" type="file" >
                            <button type="submit" name="upload_file">Upload a file!</button>
                        </form>
                    </div>
                </div>';}else{
    echo '<p> log in to write a post!</p>';
}

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

/*if(strpos($fullUrl, "error=emptypostfields")==true){
    echo "<p class='error-message'>You did not filled all fields!</p>";
}*/
if(strpos($fullUrl, "error=emptypostname")==true){
    echo "<p class='error-message'>You did not write post name!</p>";
}
elseif(strpos($fullUrl, "error=emptypostcategory")==true){
    echo "<p class='error-message'>You did not filled category!</p>";
}
elseif(strpos($fullUrl, "error=emptypostcontent")==true){
    echo "<p class='error-message'>You did not filled post content!</p>";
}
/*
    $sql = "SELECT * FROM posts limit 0,3;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $postTitle = $row['postTitle'];
            $postContent = $row['postContent'];
            $postDateTime = $row['postDateTime'];
            $postCategory = $row['postCategory'];
            echo '
            <div class="container centered">
    <div class="post">
        <h2>'.$postTitle.'</h2>
        <p>'.$postDateTime.'</p>
        <p>'.$postCategory.'</p>
        <p>'.$postContent.'</p>
    </div>
</div>';
        }
        
    }

*/
    $createPosts = new Usersview();
    $createPosts->showUsers("Test55");


?>


<!--<div class="container">
    <div class="post">
        <h2>Post topic</h2>
        <p>By User. 20.11.2018</p>
        <p>Post content
            Introduction to PHP Programming | PHP Tutorial | PHP For Beginners | Learn PHP Programming. Introduction to PHP programming, is the first episode in this PHP tutorial for beginners series. This is a complete PHP tutorial for absolute beginners, teaches PHP to people who are new at it.

            PHP is easy to learn and should not be made harder than it really is, and this is what I'm hoping to accomplish. In this lesson I will introduce the programming language called PHP and talk about the requirements of getting started on it. I will also give examples of what you can do with PHP.</p>
    </div>
</div>-->

<?php
include "footer.php";
?>


