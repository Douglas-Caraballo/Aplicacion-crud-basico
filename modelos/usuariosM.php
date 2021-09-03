<?php

class UsuariosM extends ConexionBD{

    static public function RegistrarUsuarioM($datosc, $tablaBD){
        $pdo = ConexionBD::cBD()-> prepare("INSERT INTO $tablaBD (usuario, clave, id_permiso) VALUES
        (:usuario, :clave, :id_permiso)");

        $pdo-> bindParam(":usuario",$datosc["usuario"],PDO::PARAM_STR);
        $pdo-> bindParam(":clave",$datosc["contraseña"],PDO::PARAM_STR);
        $pdo-> bindParam(":id_permiso",$datosc["permiso"],PDO::PARAM_STR);

        if($pdo -> execute()){
            return "Bien";
        }else{
            return "Error";
        }
        $pdo-> close();
    }
}
