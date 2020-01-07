<?php

//include_once ROOT.'/app/models/Posts.php';
namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {


    public function indexAction(){
        $vars = [
            'name'=>"Yurii",
            'age'=>25,
            
        ];
        $this->view->redirect('/'); 
        $this->view->render('Главная страница', $vars);
        //echo 'Главная страница';
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