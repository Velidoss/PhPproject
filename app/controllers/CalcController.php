<?php


namespace app\controllers;

use app\core\Controller;

class CalcController extends Controller {

    public function defaultAction(){
        $this->view->render('Калькулятор');
    }
}