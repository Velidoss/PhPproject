<?php

class Userscntr extends Users{
    
    public function createUser($newUserName){
        $this->setUser($newUserName);
    }

}