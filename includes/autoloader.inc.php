<?php

spl_autoload_register('myAutoLoader');
function myAutoLoader($className){
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if(strpos($url, 'includes') !==false){
        $path = '../classes/';
    }else{
        $path = '/classes/';
    }
    $extension = '.class.php';
    require_once $path . $className . $extension;
}


/*
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = "classes/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    // вывод ошибок что бы было понятнее что имя класа было указано неверно.
    if (!file_exists($fullPath)){
        return false;
    }

    include_once $fullPath;
}
*/
