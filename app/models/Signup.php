<?php

namespace app\models;
use app\core\Model;

class Signup extends Model{

    public function RegUser($username,  $email,  $password){
        
        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (:username, :email, :password);";
        $this->model->bind($sql, $params=[$username,  $email,  $password]);
    }

    public  function checkUserName($username){
        if (empty($username)){
            return false;
        }
        elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            return false;
        }
        elseif (strlen($username)<=2){
            return false;
        }else{
            return true;
        }
    }
    public  function checkEmail($email, $username){
        if (empty($email)){
            return false;
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            return false;
        }else{
            return true;
        }
    }
    public  function checkPassword($password, $passwordRepeat){
        if (empty($password) || empty($passwordRepeat)){
            return false;
        }
        elseif ($password !== $passwordRepeat){
            return false;
        }else{
            return true;
        }
    }

    public function checkUserNameDb($username){
        $checkResult = $this->db->row('SELECT uidUsers FROM users WHERE uidUsers=0'.$username);
        if ($checkResult>0){
            return false;
        }
    }
    public function checkUserEmailDb($email){
        $checkResult = $this->db->row('SELECT uidUsers FROM users WHERE emailUsers=0'.$email);
        if ($checkResult>0){
            return false;
        }
    }
    public function pwdHash($password){
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        return $hashedPwd;
    }
    
}