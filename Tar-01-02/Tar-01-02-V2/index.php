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
        <title>Ejercicio Jesuitas V2</title>
    </head>
    <body>
        <h2>Ejercicio Jesuitas V2</h2>
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
                        // Consulta para obtener los nombres de los lugares
                        $sql2 = "SELECT ip, lugar from lugar";
                        $resultado2 = $conexion->query($sql2);  // Ejecuta la consulta sql

                        /*while($fila = $resultado2->fetch_assoc()){
                            if($fila['ip'] == $ip){
                                echo "<option value='".$fila['ip']."'>".$fila['lugar']."</option>";
                                break;      // Finalizo la ejecución del bucle
                            }
                        }*/
                        while($fila = $resultado2->fetch_assoc() || $fila['ip'] == $ip){
                            
                        }
                        echo "<option value='".$fila['ip']."'>".$fila['lugar']."</option>";
                        $resultado2->data_seek(0);      // Muevo el puntero hasta la posición 0
                        while($fila = $resultado2->fetch_assoc()){
                            if($fila['ip'] != $ip){
                                echo "<option value='".$fila['ip']."'>".$fila['lugar']."</option>";
                                //$row = $resultado2->fetch_row(0);
                            }
                        }
                        echo "</select>";

                        /* 
                            Si hacemos otro fetch y avanzamos el puntero después de la última fila nos dará 
                            un warning por intentar acceder a un valor que no existe
                        */
                        //$fila = $resultado2->fetch_assoc();
                        //echo $fila['lugar'];
                    }else{
                        echo 'La id introducida no existe';
                    }
                }
                ?>
            </form>
        </div>
    </body>
</html>