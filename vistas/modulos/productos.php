<?php
    ob_start();
    session_start();
    if(empty($_SESSION["super"]) && empty($_SESSION["admin"]) && empty($_SESSION["user"])){
        header("location:index.php?ruta=ingreso");
        exit();
    }else{
?>
<div class="product">
    <h2>lista de productos</h2>

    <div class="table-product-head">
        <article class="table-product-item item-head">Nombre</article>
        <article class="table-product-item item-head">Precio</article>
        <article class="table-product-item item-head">Existencia</article>
        <article class="table-product-item"></article>
        <article class="table-product-item"></article>
    </div>
    <div class="table-product-body">
        <?php
            $mostrar = new PorductosC();
            $mostrar -> MostrarProductosC();
        ?>
    </div>
    <?php
        if(isset($_SESSION["super"]) || isset($_SESSION["admin"])){
        $eliminar=new PorductosC();
        $eliminar -> BorrarProductosC();
        }
    ?>
</div>
<?php
    }
    ob_end_flush();
?>
