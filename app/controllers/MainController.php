<?php

//include_once ROOT.'/app/models/Posts.php';
namespace app\controllers;

use app\core\Controller;

// Данный класс наследует главный класс контроллера, и вызывает его методы
class MainController extends Controller {

    //Данный метод класса вызывается роутером в ответ на соответствующий запрос в строке браузера
    public function indexAction(){
        $result  =  $this->model->getPosts();
        $vars = [
            'posts' =>$result,
        ];
       //Данная переменная вызывает метод render из класса View, который был наследован главным контроллером
        $this->view->render('Главная страница', $vars);
        //echo 'Главная страница';
    }
}