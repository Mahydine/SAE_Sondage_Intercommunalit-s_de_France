<?php
spl_autoload_register(function($class){
    require_once('models/'.$class.".php");
});

require_once("controllers/routeur.php");
$routeur = new Routeur();
$routeur->routeurReq();

?>