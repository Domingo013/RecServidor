<?php
    class Modelo{
        
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

        public function consultaSelect($nombreUsuario){
            //echo "Entra en la función";
            try{
                $sql = "SELECT * from usuarios WHERE nombreUsuario = ".$nombreUsuario;
                $resultado = $modelo->query($sql);  // Ejecuta la consulta sql

                return $resultado;      // Devuelvo el resultado en forma de array
            }catch(Exception $e){
                //echo $e->getMessage();
                //echo $e->getCode();
                if($e->getCode()==1064){
                    echo "Error de sintaxis SQL(Revisa la consulta SQL introducida)<br>";
                }
            }
        }

    }