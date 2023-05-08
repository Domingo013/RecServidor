<?php
    include_once ("./vistas/resultado.php");    // Mostrar el contenido de header.php
    require_once './config/configdb.php';       // Trae los datos de configdb.php
    require_once './modelo.php';                // Trae los valores del modelo.php 

    //if(isset($_POST["ejecutar"])){      // Si se pulsa el botón de ejecutar
    $consultas = new Consultas();
    $sql = $consultas->consultaSelect($_GET["sql"]);   // Envío la consulta a la función de la clase
    //$sql = $consultas->consultaSelect($_POST["consulta"]);   // Envío la consulta a la función de la clase
    $numFilas = $consultas->numFilas;

    $aux = 1;       // Variable para bandera
    if($numFilas > 0){      // Si ha devuelto 1 o más filas, crea la tabla con los valores
        echo '<table>';
        while($fila=$sql->fetch_assoc()){      // Recorre el array para sacar los datos
            if($aux == 1){      // Solo entra 1 vez ya que $aux pasa a valer 0
                echo '<tr>';
                foreach($fila as $indice=>$valor){      // Para mostrar el nombre de las columnas
                    echo '<th>'.$indice.'</th>';
                }
                echo '</tr>';
            }
            $aux = 0;
            echo '<tr>';
            foreach($fila as $indice=>$valor){      // Para mostrar las filas de cada columna de la tabla
                echo '<td>'.$valor.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }else{
        echo "No se ha devuelto nada";
    }
    //}

    include_once("vistas/finhtml.php");     // Muestra el contenido html de finhtml.php
?>