<?php
    include_once ("./vistas/header.php");       // Mostrar el contenido de header.php

    $extensiones = array('xls', 'xlsx');
    
    if(isset($_FILES['archivo'])) {
        $extension_archivo = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
    
        if(in_array($extension_archivo, $extensiones)) {
            echo "<div id='bien'>El archivo introducido se ha subido correctamente</div>";
        }else {
            echo "<div id='error'>El tipo de archivo introducido no se puede subir.<br> Solo se permiten archivos de Excel con extensión .xls, .xlsx</div>";
        }
        
    }

    include_once("vistas/finhtml.php");     // Muestra el contenido html de finhtml.php
?> 