<?php
session_start();
if(isset($_SESSION["super"]) || isset($_SESSION["admin"])){
?>

<div class="wrapper-reports">
    <div class="wrapper-reports__product">
        <h3>Reporte de Productos</h3>
        <a href="index.php?ruta=reporte-producto">Generar</a>
    </div>

    <div class="wrapper-reports__user">
        <h3>Reporte por usuarios</h3>
        <form class="wrapper-reports__user__form" method="post">
            <select name="idU">
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>
            <input class="wrapper-reports__user__form__submit" type="submit" value="Generar">

            <?php
                $reporteU= new PorductosC();
                $reporteU -> ReporteUsuariosC();
            ?>
        </form>
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