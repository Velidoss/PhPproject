<?php

namespace app\models;
use app\core\Model;

class Main extends Model{

    //конструктор здесь работать не будет так ак класс уже расширяет клас модели в котором есть конструктор
    //Берутся методы из класса Модели
    public function getPosts(){
        $result = $this->db->row('SELECT * FROM posts limit 3');
        return $result;
    }

}