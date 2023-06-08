<?php

    class Modelo{

	private $table = 'Usuarios';
    private $conexion;      // Atributo conexión
        
        public function __construct() {
            
        }

        public function getConexion(){
            $objetoModelodb = new Modelodb();
            $this->conexion = $objetoModelodb->conexion;    // El atributo conexión de esta clase lo igualamos a el valor devuelto de la función conectar del modelodb
        }

        public function iniciarSesion(){
            $this->getConexion();
        
            $nombreUsuario = $_POST['usuario'];
            $password = $_POST['password'];
            //echo '<br>'.$nombreUsuario;
            //echo '<br>'.$password;

            try{
                $sql = 'SELECT * FROM Usuarios WHERE nombreUsuario = "'.$nombreUsuario.'"';     ////////////////////////// Comprobar si puedo dejar el nombre de la tabla 'SELECT * FROM '.$this->table.'WHERE nombreUsuario = "'.$nombreUsuario.'" '; 
                $resultado = $this->conexion->query($sql);
                while($fila = $resultado->fetch_assoc()){
                    //echo $fila['lugar']."<br>";
                    //echo '<br>Nombre BD: '.$fila['nombreUsuario'].' password BD: '.$fila['password'];
                    //echo '<br>Nombre: '.$nombreUsuario.' password: '.$password;
                    $nombreUsuariobd = $fila['nombreUsuario'];
                    $passwordUsuariobd = $fila['password'];
                }
                // return $resultado;      // Devuelvo el resultado en forma de array
            }catch(Exception $e){
                //echo $e->getMessage();
                //echo $e->getCode();
                // if($e->getCode()==1064){
                //     echo "Error de sintaxis SQL(Revisa la consulta SQL introducida)<br>";
                // }
            }

            if($nombreUsuariobd === $nombreUsuario && password_verify($password, $passwordUsuariobd)){
                //echo 'El inicio de sesión ha sido completado correctamente';
                session_start(['cookie_lifetime' => 3600,]);    // La sesión dura 1 hora
                $_SESSION["nombreUsuario"] = $nombreUsuario;
    
                // Aquí enviamos al usuario a la página principal de la aplicación mediante un header
                header("Location: ./vista/paginaPrincipal.php");
    
                exit;
            }else{
                // Aquí enviamos al usuario a la página del login otra vez mediante un header
                echo 'El inicio de sesión no se completó';
            }
        }
    }
    
    // Fin del código php