<?php
    class Consultas{

        public $numFilas;
        public $filasAfectadas;
        
        public function __construct(){
            //echo "Llamo a conectar";
            $this->conexion = $this->conectar();        // Llama al método conectar
        }

        public function conectar(){
            //echo "Ejecuta conexion";
            $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);  // Realiza la conexión con los datos de conexión de configdb.php
            if($conexion->connect_errno){       // Si hay algún error de conexión muestra lo siguiente
                die("No se ha podido conectar con la base de datos".$conexion->connect_errno);
            }
            $conexion->set_charset('utf8');     // Aplica el formato de caracteres utf8

            return $conexion;       // Devuelve la conexión
        }

        public function consultaSelect($sql1){
            //echo "Entra en la función";
            try{
                $resultado = $this->conexion->query($sql1);        // Ejecuta el query de la consulta sql
                echo "Número de filas devueltas: ".$this->numFilas=$resultado->num_rows;

                return $resultado;      // Devuelvo el resultado en forma de array
            }catch(Exception $e){
                //echo $e->getMessage();
                //echo $e->getCode();
                if($e->getCode()==1064){
                    echo "Error de sintaxis SQL(Revisa la consulta SQL introducida)<br>";
                }
            }  
        }

        public function consultaActualizar($sql1){
            try{
                $resultado = $this->conexion->query($sql1);        // Ejecuta el query de la consulta sql
                $this->filasAfectadas = $this->conexion->affected_rows;       // Obtengo el numero de filas afectadas
                echo "Número de filas afectadas: ".$this->filasAfectadas;
                
                return $resultado;      // Devuelve el array con el numero de filas afectadas
            }catch(Exception $e){
                //echo $e->getMessage();
                //echo $e->getCode();
                echo "Error de sintaxis SQL(Revisa la consulta SQL introducida)<br>";
            }
        }

    }
?>