<?php
spl_autoload_register(function($class){
    require('models/'.$class.".php");
});

require("controllers/routeur.php");
$routeur = new Routeur();
$routeur->routeurReq();

?>