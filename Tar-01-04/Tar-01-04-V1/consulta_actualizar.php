<?php
    include_once ("./vistas/resultado.php");    // Mostrar el contenido de header.php
    require_once './config/configdb.php';       // Trae los datos de configdb.php
    require_once './modelo.php';                // Trae los valores del modelo.php 

    $consultas = new Consultas();
    $sql = $consultas->consultaActualizar($_GET["sql"]);   // Envío la consulta a la función de la clase

    include_once("vistas/finhtml.php");     // Muestra el contenido html de finhtml.php
?>