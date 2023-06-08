<?php 
    require './modelo/modelo.php';

    class Controlador{

        private $vista;
        private $titulo;

        public function __construct() {
            $this->view = 'vistaLogin';
            $this->tituloPagina = '';
            $this->objetoModelo = new Modelo();
        }

        public function iniciarSesion(){
            //echo('Ha llegado');
            return $this->objetoModelo->iniciarsesion();
        }

    }

    // Fin del código php