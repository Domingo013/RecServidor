<?php

    include_once ("./vistas/vistaInicioSesion.php");       // Mostrar el contenido de header.php
    require_once './config/configdb.php';       // Trae los datos de configdb.php
    require_once './modelo.php';                // Trae los valores del modelo.php 

    // Verifico si se ha enviado el formulario
    if(isset($_POST['iniciar'])){

        // Obtengo los datos del formulario
        $nombreUsuario = $_POST["usuario"];
        $contrasenia = $_POST["password"];      // 1234
        //echo $contrasenia;
        //$hashContrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);
        //echo $hashContrasenia;

        // Valido el usuario y la contraseña (Los usuarios y contraseñas los cogeríamos de una base de datos)
        if(validarUsuario($nombreUsuario, $contrasenia, $hashContrasenia)){

            //echo 'El inicio de sesión ha sido completado correctamente';
            session_start(['cookie_lifetime' => 3600,]);    // La sesión dura 1 hora
            $_SESSION["nombreUsuario"] = $nombreUsuario;

            // Aquí enviamos al usuario a la página principal de la aplicación mediante un header
            header("Location: paginaPrincipal.php");

            exit;
        }else{
            // Aquí enviamos al usuario a la página del login otra vez mediante un header
            echo 'El inicio de sesión no se completó';
        }
    }

    // Verifico si el usuario y la contraseña son válidos (Tendria que consultar a la base de datos, este es un ejemplo)
    function validarUsuario($nombreUsuario, $contrasenia, $hashContrasenia){
        $usuariosValidos = [
            ["nombreUsuario" => "usuario1", "password" => '$2y$12$egqMkme7gE3BnbB9RcT55e8hWS0oHTeV6S6X4ZtltHIDN84EpvY5G'],    // contraseña = 1234 encriptada con BCRYPT 
        ];
        // En $usuariosValidos irían los usuarios y contraseñas obtenidos de la base de datos

        foreach($usuariosValidos as $usuario){
            if ($usuario["nombreUsuario"] === $nombreUsuario && password_verify($contrasenia, $usuario["password"])){
                return true;
            }
        }
        return false;
    }