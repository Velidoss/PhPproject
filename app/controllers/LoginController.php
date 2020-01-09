<?php


namespace app\controllers;

use app\core\Controller;

class LoginController extends Controller {

    public function accessAction(){
        $this->view->render('Вход');
    }
}