<?php

class Router {

    protected $routes;
    //protected $params = [];

    public function __construct(){
        //при візове класса теперь будет выполняться подключение к списку марштуротов
        $routesPath = ROOT.'/app/config/routes.php';
        $this->routes = include($routesPath);
    }
    //метод изымает запрос пользователя, Возвращается строка.
    private function getURI(){
        //получаем строку запроса
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run(){
        //Реализация анализа запросов и передачи управления
        $uri = $this->getURI();
        echo $uri;
        //Проверить наличие запроса
        foreach ($this->routes as $uriPattern =>$path){
            //Всегда использовать двойные кавычки!
            //Теперь сравниваем паттерн и uri
            if (preg_match("~$uriPattern~", $uri)){
                //Определить соответствующий контроллер для запрсоа
                $elements = explode('/', $path); 
                
                $controllerName = array_shift($elements).'Controller';
                //Теперь мы получили название контроллера
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($elements));
                //Подключаем файл запроса контроллера
                $controllerFile = ROOT.'/app/controllers/'.$controllerName.'.php';
                echo  $controllerName;
                echo  $controllerFile;

                if (file_exists($controllerFile)){
                    include_once($controllerFile);
                }
                //Создать обект, вызвать метод
                $controllerObject  = new $controllerName;
              
                $result = $controllerObject->$actionName();
                if($result !=null){
                    break;
                }


            }
        }
        
        
        
    }
    

}