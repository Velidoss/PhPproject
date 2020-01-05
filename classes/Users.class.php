<?php

class Users extends Dbh {

    //Этот класс не должен выводить информацию на сайт!
    protected function getUser($userName){
        $sql = "SELECT * FROM users where uidUsers = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userName]);

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function setUser($newUserName){
        $sql = "INSERT INTO users(uidUsers) VALUES (?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$newUserName]);

    }

    protected function getPosts(){
        $sql = "SELECT * FROM posts limit 0,3";
        //query  -встроенная функция в PDO
        $stmt = $this->connect()->query($sql);
        $row = $stmt->fetchAll();
        return $row;
        }

    protected function trdmReg($trdmOwner, $trdmName, $trdmDateCreated){
        $sql = "INSERT INTO trademarks (trdmOwner, trdmName, trdmDateCreated) values (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$trdmOwner, $trdmName, $trdmDateCreated]);
    }
}

