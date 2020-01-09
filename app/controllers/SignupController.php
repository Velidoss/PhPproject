<?php

namespace app\controllers;

use app\core\Controller;

class SignupController extends Controller {

    public function registerAction(){
        $this->view->render('Регистрация');
    }
}