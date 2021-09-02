<?php
require_once "conexionBD.php";

class ProductosM extends ConexionBD{

    /**
     * Funcion que realiza la cunsulta SQL para registrar en la base de datos
     */

    static public function RegistrarProductoM($datosC, $tablaBD){
        $pdo = ConexionBD::cBD()-> prepare("INSERT INTO $tablaBD (nombre, precio, existencia, fecha, id_usuario) VALUES 
        (:nombre, :precio, :existencia, :fecha, :usuario)");

        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":precio", $datosC["precio"],PDO::PARAM_STR);
        $pdo -> bindParam(":existencia", $datosC["existencia"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo -> bindParam(":usuario",$datosC["usuario"],PDO::PARAM_INT);

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
        $pdo = ConexionBD:: cBD()-> prepare ("SELECT id, nombre, precio, existencia, fecha FROM $tablaBD WHERE
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

    static public function ReporteM($tablaBD, $tablaBDsecond){
        $pdo = ConexionBD::cBD()-> prepare("SELECT P.nombre, P.precio, P.existencia, P.fecha, U.usuario FROM $tablaBD AS P INNER JOIN 
        $tablaBDsecond AS U WHERE P.id_usuario = U.id");

        $pdo -> execute();
        return $pdo -> fetchAll();
        $pdo -> close();
    }

    /**
     * Funcion que realiza la consulta a la base de datos para mostrar los datos de la tabla relacionada y la relación entre esta
     */
    static public function ReporteUsuariosM($tablaBDprimary, $tablaBDsecond,$datosC){
        $pdo = ConexionBD::cBD()-> prepare("SELECT * FROM $tablaBDsecond AS U INNER JOIN $tablaBDprimary AS P 
        ON P.id_usuario= U.id WHERE P.id_usuario=:id");

        $pdo -> bindParam(":id",$datosC["idU"], PDO::PARAM_INT);

        $pdo -> execute();
        return $pdo -> fetchAll();
        $pdo-> close();
    }
}
