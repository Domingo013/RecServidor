<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="estilos/style.css" rel="stylesheet" type="text/css">
        <title>Platilla SQL</title>
    </head>
    <body>
        <h2>Plantilla SQL</h2>
        <div id="formulario">
            Introduce la consulta a ejecutar:
            <form action="index.php" method="POST">
                <input type="text" name="consulta" id="consulta"><br>
                <input type="submit" name="ejecutar" value="EJECUTAR" id="boton">
            </form>
        </div><br><br>
        <div id="resultado">

        