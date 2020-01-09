<?php

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller {

    public function infoAction(){
        $this->view->render('Аккаунт');
    }
}