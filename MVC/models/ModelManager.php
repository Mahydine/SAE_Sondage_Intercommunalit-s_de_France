<?php

abstract class ModelManager{

    private PDO $pdo ;
    private $dbName = "saesondage";

    public function __construct()
    {
        if (session_status() == 1) {
            session_start();
        }

        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname='. $this->dbName .';charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
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