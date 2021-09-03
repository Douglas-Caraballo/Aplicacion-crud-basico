<?php
require_once("libs/fpdf.php");

require_once "controladores/rutasC.php";
require_once "controladores/loginC.php";
require_once "controladores/productosC.php";
require_once "controladores/usuariosC.php";

require_once "modelos/rutasM.php";
require_once "modelos/loginM.php";
require_once "modelos/productosM.php";
require_once "modelos/usuariosM.php";

$ruta = new RutasControlador();
$ruta -> Plantilla();