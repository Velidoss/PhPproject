<?php
require "header.php";

include "includes/dbh.inc.php";
$sql = "SELECT * FROM posts ";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $postTitle = $row['postTitle'];
        $postContent = $row['postContent'];
        $postDateTime = $row['postDateTime'];
        $postCategory = $row['postCategory'];
        echo '
<div class="container centered">
    <div class="post">
            <h2>' . $postTitle . '</h2>
        <p>' . $postDateTime . '</p>
        <p>' . $postCategory . '</p>
        <p>' . $postContent . '</p>
    </div>
</div>';
    }
}


require "footer.php";


