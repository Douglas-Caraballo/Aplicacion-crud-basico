<?php

class Modelo{

    static public function RutasModelo($rutas){
        if ($rutas=="ingreso" || $rutas=="registrar" || $rutas == "productos" || $rutas == "salir"
        || $rutas == "editar" || $rutas=="reporte" || $rutas=="reporte-producto"){

            $pagina= "vistas/modulos/".$rutas.".php";
        }else if ($rutas=="index"){
            $pagina = "vistas/modulos/inicio.php";
        }else{
            $pagina= "vistas/modulos/inicio.php";
        }

        return $pagina;
    }
}