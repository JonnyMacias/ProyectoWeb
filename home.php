<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="CSS/estilo_home.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <header>
            <nav>
            <ul class="menu-horizontal">
                    <li><a href="home.php">Inicio</a></li>
                    <li><a href="inventario.php">Productos</a>
                    <ul class="menu-vertical">
                                <li  class="">
                                    <a href="#">Contenedores</a>
                                </li>
                                <li  class="">
                                    <a href="#">Troqueladas</a>
                                </li>
                                <li  class="">
                                    <a href="#">Caja Regular Ranurada</a>
                                </li>
                                <li  class="">
                                    <a href="#">Separadores / Rejillas</a>
                                </li>
                                <li  class="">
                                    <a href="#">Tarima de Cartón</a>
                                </li>
                                <li  class="">
                                    <a href="#">Tarima de Madera</a>
                                </li>
                                <li  class="">
                                    <a href="#">Cartón Plastificado</a>
                                </li>
                                <li  class="">
                                    <a href="#">Cartón Antiestático</a>
                                </li>
                                <li  class="">
                                    <a href="#">Cartón Milchelman</a>
                                </li>
                                <li  class="">
                                    <a href="#">Diseño Interno</a>
                                </li>
                                <li  class="">
                                    <a href="#">Plástico Corrugado</a>
                                </li>
                                <li  class="">
                                    <a href="#">Bolsas VCI</a>
                                </li>
                            </ul>

                </li>
                    <li><a href="#">Misión</a></li>
                    <li><a href="#">Visión</a></li>
                    <li><a href="#">Valores</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <div class="user-info">
                        <i class='bx bxs-user'></i>
                        <span><?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
                    </div>
                <?php else: ?>
                    <a href="login.php">Inicie sesión</a>
                <?php endif; ?>
            </nav>
        </header>
        
        <div class="encabezado-img">
            <img src="/IMG/LOGO_EDKENA.png">
            <h1>EDKENA</h1>
            <p>Tu creatividad, nuestras herramientas</p>
        </div>
    </body>
</html>