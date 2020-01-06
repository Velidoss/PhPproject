<?php

include_once ROOT.'/app/models/Posts.php';

class PostsController {

    public function actionIndex(){

        $postsList = array();
        $postsList = Posts::getPostList();

        echo '<pre>';
        print_r($postsList);
        echo '<pre>';
        return true;
    }

    public function actionView($id){

        if ($id){
            $postsItem = Posts::getPostItemById($id);
        

        echo '<pre>';
        print_r($postsItem);
        echo '<pre>';
        return true;
        }
    }
 

}