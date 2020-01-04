<?php
// пространство имен (т.е. папка где находятся классы)
namespace Characters;

class Character {
    //Props
    private $name;
    private $age;
    private $skill;

    public static $raidLvl = 20;

    public function __construct($name, $age, $skill)
    {
        $this->name = $name;
        $this->age = $age;
        $this->skill = $skill;
    }

    public function Taunt(){
        echo 'My name is '.$this->name.', and I know '.$this->skill.'!!!';
    }

    public function getName(){
        return $this->name;

    }
    public function getRL(){
        return self::$raidLvl;

    }

    public static function setRaidLvl($newRL){
        self::$raidLvl = $newRL;
    }

}