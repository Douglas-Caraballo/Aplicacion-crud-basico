<?php
if(empty($_SESSION["super"]) && empty($_SESSION["admin"]) && empty($_SESSION["user"])){
    header("location:index.php?ruta=ingreso");
    exit();
}else{
?>
    <div class="register">
        <h2>usuarios</h2>
        <div class="search__content">
            <form class="register-form" method="post">
                <label> Nombre de usuario</label>
                <div class="register-form__search">
                    <input class="search" type="search" name="UsuarioB" required>
                    <input type="submit" value="Buscar">
                </div>
            </form>
            <?php
                $consultar = new UsuariosC();
                $consultar -> BuscarUsuariosC();
            ?>
        </div>
    </div>
<?php
}
?>