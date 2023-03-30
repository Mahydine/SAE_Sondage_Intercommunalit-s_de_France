<?php

class Routeur
{
    public function routeurReq()
    {
        try {
            $url = '';
            if (isset($_GET['url'])) {
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = $controller . 'Controller';
                $controllerFile = 'controllers/' . $controllerClass . ".php";

                if (file_exists($controllerFile)) {
                    require_once($controllerFile);
                    $controllerInstance = new $controllerClass($url);
                } else {
                    throw new Exception("Page introuvable");
                }
            } else {
                require_once 'controllers/SondageController.php';
                $controllerInstance = new SondageController($url);
            }

            if (isset($_GET['action']) && method_exists($controllerInstance, $_GET['action'])) {
                $action = $_GET['action'];
                $controllerInstance->$action();
            } else {
                $controllerInstance->afficher();
            }

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            require_once 'views/errorPage.php';
        }
    }
}


?>