<?php
/**
 * Description of masterPage
 *
 * @author Árpád
 * @version 1.0
 * @creation_date 17/02/2019
 * @package PreAphaArpad
 */
class MasterPage extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('masterPage/index');
    }

    public function saludo(){
        echo "<p>Ejecutaste el método saludo</p>";
    }

    public function __destruct() {

    }
}