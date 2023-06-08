<?php
    session_start();
    session_unset();
    session_destroy();
    require_once dirname(__DIR__).'/vista/header.php';
?>
    <div class="contenedor">
            <div class="formulario">
                <h1>Has cerrado sesión</h1>
                <a href="./vistaLogin.php"><button>Iniciar Sesión</button></a>
            </div>
        </div>  
        
