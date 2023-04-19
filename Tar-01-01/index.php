<!-- Hacer un formulario con distintos tipos de entrada de datos y ver como se manejan y guardan los datos -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css">
        <title>Ejercicio formulario 1</title>
    </head>
    <body>
        <h2>FORMULARIO PRUEBA DE ENVIO DE DATOS (arrays)</h2>
        <div id="contenedor">
            <!-- Inicio formulario -->
            <form action="resultados.php" method="post">        
                <label>*Nombre:</label>
                <input type="text" name="nombre"><br><br>
                <label>*Apellidos:</label>
                <input type="text" name="apellidos"><br><br>
                <label>*Mayor de edad:</label>
                Sí<input type="radio" name="edad" value="si">
                No<input type="radio" name="edad" value="no"><br><br>
                <label>*Deportes que realiza:</label><br>
                <input type="checkbox" name="deportes[]" value="Ciclismo">Ciclismo<br>
                <input type="checkbox" name="deportes[]" value="Natación">Natación<br>
                <input type="checkbox" name="deportes[]" value="Fútbol">Fútbol<br>
                <input type="checkbox" name="deportes[]" value="Tenis">Tenis<br><br>
                <label>Descripcion:</label><br>
                <textarea name="descripcion" cols="30" rows="7"></textarea><br><br>
                <select name="provincias">
                    <option value="" hidden>Provincias</option>
                    <option value="Badajoz">Badajoz</option>
                    <option value="Caceres">Caceres</option>
                    <option value="Sevilla">Sevilla</option>
                    <option value="Huelva">Huelva</option>
                    <option value="Madrid">Madrid</option>
                </select><br><br>
                <input type="checkbox" name="acepto">*Acepto las condiciones<br>
                <input type="checkbox" name="recibir">Deseo recibir información<br><br>
                <input type="submit" name="enviar" value="ENVIAR" id="boton"/><br><br>      <!-- Botón de enviar -->
            </form>
            <!-- Fin formulario -->
            <span>(Los campos marcados con un * son obligatorios)</span>
        </div>
    </body>
</html>
