<?php
    define("SERVIDOR",'2daw.esvirgua.com');
    define("USUARIO",'user2daw_19');
    define("PASSWORD",'M^wPDCC_z3~0');
    define("BBDD",'user2daw_BD1-19');

    //$conexion = new mysqli("localhost", "root", "", "user2daw_bd1-19"); // Conecta con la base de datos
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); // Conecta con la base de datos
    $conexion->set_charset("utf8"); // Usa juego caracteres UTF8
?>