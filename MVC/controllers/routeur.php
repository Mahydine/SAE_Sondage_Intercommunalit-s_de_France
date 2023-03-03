<?php

class Routeur{

    public function routeurReq(){
        try{
            $url = '';
            if(isset($_GET['url'])){
                $url = explode('/', $_GET['url'], FILTER_SANITIZE_URL);
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = $controller.'Controller';
                $controllerFile = 'controllers/'.$controllerClass.".php";

                if(file_exists($controllerFile)){
                    require_once($controllerFile);
                    new $controllerClass($url);
                }else{
                    throw new Exception("Page introuvables");
                }
            }else{
                require_once 'controllers/accueilController.php';
                new AccueilController($url);
            }
        }catch(Exception $e){
            $errorMessage = $e->getMessage();
            require 'views/errorPage.php';
        };
    }

   
}

?>