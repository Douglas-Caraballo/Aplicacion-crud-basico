<?php
    session_start();
    if(isset($_SESSION["super"])){

?>
<div class="register">
    <h2>Registro de Usuarios</h2>
        <form class="register-form" method="post">
            <label>Usuario</label>
            <input type="text" name="usuarioTR" required>

            <label>Contraseña</label>
            <input type="password" name="contraseñaTR" required>

            <label>Tipo de Usuario</label>
            <select name="permisoTR" required>
                <option value="1">Super Admin</option>
                <option value="2">Admin</option>
                <option value="3">Usuario</option>
            </select>
            <input class="submit" type="submit" value="Registrar">
            <?php
                $registroU= new UsuariosC();
                $registroU -> RegistrarUsuarioC();
            ?>
        </form>
</div>

<?php
    }else if(isset($_SESSION["admin"]) || isset($_SESSION["user"])){
        header("location:index.php?ruta=productos");
    }else{
        header("location:index.php?ruta=ingreso");
        exit();
    }
?>