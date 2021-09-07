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
                if($respuesta["id_permiso"]=="1"){
                    session_start();
                    $_SESSION["super"]=true;
                    $_SESSION["user_id"]=$respuesta["id"];
                    header("location:index.php?ruta=productos");
                }else if ($respuesta["id_permiso"]=="2"){
                    session_start();
                    $_SESSION["admin"]=true;
                    $_SESSION["user_id"]=$respuesta["id"];
                    header("location:index.php?ruta=productos");
                }else{
                    session_start();
                    $_SESSION["user"]=true;
                    $_SESSION["user_id"]=$respuesta["id"];
                    header("location:index.php?ruta=productos");
                }

            }else{
                echo "ERROR AL INGRESAR";
            }
        }
    }
}