<?php
    class Consultas{
        
        public function __construct(){
            //echo "Llamo a conectar";
            $this->conexion = $this->conectar();
        }

        public function conectar(){
            //echo "Ejecuta conexion";
            $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
            //echo "aaasassasasaws";
            if($conexion->connect_errno){
                die("No se ha podido conectar con la base de datos".$conexion->connect_errno);
            }
            $conexion->set_charset('utf8');

            return $conexion;
        }

        public function consultaSelect($sql1){
            //echo "Entra en la función";
            $resultado1 = $this->conexion->query($sql1);

            return $resultado1;      // Devuelvo el array
        }

        public function consultaActualizar($sql){
            $resultado = $this->conexion->query($sql);

            return $resultado;      // Devuelve 
        }

    }

?>