<?php
 if(isset($_POST['search-post-submit'])) {
     require 'dbh.inc.php';
     $searchPost = mysqli_real_escape_string($conn, $_POST['search-post']);
     $sql = "select * from posts where postTitle like '%$searchPost%' or postContent like '%$searchPost%' or postAuthor like '%$searchPost%'";
     $result = mysqli_query($conn, $sql);
     $resultCheck = mysqli_num_rows($result);

     echo "There are " . $resultCheck . "results!";

     if ($resultCheck > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
             $postTitle = $row['postTitle'];
             $postContent = $row['postContent'];
             $postDateTime = $row['postDateTime'];
             $postCategory = $row['postCategory'];
             echo '
                    <div class="container centered">
            <div class="post">
            <a href="../search-results.php?title='.$row['postTitle'].'">
                <h2>' . $postTitle . '</h2>
                <p>' . $postDateTime . '</p>
                <p>' . $postCategory . '</p>
                <p>' . $postContent . '</p>
            </a>
            </div>
        </div>';
         }
     } else {
         echo "There are no such posts";
     }
 }
