<?php

abstract class ModelManager{

    private PDO $pdo ;

    private function setBdd(){
        $this->pdo = new \PDO('mysql:host=localhost;dbname=sae_sondage', 'root', '');
    }
    public function getBdd(){
        if(!isset($this->pdo)){
            $this->setBdd();
        }
        return $this->pdo;
    }


}


?>