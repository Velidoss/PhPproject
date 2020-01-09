<?php

namespace app\core;

use app\core\View;

//Данный класс - гланвый контрллер, он, при вызове, принимает в себя переменную $route что бы передать ее во View, и тем самым вызвать соответствующий шаблон страницы
//Так же, создает обьект класса View, кладя  в него переменную со значением маршрута
abstract class Controller{

    public $route;
    public $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);

    }


}

