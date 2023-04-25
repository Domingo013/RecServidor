<?php
    include_once ("./vistas/header.php");
    require_once './config/configdb.php';
    require_once './modelo.php';

    if(isset($_POST["ejecutar"])){      // Si se pulsa el botón de ejecutar
        $consultas = new Consultas();
        $sql1 = $consultas->consultaSelect($_POST["consulta"]);   // Envío la consulta a la función de la clase
        //$sql1 = $consultas->consultaActualizar($_POST["consulta"]);   // Envío la consulta a la función de la clase

        //$filasAfectadas = $sql1->affected_rows;
        //echo 'Número de filas afectadas: '.$filasAfectadas;

        $numFilas = $sql1->num_rows;
        echo 'Numero de filas devueltas: '.$numFilas.'<br>';

        $aux = 1;       // Variable para bandera
        if($numFilas > 0){
            while($fila=$sql1->fetch_assoc()){
                if($aux == 1){
                    foreach($fila as $indice=>$valor){
                        echo $indice;
                    }
                }
                $aux = 0;
                foreach($fila as $indice=>$valor){
                    echo '<br>'.$valor;
                }
            }
        }else{
            echo "No se ha devuelto nada";
        }

    }
    include_once("vistas/finhtml.php");
?>