<?php
    //session_start();
    if(isset($_SESSION["super"]) || isset($_SESSION["admin"]) || isset($_SESSION["user"])){
        $_SESSION["user_id"];
?>

<div class="register">
    <h2>Registro de Producto</h2>
    <div class="register__content">
        <form class="register-form" method="post">

            <input type="text" placeholder="Nombre" name="nombreR" required>

            <input type="text" placeholder="Precio" name="precioR" required>

            <input type="text" placeholder="Existencia" name="existenciaR" required>

            <input type="date" placeholder="Fecha" name="fechaR" required>

            <input class="submit" type="submit" value="Registrar">
        </form>

        <?php
            $registrar = new PorductosC();
            $registrar -> RegistrarProductoC();
        ?>

    <figure class="register__figure">
        <img class="register__figure__img" src="vistas/img/register.svg" alt="">
    </figure>
    </div>
    
</div>
<?php
    }else{
        header("location:index.php?ruta=ingreso");
        exit();
    }