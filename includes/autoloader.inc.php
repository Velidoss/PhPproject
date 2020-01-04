<?php

spl_autoload_register('myAutoLoader');
function myAutoLoader($className){
    $path = 'classes/';
    $extension = '.class.php'; 
    $filename =  $path . $className . $extension;

    if (!file_exists($filename)){
        return false;
    }

    include_once $path. $className. $extension;
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
