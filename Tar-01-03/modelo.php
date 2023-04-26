<?php
    class Consultas{
        
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
            $resultado1 = $this->conexion->query($sql1);        // Ejecuta el query de la consulta sql

            return $resultado1;      // Devuelvo el resultado en forma de array
        }

        public function consultaActualizar($sql1){
            $resultado1 = $this->conexion->query($sql1);        // Ejecuta el query de la consulta sql
            //$filasAfectadas = $this->conexion->affected_rows;       // Obtengo el numero de filas afectadas
            //$array = array($resultado1, $filasAfectadas);       // Guardo en un array el numero de filas afectadas y el resultado
            return $resultado1;      // Devuelve el array con el numero de filas afectadas
        }

    }
?>