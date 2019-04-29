<?php
/**
 * Description of app
 *
 * @author Árpád
 * @version 1.0
 * @creation_date 20/02/2019
 * @package PreAphaArpad
 */

//require_once 'controllers/loadError.php';

class App{
    function __construct(){

        $url = isset($_GET['url']) ? $_GET['url']: null; // Se utiliza esta en lugar de la línea de abajo porque permite validar url vacias
        //$url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        // Validar/permitir a url vacias ir a la página de inicio
        if(empty($url[0])){
            $archivoController = 'controllers/masterPage.php';
            require_once $archivoController;
            $controller = new MasterPage();
            $controller->loadModel('masterPage');
            return false;
        }

        //var_dump($url); P

        $archivoController = 'controllers/' . $url[0] . '.php';

        // Validar si existe el controlador
        if (file_exists($archivoController)){
            require_once $archivoController;
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            // Validar si existe el mètodo
            if(isset($url[1])){
                $controller->{$url[1]}();
            }
        } else {
            require_once 'controllers/loadError.php';
            $controller = new LoadError();
        }
    }
}

?>