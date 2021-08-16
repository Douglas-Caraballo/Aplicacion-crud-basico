<?php
require_once "conexionBD.php";

class LoginM extends ConexionBD{

/**
 * Establece la conexion con la base de datos y realiza una consulta a la tabla
*para confirmarla existencia del usuario
*/

    static public function IngresoM($datosc, $tablaBD){

        $pdo = ConexionBD::cBD()-> prepare("SELECT usuario, clave FROM $tablaBD WHERE usuario =:usuario");
        $pdo -> bindParam(":usuario", $datosc["usuario"], PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();

    }


}