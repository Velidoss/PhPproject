<?php

namespace app\lib;

use PDO;

class Dbh{

    protected $db;

    public function __construct()
    {
        $config  = require 'app/config/db.php';
        //соединение с БД
        $dsn = 'mysql:host=' .$config['host']. ';dbname='. $config['dbName'];
        $this->db = new PDO($dsn, $config['user'], $config['pwd']);
    }

    public function query($sql, $params=[]){
        $stmt = $this->db->prepare($sql);
        if(!empty($params)){
            foreach($params as $key => $val){
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
 
    }

    public function row($sql, $params=[]){
        $result =$this->query($sql, $params);
        //Fetch assoc - передает ассоциативный массив без индексов
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params=[]){
        $result =$this->query($sql, $params);
        return $result->fetchColumn();
    }

}