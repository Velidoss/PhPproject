<?php

namespace app\controllers;

use app\core\Controller;

class SignupController extends Controller {

    public function registerAction(){
        $this->view->render('Регистрация');
        
        if (isset($_POST['signup-submit'])){
            $errors=[];
            $username = $_POST['uid'];
            $email = $_POST['mail'];
            $password = $_POST['pwd'];
            $passwordRepeat = $_POST['pwd-rep'];
            if ($this->model->checkUserName($username)){
                $errors[] = 'wrong username';
            }
            elseif ($this->model->checkEmail($email)){
                $errors[] = 'wrong email';
            }
            elseif ($this->model->checkPassword($password, $passwordRepeat)){
                $errors[] = 'wrong password';
            }else{
                if($this->model->checkUserNameDb($username)){
                    $errors[] = 'that username is already taken';
                }
                elseif ($this->model->checkUserEmailDb($email)){
                    $errors[] = 'account with that email is already registered';
                }else{
                    $hashed_pwd = $this->model->pwdHash($password);
                    $registered = $this->model->RegUser($username,  $email,  $hashed_pwd);
                    
                    return true;
                }
            }
        }
        echo 'Успешно!';
    }
}