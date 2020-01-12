<?php


namespace app\controllers;

use app\core\Controller;

class LoginController extends Controller {

    public function accessAction(){
        if(isset($_POST['login-submit']))
        $this->view->render('Вход');
    }
}