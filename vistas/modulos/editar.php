<?php
    //session_start();
    if(isset($_SESSION["super"]) || isset($_SESSION["admin"])){
?>

<div class="edit-product">
    <h2>Editar Producto</h2>
    <div class="register__content">
        <form class="register-form" method="post">
            <?php
                $editar = new PorductosC();
                $editar -> EditarProductosC();

                $actualizar = new PorductosC();
                $actualizar -> ActualizarProductosC();
            ?>
        </form>
        <figure class="register__figure">
            <img class="register__figure__img" src="vistas/img/uploading.svg" alt="">
        </figure>
    </div>
</div>

<?php
    }else if(isset($_SESSION["user"])){
        header("location:index.php?ruta=productos");
    }else{
        header("location:index.php?ruta=ingreso");
        exit();
    }
?>
