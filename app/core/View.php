<?php

namespace app\core;

/*Данный класс принимает в себя переменную с марштуром, имеет дефолтный шаблон для отображения шаблона при вызове определенного роутера
При вызове объекта данного класса, 
*/
class View{

    public $path;
    public $route;
    public $layout= 'default';
    //При вызове объекта данного класса устанавливаются переменные маршрута и пути
    public function __construct($route)
    {
        $this->route = $route; 
        //Имя контроллера - это папка в views, имя метода - сам файл шаблона.
        $this->path = $route['controller'].'/'.$route['action'];
        
    }
    //Данный метод выводит шаблон, который соответствует определенному методу контроллера. Vars - это массив переменных, которые передаются контроллерами
    public function render($title, $vars=[]){
        //Путь к шаблону, соответствующему методу контроллера
        $path = 'app/views/'.$this->path.'.php';
        extract($vars);
        if (file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            //Подключение стандартного шаблона
            require 'app/views/layouts/'.$this->layout.'.php';
        }else{
            'Вид не найден';
        }

    }
    //Метод для вывода ошибок
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

