<?php

namespace app\core;

use app\lib\Dbh;

abstract class Model{

    public $db;

    public function __construct()
    {   

        $this->db = new Dbh;
    }
}