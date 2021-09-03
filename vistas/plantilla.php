<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="vistas/css/style.css">
    <title>Productos</title>
</head>
<body class="wrapper">
    <div Class="site">
        <header class="header-page">
            <a href="index.php">
                <img class="header-page__logo" src="vistas/img/logo.png" alt="">
            </a>
            <?php include "modulos/hamburger.php"; ?>
            <?php include "modulos/menu.php"; ?>
        </header>
        <section>
            <?php
                $rutas = new RutasControlador();
                $rutas -> Rutas();
            ?>
        </section>

        <footer class="footer-page">
            <div class="footer-page__version">
                <p>Versión 1.8.0</p>
            </div>
        </footer>
    </div>
    <script src="vistas/js/main.js"></script>
</body>
</html>