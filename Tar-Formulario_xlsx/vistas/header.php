<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="estilos/style.css" rel="stylesheet" type="text/css">
        <title>Formulario archivos xls</title>
    </head>
    <body>
        <h2>Formulario archivos xls</h2><br>
        <div id="formulario">
            Añade los archivos xls o xlsx:<br><br>
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="archivo" accept=".xls,.xlsx"/><br><br>
                <input type="submit" name="subir" value="SUBIR ARCHIVO" id="boton"/>
            </form>
        </div>
        