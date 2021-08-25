<?php
session_start();

if(!$_SESSION["Ingreso"]){
    header("location:index.php?ruta=ingreso");
    exit();
}

$reporte = new PorductosC();
$reporte -> ReporteC();