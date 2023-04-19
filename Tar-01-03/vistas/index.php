<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv='refresh' content='1'>     <!-- Para actualizar la página cada segundo -->
        <link href="../estilo/style.css" rel="stylesheet" type="text/css">
        <title>Plantilla sql</title>
    </head>
    <body>
        <?php
            header("Refresh:1");    // Para refrescar la página cada segundo
            echo date('H:i:s Y-m-d');
        ?>
        <h2>¿Qué Jesuita ha viajado más?</h2>
        <h2>¿Qué lugar es el más visitado?</h2>
    </body>
</html>