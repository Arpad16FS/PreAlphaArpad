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

        $url = isset($_GET['url']) ? $_GET['url']: null;
        //$url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if(empty($url[0])){
            $archivoController = 'controllers/masterPage.php';
            require_once $archivoController;
            $controller = new MasterPage();
            return false;
        }

        //var_dump($url);

        $archivoController = 'controllers/' . $url[0] . '.php';

        if (file_exists($archivoController)){
            require_once $archivoController;
            $controller = new $url[0];

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