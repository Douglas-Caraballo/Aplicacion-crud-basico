<?php
    session_start();

    if(!$_SESSION["Ingreso"]){
        header("location:index.php?ruta=ingreso");
        exit();
    }
?>

<div class="edit-product">
    <h2>Editar Producto</h2>
    <form class="register-form" method="post">
        <?php
            $editar = new PorductosC();
            $editar -> EditarProductosC();

            $actualizar = new PorductosC();
            $actualizar -> ActualizarProductosC();
        ?>
    </form>
</div>