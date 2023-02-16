<?php
if(session_status() == 1){
    session_start();
}

try{
    $bdd = new PDO('mysql:host=localhost;dbname=saesondage;charset=utf8', 'root', '');
}catch(Exception $e){
    die('Erreur : '. $e->getMessage());
}
?>