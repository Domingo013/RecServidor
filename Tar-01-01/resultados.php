<?php
    if(isset($_POST['enviar'])){        // Si se ha pulsado el botón enviar
        if(isset($_POST['deportes']) && isset($_POST['edad']) && isset($_POST['acepto']) && !empty($_POST['nombre']) && !empty($_POST['apellidos'])){
            // Creo las variables y les doy los valores de los datos introducidos en el formulario
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $mayorEdad = $_POST['edad'];
            $descripcion = $_POST['descripcion'];
            $provincia = $_POST['provincias'];
            $deportes = $_POST['deportes'];

            // Muestro los datos de las variables
            echo 'Buenas '.$nombre.' '.$apellidos.', gracias por aceptar nuestras condiciones.<br><br>';
            echo 'Mayor de edad: '.$mayorEdad.'<br><br>';
            if(!empty($descripcion)){           // Pregunto si el campo descripción no está vacío
                echo 'Descripción: '.$descripcion.'<br><br>';  
            }
            if(!empty($provincia)){             // Pregunto si el campo provincia no está vacío
                echo 'Provincia: '.$provincia.'<br><br>';
            }

            // Recorro el array y muestro los deportes
            echo 'Deportes:';
            foreach($deportes as $indice => $valor){
                $seleccion = '';
                foreach($deportes as $indice => $deporte){
                    $seleccion .= '-'.$deporte.'<br>';
                }
            }
            echo '<br>'.$seleccion.'<br><br>';

            // Informa sobre el estado del checkbox de recibir información
            if(isset($_POST['recibir'])){
                echo 'Has elegido recibir información';
            }else{
                echo 'No deseas recibir información';
            }
        }else{
            // Mensaje informando si no se ha rellenado ningún campo obligatorio
            if(!isset($_POST['deportes']) && !isset($_POST['edad']) && !isset($_POST['acepto']) && empty($_POST['nombre'])  && empty($_POST['apellidos'])){
                echo 'No ha rellenado ninguno de los campos obligatorios';
            }else{
                if(!isset($_POST['acepto'])){       // Si no ha aceptado los términos
                    echo 'Debe aceptar los términos!!<br><br>';
                }
                echo 'No ha introducido:<br>';
                if(!isset($_POST['deportes'])){     // Si no ha seleccionado deportes
                    echo '-Deportes<br>';
                }
                if(!isset($_POST['edad'])){         // Si no ha seleccionado si es mayor de edad
                    echo '-Si es mayor de edad<br>';
                }
                if(!isset($_POST['acepto'])){       // Si no ha aceptado los términos
                    echo '-Aceptar los términos<br>';
                }
                if(empty($_POST['nombre'])){        // Si no ha rellenado el nombre
                    echo '-Nombre<br>';
                }
                if(empty($_POST['apellidos'])){     // Si no ha rellenado los apellidos
                    echo '-Apellidos<br>';
                }
            }
        }
    }
    echo '<br><br><a href="index.php"><button>Volver</button></a>';     // Botón de volver a la página del formulario
?>
