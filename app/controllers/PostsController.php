<?php

//include_once ROOT.'/app/models/Posts.php';
namespace app\controllers;

use app\core\Controller;

class PostsController extends Controller {



    public function postslistAction(){
        //$this->view->redirect('/'); 
        $this->view->render('Список постов');
    }

    public function makepostAction(){
        //можно указать путь к шаблону, если он называется не так как в роутах
        $this->view->render('Написать пост ');
        
    }
    /*
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
 
*/
}