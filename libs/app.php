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
            $controller->render();
            return false;
        }

        //var_dump($url); P

        $archivoController = 'controllers/' . $url[0] . '.php';

        // Validar si existe el controlador
        if (file_exists($archivoController)){
            require_once $archivoController;
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            // # de elementos del arreglo
            $nparam = sizeof($url);

            if ($nparam > 1){
                // Verificar si hay "metodos despues de la vista" (parametros)
                if ($nparam > 2){
                    $param = [];
                    for($i = 2; $i < $nparam; $i++){
                        array_push($param, $url[$i]);
                    }
                    // Envía el/los parametros posteriores al método
                    $controller->{$url[1]}($param);
                }else {
                    $controller->{$url[1]}();
                }
            } else {
                $controller->render();
            }

        } else {
            require_once 'controllers/loadError.php';
            $controller = new LoadError();
        }
    }
}

?>