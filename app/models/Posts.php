<?php

include_once ROOT.'/classes/dbh.class.php';

class Posts extends Dbh {


    public function getPostItemById($id){

    }

    public function getPostList(){
        $postsList = array();
        $sql = "SELECT * FROM posts ORDER BY postCategory LIMIT 5";
        $stmt = $this->connect()->query($sql);
        $i = 0;
        while($row = $stmt->fetch()){
            $postsList[$i]['postId']=$row['postId'];
            $postsList[$i]['postTitle']=$row['postTitle'];
            $postsList[$i]['postContent']=$row['postContent'];
            $postsList[$i]['postCategory']=$row['postCategory'];
            $i++;
        }
        return $postsList;
    }

}