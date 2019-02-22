<?php
class PageView{
    function __construct(){

    }

    function render($pageName){
        //echo "<p>Vista base</p>";
        require 'views/' . $pageName . '.php';
    }
}
?>