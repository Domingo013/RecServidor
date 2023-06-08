<?php
    if(isset($_POST['iniciar'])){
        if(!empty($_POST['usuario'] && !empty($_POST['password']))){
            require_once './controlador/controlador.php';
            $controlador = new Controlador();
            $controlador->iniciarSesion();
        }
    }
?>
        <div class="contenedor">
            <div class="formulario">
                <h1>INICIAR SESIÓN</h1>
                <form action="index.php" method="POST">
                    <input type="text" name="usuario" placeholder="Usuario"><br>
                    <input type="password" name="password" placeholder="Contraseña" minlength="4" required><br><br>
                    <input type="submit" name="iniciar" value="INICIAR">
                </form>
            </div>
        </div>    
        
