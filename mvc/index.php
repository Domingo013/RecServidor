<?php

    require_once 'config/configdb.php';
    require_once 'modelo/modelodb.php';
    
    if(!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
    if(!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");
    
    $controller_path = 'controlador/'.$_GET["controller"].'.php';
    
    /* Comprueba si existe el controlador */
    if(!file_exists($controller_path)) $controller_path = 'controlador/'.constant("DEFAULT_CONTROLLER").'.php';
    
    /* Carga el controlador*/
    require_once $controller_path;
    $NombreControlador = $_GET["controller"];
    $controlador = new $NombreControlador();
    
    /* Comprueba que el metodo esté definido */
    $dataToView["data"] = array();
    if(method_exists($controlador,$_GET["action"])) $dataToView["data"] = $controlador->{$_GET["action"]}();
    
    /* Carga las vistas */
    require_once './vista/header.php';
    require_once './vista/'.$controlador->view.'.php';
    require_once './vista/footer.php';

    // Fin del código php