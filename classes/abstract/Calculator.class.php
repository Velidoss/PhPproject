<?php

class Calculator{
    public $operator;
    public $var1;
    public $var2;

    public function __construct(string $operatorUser, int $one, int $two)
    {
        $this->operator = $operatorUser;
        $this->var1 = $one;
        $this->var2 = $two;
    }

    public function calculate(){
        switch ($this->operator) {
            case 'add':
                $result = $this->var1 + $this->var2;
                return $result;
                break;
            case 'min':
                $result = $this->var1 - $this->var2;
                return $result;
                break;
            case 'div':
                $result = $this->var1 / $this->var2;
                return $result;
                break;
            case 'mul':
                $result = $this->var1 * $this->var2;
                return $result;
                break;
            default:
                echo 'There was an error!';
                break;
        }
    }
}