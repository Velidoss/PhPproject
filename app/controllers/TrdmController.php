<?php


namespace app\controllers;

use app\core\Controller;

class TrdmController extends Controller {

    public function registerAction(){
        $this->view->render('Зарегистрируй торговую марку!');
    }
}