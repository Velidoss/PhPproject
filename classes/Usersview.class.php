<?php

class Usersview extends Users{
    
    public function showUsers($userName){
        $results = $this->getUser($userName);
        echo "Nickname - ". $results[0]['uidUsers'];
    }

}