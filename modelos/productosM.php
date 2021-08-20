<?php
require_once "conexionBD.php";

class ProductosM extends ConexionBD{

    /**
     * Funcion que realiza la cunsulta SQL para registrar en la base de datos
     */

    static public function RegistrarProductoM($datosC, $tablaBD){
        $pdo = ConexionBD::cBD()-> prepare("INSERT INTO $tablaBD (nombre, precio, existencia) VALUES 
        (:nombre, :precio, :existencia)");

        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":precio", $datosC["precio"],PDO::PARAM_STR);
        $pdo -> bindParam(":existencia", $datosC["existencia"], PDO::PARAM_STR);

        if($pdo->execute()){
            return "Bien";
        }else{
            return "Error";
        }
        $pdo -> close();
    }


    /**
     *  Funcion que hace la consuta a la base de datos para mostrar los productos
     */

    static public function MostrarProductosM($tablaBD){

        $pdo = ConexionBD:: cBD()-> prepare ("SELECT id, nombre, precio, existencia FROM $tablaBD");
        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo -> close();
    }

    /**
     *  Funcion para realizar la consulta a la base de datos que muestra los valores
     *  para modificar
     */
    static public function EditarProductosM($datosC, $tablaBD){
        $pdo = ConexionBD:: cBD()-> prepare ("SELECT id, nombre, precio, existencia FROM $tablaBD WHERE
        id= :id");

        $pdo->bindParam(":id", $datosC,PDO::PARAM_INT);
        $pdo -> execute();
        return $pdo -> fetch();
        $pdo -> close();
    }

    /**
     *  Funcion que actualiza los datos en la base de datos
     */
    static public function ActualizarProductosM($datosC, $tablaBD){
        $pdo = ConexionBD::cBD()-> prepare("UPDATE $tablaBD SET nombre= :nombre, precio= :precio, existencia=:existencia
        WHERE id= :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datosC["nombre"],PDO::PARAM_STR);
        $pdo -> bindParam(":precio", $datosC["precio"], PDO::PARAM_STR);
        $pdo -> bindParam(":existencia",$datosC["existencia"],PDO::PARAM_STR);

        if ($pdo -> execute()){
            return "Bien";
        }else{
            return "Error";
        }
        $pdo-> close();
    }

    /**
     *  Funcion que ejecuta la consulta para eliminar los archivos en la base de datos
     */

    static public function BorrarProductosM($datosC, $tablaBD){
        $pdo = ConexionBD::cBD()-> prepare("DELETE FROM $tablaBD WHERE id=:id");

        $pdo -> bindParam(":id",$datosC, PDO::PARAM_INT);

        if($pdo -> execute()){
            return "Bien";
        }else{
            return "Error";
        }
        $pdo ->close();
    }

    /**
     * Funcion que realiza una consulta a la tabla de la base de datos y la envia al controlador
     */

    static public function ReporteM($tablaBD){
        $pdo = ConexionBD::cBD()-> prepare("SELECT nombre, precio, existencia FROM $tablaBD");

        $pdo -> execute();
        return $pdo -> fetchAll();
        $pdo -> close();
    }
}
