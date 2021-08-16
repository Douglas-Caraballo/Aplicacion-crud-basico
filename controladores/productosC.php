<?php

class PorductosC{

    //Funcion para registrara los productos
    public function RegistrarProductoC(){
        if (isset($_POST["nombreR"])){

            $datosC= array("nombre"=>$_POST["nombreR"], "precio"=> $_POST["precioR"],
            "existencia"=>$_POST["existenciaR"]);

            $tablaBD="productos";

            $respuesta = ProductosM::RegistrarProductoM($datosC, $tablaBD);

            if($respuesta=="Bien"){
                header("location:index.php?ruta=productos");
            }else{
                echo "Error!!!";
            }

        }
    }

    //Función para mostrar los productos
    public function MostrarProductosC(){
        $tablaBD = "productos";

        $respuesta = ProductosM::MostrarProductosM($tablaBD);

        foreach($respuesta as $key => $value){
            echo'<div class="table-product-body">
                    <article class="table-product-item">'.$value["nombre"].'</article>
                    <article class="table-product-item">$'.$value["precio"].'</article>
                    <article class="table-product-item">'.$value["existencia"].'</article>
                    <article class="table-product-item"><a class="button-product" href="index.php?ruta=editar&id='.$value["id"].'">Editar</a></article>
                    <article class="table-product-item"><a class="button-product" href="index.php?ruta=productos&idB='.$value["id"].'">Eliminar</a></article>
                </div>';
        }
    }

    //Funcion para editar los productos
    public function EditarProductosC(){
        $datosC =$_GET["id"];

        $tablaBD="productos";

        $respuesta = ProductosM::EditarProductosM($datosC, $tablaBD);

        echo'<input type="hidden" value="'.$respuesta["id"].'" name="idE">

            <input type="text" placeholder="Nombre" value="'.$respuesta["nombre"].'" name="nombreE" required>

            <input type="text" placeholder="Precio" value="'.$respuesta["precio"].'" name="precioE" required>

            <input type="text" placeholder="Existencia" value="'.$respuesta["existencia"].'" name="existenciaE" required>

            <input class="submit" type="submit" value="Actualizar">';
    }

    //Actualizar Productos

    public function ActualizarProductosC(){
        if(isset($_POST["nombreE"])){
            $datosC = array("id"=> $_POST["idE"], "nombre"=>$_POST["nombreE"], "precio"=>$_POST["precioE"],
        "existencia"=>$_POST["existenciaE"]);

        $tablaBD="productos";

        $respuesta = ProductosM::ActualizarProductosM($datosC, $tablaBD);

        if($respuesta == "Bien"){
            header("location:index.php?ruta=productos");
        }else{
            echo "Error!!!";
        }
        }
    }

    //Funcion para eliminar los productos

    public function BorrarProductosC(){
        if(isset($_GET["idB"])){
            $datosC = $_GET["idB"];
            $tablaBD="productos";

            $respuesta= ProductosM::BorrarProductosM($datosC, $tablaBD);

            if($respuesta=="Bien"){
                header("location:index.php?ruta=productos");
            }else{
                echo "Error!!!!";
            }

        }
    }

}
