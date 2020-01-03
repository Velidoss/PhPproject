<?php

    if(isset($_POST['make_post'])){
        session_start();
        require 'dbh.inc.php';
        $postName = mysqli_real_escape_string($conn,$_POST['postname']);
        $postContent = mysqli_real_escape_string($conn,$_POST['posttext']);
        $postCategory = mysqli_real_escape_string($conn,$_POST['postcategory']);
        $postDateTime =  mysqli_real_escape_string($conn,date("Y-m-d H:i:s"));
        $postAuthor = mysqli_real_escape_string($conn, $_SESSION['userUid']);


        /*if (empty($postName) || empty($postContent) || empty($postCategory)){
            header("Location: ../posts.php?error=emptypostfields");
            exit();
        }*/
            if(empty($postName)){
            header("Location: ../posts.php?error=emptypostname");
            exit();
        }
            elseif(empty($postCategory)){
            header("Location: ../posts.php?error=emptypostcategory");
            }
            elseif(empty($postContent)){
            header("Location: ../posts.php?error=emptypostcontent");
            exit();
        }

        else{
            $sql ="INSERT INTO posts (postTitle, postContent, postDateTime, postCategory, postAuthor) values( ?,?,?,?,? );";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                echo "SQL statement failed";
            }else{
                mysqli_stmt_bind_param($stmt, "sssss", $postName, $postContent,$postDateTime, $postCategory, $postAuthor);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
            
            }
            //mysqli_query($conn, $sql);

        }
        header("Location: ../posts.php?postcreate=success");
    }else{

    }

