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

}