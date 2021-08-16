<?php
require_once "controladores/rutasC.php";
require_once "controladores/loginC.php";
require_once "controladores/productosC.php";

require_once "modelos/rutasM.php";
require_once "modelos/loginM.php";
require_once "modelos/productosM.php";

$ruta = new RutasControlador();
$ruta -> Plantilla();