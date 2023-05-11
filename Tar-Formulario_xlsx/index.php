<?php
    include_once ("./vistas/header.php");       // Mostrar el contenido de header.php

    $extensiones = array('xls', 'xlsx');
    $directorio = "./excels/";

    if(isset($_FILES['archivo'])) {
        $extension_archivo = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);      // Extensión del archivo
        $nombre_archivo = $_FILES['archivo']['name'];      // Nombre del archivo
        $nombre_tmp_archivo = $_FILES['archivo']['tmp_name'];      // Nombre temporal del archivo
    
        // Si la extensión del archivo coincide con alguna de las guardadas en el array $extensiones
        if(in_array($extension_archivo, $extensiones)){  
            // Si el archivo que quiere subir ua existe en el directorio 
            if(file_exists($directorio.$nombre_archivo)){
                unlink($directorio.$nombre_archivo);    // Borra el archivo seleccionado
                echo "<div id='error'>Ya existe un archivo con el mismo nombre</div>";
            }else{
                if(move_uploaded_file($nombre_tmp_archivo, $directorio.$nombre_archivo)){   // Mover el archivo al directorio 
                    echo "<div id='acierto'>El archivo introducido se ha subido correctamente.<br>".$nombre_archivo."<br>".$nombre_tmp_archivo."</div>";
                }else{
                    echo "<div id='error'>El archivo no se ha subido correctamente</div>";
                }
            }
        }else{
            echo "<div id='error'>El tipo de archivo introducido no se puede subir.<br> Solo se permiten archivos de Excel con extensión .xls, .xlsx</div>";
        }
    }

    include_once("vistas/finhtml.php");     // Muestra el contenido html de finhtml.php
?>