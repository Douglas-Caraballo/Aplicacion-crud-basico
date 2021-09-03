<?php

class UsuariosC{

    public function RegistrarUsuarioC(){
        if (isset($_POST["usuarioTR"])){
            $datosc= array("usuario"=>$_POST["usuarioTR"], "contraseña"=>$_POST["contraseñaTR"],
            "permiso"=>$_POST["permisoTR"]);

            $tablaBD="usuario";

            $respuesta= UsuariosM::RegistrarUsuarioM($datosc, $tablaBD);

            if($respuesta=="Bien"){
                header("location:index.php?ruta=exito");
            }else{
                echo "Error!!!";
            }
        }
    }

}