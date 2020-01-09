<?php

//include_once ROOT.'/app/models/Posts.php';
namespace app\controllers;

use app\core\Controller;
// Данный класс наследует главный класс контроллера, и вызывает его методы
class MainController extends Controller {

    //Данный метод класса вызывается роутером в ответ на соответствующий запрос в строке браузера
    public function indexAction(){
        $vars = [
            'name'=>"Yurii",
            'age'=>25,
        ];
        //
       // $this->view->redirect('/'); 
       //Данная переменная вызывает метод render из класса View, который был наследован главным контроллером
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