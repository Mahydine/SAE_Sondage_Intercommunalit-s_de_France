<?php

abstract class ModelManager{

    private PDO $pdo ;
    private $dbName = "saesondage";


    private function setBdd(){
        $this->pdo = new \PDO('mysql:host=localhost;dbname='. $this->dbName .';charset=utf8', 'root', '');
    }

    public function getBdd(){
        if(!isset($this->pdo)){
            $this->setBdd();
        }
        return $this->pdo;
    }
}


?>