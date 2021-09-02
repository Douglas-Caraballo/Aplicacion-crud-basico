<?php
    session_start();
    if(isset($_SESSION["super"]) || isset($_SESSION["admin"])){

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
        $eliminar=new PorductosC();
        $eliminar -> BorrarProductosC()
    ?>
</div>
<?php
    }else if(isset($_SESSION["user"])){
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
</div>
    <?php
        }else{
        header("location:index.php?ruta=ingreso");
        exit();
    }
