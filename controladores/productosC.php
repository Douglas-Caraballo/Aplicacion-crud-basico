<?php

class PorductosC{

    //Funcion para registrara los productos
    public function RegistrarProductoC(){
        if (isset($_POST["nombreR"])){

            $datosC= array("nombre"=>$_POST["nombreR"], "precio"=> $_POST["precioR"],
            "existencia"=>$_POST["existenciaR"], "fecha"=>$_POST["fechaR"], "usuario"=>$_POST["usuarioR"]);

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
            echo'<div class="table-product-body-item">
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
    //Funcion que genera un archivo pdf con los datos ubicados en la tabla de la base de datos
    public function ReporteC(){
        $tablaBD="productos";
        $tablaBDsecond="usuario";
        $respuesta = ProductosM::ReporteM($tablaBD, $tablaBDsecond);

        ob_start();
        $pdf = new PDF();
        $pdf -> AliasNbPages();
        $pdf -> AddPage();
        $pdf -> SetFont('Arial', '', 12);

        foreach($respuesta as $key => $row){
            $pdf -> Cell(50,10,$row['nombre'],1,0,'C',0);
            $pdf -> Cell(30,10,'$ '.$row['precio'],1,0,'C',0);
            $pdf -> Cell(30,10,$row['existencia'],1,0,'C',0);
            $pdf -> Cell(30,10,$row['fecha'],1,0,'C',0);
            $pdf -> Cell(30,10,$row['usuario'],1,1,'C',0);
        }
        $pdf->Output();
        ob_end_flush();

    }
    //Funcion que genera reporte por usuarios
    public function ReporteUsuariosC(){
        $tablaBDprimary="productos";
        $tablaBDsecond="usuario";
        if(isset($_POST["idU"])){
            $datosC = array("idU"=>$_POST["idU"]);

            $respuesta = ProductosM::ReporteUsuariosM($tablaBDprimary, $tablaBDsecond, $datosC);

            ob_start();
            $pdf = new PDF();
            $pdf -> AliasNbPages();
            $pdf -> AddPage();
            $pdf -> SetFont('Arial', '', 12);

            foreach($respuesta as $key => $row){
                $pdf -> Cell(50,10,$row['nombre'],1,0,'C',0);
                $pdf -> Cell(30,10,'$ '.$row['precio'],1,0,'C',0);
                $pdf -> Cell(30,10,$row['existencia'],1,0,'C',0);
                $pdf -> Cell(30,10,$row['fecha'],1,0,'C',0);
                $pdf -> Cell(30,10,$row['usuario'],1,1,'C',0);
            }
            $pdf->Output();
            ob_end_flush();
        }
    }

}
//Clase para generar el header y el footer del archivo pdf a nuestros gustos
class PDF extends FPDF{
    function Header(){
        //Logo
        $this -> Image('vistas/img/logo.png',10,8,33);
        //Tipo de letra
        $this -> SetFont('Arial', 'B', 15);
        //Titulo
        $this -> Cell(200,10, utf8_decode("Productos"),0,1,'C');
        //Salto de linea
        $this->Ln(30);
        //Cabecera de la tabla
        $this -> Cell(50,10,'Nombre',1,0,'C',0);
        $this -> Cell(30,10,'Precio',1,0,'C',0);
        $this -> Cell(30,10,'Existencia',1,0,'C',0);
        $this -> Cell(30,10,'Fecha',1,0,'C',0);
        $this -> Cell(30,10,'Usuario',1,0,'C',0);
        //Salto de linea
        $this -> Ln(15);
    }
    function Footer(){
        //Posición a 1.5cm del final
        $this ->SetY(-15);
        //Tamaño de la paginacion
        $this -> SetFont('Arial','I',8);
        //Numero de pagina
        $this -> Cell(0,10,utf8_decode('Páina' ).$this->PageNo().'/{nb}',0,0,'C');
    }
}