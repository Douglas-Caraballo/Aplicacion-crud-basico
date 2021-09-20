<?php
//session_start();
if(isset($_SESSION["super"]) || isset($_SESSION["admin"])){
    $reporte = new PorductosC();
    $reporte -> ReporteC();
}else if(isset($_SESSION["user"])){
    header("location:index.php?ruta=productos");
}else{
    header("location:index.php?ruta=ingreso");
    exit();
}