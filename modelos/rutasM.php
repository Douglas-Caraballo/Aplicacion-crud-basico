<?php

class Modelo{

    static public function RutasModelo($rutas){
        if ($rutas=="ingreso" || $rutas=="registrar" || $rutas == "productos" || $rutas == "salir"
        || $rutas == "editar"){

            $pagina= "vistas/modulos/".$rutas.".php";
        }else if ($rutas=="index"){
            $pagina = "vistas/modulos/ingreso.php";
        }else{
            $pagina= "vistas/modulos/ingreso.php";
        }

        return $pagina;
    }
}