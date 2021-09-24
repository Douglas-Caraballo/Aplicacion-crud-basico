<?php
session_start();
if(empty($_SESSION["super"]) && empty($_SESSION["admin"]) && empty($_SESSION["user"])){
?>
    <aside class="aside-menu aside-activate" id="menu">
    <samp class="aside-menu__close" id="close">&times</samp>
    <div class="aside-menu__wrapper">
        <a href="index.php">Inicio</a>
        <a href="index.php?ruta=ingreso">Ingresar</a>
        <a href="index.php?ruta=productos">Productos</a>
        <a href="index.php?ruta=registrar">Registrar Productos</a>
        <a href="index.php?ruta=usuario">Registrar Usuarios</a>
        <a href="index.php?ruta=reporte">Generar Reportes</a>
    </div>
</aside>

<?php
}else if(isset($_SESSION["super"])){
?>
<aside class="aside-menu aside-activate" id="menu">
    <samp class="aside-menu__close" id="close">&times</samp>
    <div class="aside-menu__wrapper">
        <a href="index.php">Inicio</a>
        <a href="index.php?ruta=productos">Productos</a>
        <a href="index.php?ruta=registrar">Registrar Productos</a>
        <a href="index.php?ruta=usuario-img">Asignar Foto de Usuario</a>
        <a href="index.php?ruta=usuario">Registrar Usuarios</a>
        <a href="index.php?ruta=reporte">Generar Reportes</a>
        <a href="index.php?ruta=salir">Salir</a>
    </div>
</aside>
<?php
}else if(isset($_SESSION["admin"])){
?>
<aside class="aside-menu aside-activate" id="menu">
    <samp class="aside-menu__close" id="close">&times</samp>
    <div class="aside-menu__wrapper">
        <a href="index.php">Inicio</a>
        <a href="index.php?ruta=productos">Productos</a>
        <a href="index.php?ruta=registrar">Registrar Productos</a>
        <a href="index.php?ruta=reporte">Generar Reportes</a>
        <a href="index.php?ruta=salir">Salir</a>
    </div>
</aside>
<?php
}else if(isset($_SESSION["user"])){
?>
<aside class="aside-menu aside-activate" id="menu">
    <samp class="aside-menu__close" id="close">&times</samp>
    <div class="aside-menu__wrapper">
        <a href="index.php">Inicio</a>
        <a href="index.php?ruta=productos">Productos</a>
        <a href="index.php?ruta=registrar">Registrar Productos</a>
        <a href="index.php?ruta=salir">Salir</a>
    </div>
</aside>
<?php
}
?>