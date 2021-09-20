<?php
//session_start();
    if(isset($_SESSION["super"])){
?>
    <div class="content-exit">
        <h2>El usuario fue registrado con éxito</h2>
        <p>Desea volver?</p>
        <a class="content-exit__button" href="index.php?ruta=productos">Productos</a>
    </div>
<?php
    }else if(isset($_SESSION["admin"])|| isset($_SESSION["user"])){
        header("location:index.php?ruta=productos");
    }else{
        header("location:index.php?ruta=ingreso");
        exit();
    }
?>