<?php
    include_once ("./vistas/header.php");       // Mostrar el contenido de header.php
    require_once './config/configdb.php';       // Trae los datos de configdb.php
    require_once './modelo.php';                // Trae los valores del modelo.php 

    // Verificar si la cookie ya está configurada
    // Contador de consultas Select
    if(isset($_COOKIE['contadors']) && isset($_COOKIE['contadora'])) {
        // Mostrar el valor del contador de select
        echo "<div id='contadorSelect'>".$_COOKIE['contadors']."</div>";
        echo "<div id='contadorActualizar'>".$_COOKIE['contadora']."</div>";
        // Si ya está configurada, aumenta su valor en 1
        //$contadors = $_COOKIE['contadors'] + 1;
    }else{
        // Si no está configurada, establece su valor en 1
        //$contadors = 1;
        setcookie('contadors', 0, time() + 86400);     // La cookie expirará en 1 día
        setcookie('contadora', 0, time() + 86400);     // La cookie expirará en 1 día
    }

    if(isset($_POST["ejecutar"])){      // Si se pulsa el botón de ejecutar
        if(isset($_COOKIE['contadors'])){
            $numContadors = $_COOKIE['contadors'] + 1;
            setcookie('contadors', $numContadors, time() + 86400);
        }
        $consultas = new Consultas();
        //$primera = strtolower(substr($_POST["consulta"], 0, 6));     // Pasamos a minúsculas toda la consulta SQL y nos quedamos con las 6 primeras letras

        // Utilizo el str_replace para sustituir los espacios en blanco por nada y así la palabra que los 6 primeros caracteres estará completa.
        //$primera = strtolower(substr(str_replace(' ', '', $_POST["consulta"]), 0, 6));     // Pasamos a minúsculas toda la consulta SQL y nos quedamos con las 6 primeras letras

        // Utilizo el trim para quitar los espacios en blanco de la izquierda y de la derecha, así la palabra de los 6 primeros caracteres estará completa.
        $primera = strtolower(substr(trim($_POST["consulta"]), 0, 6));     // Pasamos a minúsculas toda la consulta SQL y nos quedamos con las 6 primeras letras

        //echo ".".$primera.".<br>";
        //$primera = str_replace(' ', '', $primera);
        //echo ".".$primera.".<br>";
        //echo $_POST["consulta"]."<br>";
        if($primera == 'select'){

            $sql1 = $consultas->consultaSelect($_POST["consulta"]);   // Envío la consulta a la función de la clase
            $numFilas = $consultas->numFilas;

            $aux = 1;       // Variable para bandera
            if($numFilas > 0){      // Si ha devuelto 1 o más filas, crea la tabla con los valores
                echo '<table>';
                while($fila=$sql1->fetch_assoc()){      // Recorre el array para sacar los datos
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
        }elseif($primera == 'insert' || $primera == 'update' || $primera == 'delete'){      // Si se pulsa el botón de ejecutar
            if(isset($_COOKIE['contadora'])){
                $numContadora = $_COOKIE['contadora'] + 1;
                setcookie('contadora', $numContadora, time() + 86400);
            }
            $consultas = new Consultas();   
            $sql1 = $consultas->consultaActualizar($_POST["consulta"]);     // Envío la consulta a la función de la clase
        }
    }
    
    // Mostrar el valor del contador de actualizar
    echo "<div id='contadorActualizar'>".$_COOKIE['contadora']."</div>";

    include_once("vistas/finhtml.php");     // Muestra el contenido html de finhtml.php
?>