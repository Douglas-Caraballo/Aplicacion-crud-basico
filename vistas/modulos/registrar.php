<?php
    session_start();
    if(isset($_SESSION["super"]) || isset($_SESSION["admin"]) || isset($_SESSION["user"])){
?>

<div class="register">
    <h2>Registro de Producto</h2>

    <form class="register-form" method="post">

        <input type="text" placeholder="Nombre" name="nombreR" required>

		<input type="text" placeholder="Precio" name="precioR" required>

		<input type="text" placeholder="Existencia" name="existenciaR" required>

        <input type="date" placeholder="Fecha" name="fechaR" required>

        <select name="usuarioR" required>
                <option value="">Usuarios</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
        </select>

		<input class="submit" type="submit" value="Registrar">
    </form>

    <?php
        $registrar = new PorductosC();
        $registrar -> RegistrarProductoC();
    ?>
</div>
<?php
    }else{
        header("location:index.php?ruta=ingreso");
        exit();
    }