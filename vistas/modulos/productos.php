<?php
    session_start();

    if(!$_SESSION["Ingreso"]){
        header("location:index.php?ruta=ingreso");
        exit();
    }
?>

<div class="product">
    <h2>lista de productos</h2>

    <div class="table-product-head">
        <article class="table-product-item">Nombre</article>
        <article class="table-product-item">Precio</article>
        <article class="table-product-item">Existencia</article>
        <article class="table-product-item"></article>
        <article class="table-product-item"></article>
    </div>
    <div>
        <?php
            $mostrar = new PorductosC();
            $mostrar -> MostrarProductosC();
        ?>
    </div>
    <?php
        $eliminar=new PorductosC();
        $eliminar -> BorrarProductosC()
    ?>
</div>