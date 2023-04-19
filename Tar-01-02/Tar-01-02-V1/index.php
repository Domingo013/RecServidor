<!DOCTYPE html>
<?php
    define("SERVIDOR",'2daw.esvirgua.com');
    define("USUARIO",'user2daw_19');
    define("PASSWORD",'M^wPDCC_z3~0');
    define("BBDD",'user2daw_BD1-19');

    //$conexion = new mysqli("localhost", "root", "", "user2daw_bd1-19"); // Conecta con la base de datos
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); // Conecta con la base de datos
    $conexion->set_charset("utf8"); // Usa juego caracteres UTF8
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css">
        <title>Ejercicio Jesuitas</title>
    </head>
    <body>
        <h2>Ejercicio Jesuitas</h2>
        <div id="contenedor">
            <form action="index.php" method="post">
                <label>Id visita:</label>
                <input type="text" name="id"><br><br>
                <input type="submit" name="enviar" value="ENVIAR" id="boton"/>
            </form>
        </div>
        <div id="contenedor2">
            <form action="index.php" method="post">     <!-- Formulario de modificar -->
                <?php
                if(isset($_POST['enviar'])){        // Si se pulsa el botón de enviar
                    $id = $_POST["id"];     // Asigno el valor introducido en el formulario a la variable id
                    echo 'El id de la visita es: '.$id.'<br>';
                
                    // Consulta para obtener la ip de la visita cuyo id de visita es el introducido
                    $sql1 = "SELECT ip from visita WHERE idVisita = ".$id;       // No va entre comillas porque es un valor numérico y no una cadena de caracteres
                    $resultado1 = $conexion->query($sql1);  // Ejecuta la consulta sql
                    //echo var_dump($resultado1);

                    if($fila = $resultado1->fetch_assoc()){
                        echo 'La ip del lugar con id visita '.$id.' es '.$fila["ip"].'<br>';
                        $ip = $fila['ip'];

                        echo '<select name="visita" id="ids">';
                        // Consulta para obtener el nombre del lugar cuya ip es igual al obtenido en la anterior consulta
                        $sql2 = "SELECT lugar from lugar WHERE ip = '".$ip."'";     // $ip tiene que ir entre comillas porque es una cadena de caracteres, daría error si no tuviese comillas
                        $resultado2 = $conexion->query($sql2);  // Ejecuta la consulta sql

                        if($fila = $resultado2->fetch_assoc()){
                            //echo $fila['lugar']."<br>";
                            echo "<option value='".$fila['ip']."'>".$fila['lugar']."</option>";
                        }

                        // Consulta para obtener los nombres de los lugares cuya ip no es igual al obtenido en primera consulta
                        $sql3 = "SELECT ip, lugar from lugar WHERE ip != '".$ip."'";    // $ip tiene que ir entre comillas porque es una cadena de caracteres, daría error si no tuviese comillas
                        $resultado3 = $conexion->query($sql3);  // Ejecuta la consulta sql

                        while($fila = $resultado3->fetch_assoc()){
                            //echo $fila['lugar']."<br>";
                            echo "<option value='".$fila['ip']."'>".$fila['lugar']."</option>";
                        }
                        echo "</select>";
                    }else{
                        echo 'La id introducida no existe';
                    }
                }
                ?>
            </form>
        </div>
    </body>
</html>