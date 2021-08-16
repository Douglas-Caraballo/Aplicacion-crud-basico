<?php

class RutasControlador{

    //funcion para incluir la plantilla

    public function Plantilla(){
        include "vistas/plantilla.php";
    }

    //function que optendrá la dirección de la ruta y cambiará de plantilla
    public function Rutas(){
        if(isset($_GET["ruta"])){
            $rutas = $_GET["ruta"];
        }else{
            $rutas = "index";
        }
        $respuesta = Modelo::RutasModelo($rutas);
        include $respuesta;
    }


}