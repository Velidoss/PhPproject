<?php

namespace app\controllers;

use app\core\Controller;

class DomainController extends Controller {

    public function registerAction(){
        $this->view->render('Регистрация');
    }
}