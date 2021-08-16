<?php

class LoginC{

    /**
     * Funcion que valida si el usuario ingresado exista en la base de datos
     * permitiendo entrara al sistema y creando una variable de sesion
     */

    public function IngresoC(){
        if (isset($_POST["usuarioI"])){
            $datosc= array("usuario"=>$_POST["usuarioI"], "clave"=>$_POST["claveI"]);

            $tablaBD = "usuario";

            $respuesta = LoginM:: IngresoM($datosc, $tablaBD);

            if($respuesta["usuario"]==$_POST["usuarioI"] && $respuesta["clave"]==$_POST["claveI"]){
                session_start();

                $_SESSION["Ingreso"]=true;
                header("location:index.php?ruta=productos");
            }else{
                echo "ERROR AL INGRESAR";
            }
        }
    }
}