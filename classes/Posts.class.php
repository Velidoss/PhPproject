<?php

class Posts extends Dbh{

    public function getPosts(){
        $sql = "SELECT * FROM posts limit 0,3";
        //query  -встроенная функция в PDO
        $stmt = $this->connect()->query($sql);
        while($row = $stmt->fetch()){
            echo '
            <div class="container centered">
                <div class="post">
                    <h2>'.$row['postTitle'].'</h2>
                    <p>'.$row['postContent'].'</p>
                    <p>'.$row['postDateTime'].'</p>
                    <p>'.$row['postCategory'].'</p>
                </div>
            </div>';
        }
    }
    //Этот уже с подготовленными запросами. К примеру, поиск постов
    public function getPostsStmt($postName,$postAuthor){
        $sql = "SELECT * FROM posts where postTitle = ? AND postAuthor=?";
        //query  -встроенная функция в PDO
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$postName,$postAuthor]);
        $posts=$stmt->fetchAll();

        foreach($posts as $post){
            echo '
            <div class="container centered">
                <div class="post">
                    <h2>'.$post['postTitle'].'</h2>
                    <p>'.$post['postContent'].'</p>
                    <p>'.$post['postDateTime'].'</p>
                    <p>'.$post['postCategory'].'</p>
                </div>
            </div>';
        }
    }

    public function createPost($postName, $postContent,$postDateTime, $postCategory, $postAuthor){


        $sql= "INSERT INTO posts (postTitle, postContent, postDateTime, postCategory, postAuthor) VALUES( ?,?,?,?,? );";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$postName, $postContent,$postDateTime, $postCategory, $postAuthor]);
    }

}