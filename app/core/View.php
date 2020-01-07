<?php

namespace app\core;


class View{

    public $path;
    public $route;
    public $layout= 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
        var_dump($this->path);
    }

    public function render($title, $vars=[]){
        $path = 'app/views/'.$this->path.'.php';
        extract($vars);
        if (file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'app/views/layouts/'.$this->layout.'.php';
        }else{
            'Вид не найден';
        }

    }
    //Ф-ция для вывода ошибок
    public static function errorCode($code){
        http_response_code($code);
        $path = 'app/views/errors/'.$code.'.php';
        if(file_exists($path)){
            require $path;
        }
        
        exit();
    }
    //Функция для перенаправлений
    public function redirect($url){
        header('Location:'.$url);
       
    }


}

