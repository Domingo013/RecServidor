<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos/style.css" rel="stylesheet" type="text/css">
    <title>Inicio de sesión</title>
</head>
    <body>
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
    </body>
</html>