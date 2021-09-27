<?php
if(empty($_SESSION["super"]) && empty($_SESSION["admin"]) && empty($_SESSION["user"])){
    header("location:index.php?ruta=ingreso");
    exit();
}else if(isset($_SESSION["admin"])||isset($_SESSION["user"])){
    header("location:index.php?ruta=productos");
    exit();
}else{
?>
<div class="register">
    <h2>Asignar una imagen al Usuario</h2>
    <div class="register__content">

        <form class="register-form" method="post" enctype="multipart/form-data">

            <label> Usuarios </label>
            <select name="usuarioIR" required>
                <option value="0">Elija un usuario</option>
                <option value="1">admin</option>
                <option value="2">user</option>
                <option value="3">pjuan</option>
                <option value="4">mdelbarrio</option>
            </select>

            <label>Imagen</label>
            <input type="file" name="imagenIR">
            <input class="submit" type="submit" value="Cargar">
            <?php
                $registroI = new UsuariosC();
                $registroI -> RegistrarImagenC();
            ?>
        </form>

    </div>
</div>
<?php
}