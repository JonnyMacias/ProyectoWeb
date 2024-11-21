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
                <div class="nav-links">
                    <a href="#">Productos</a>
                    <a href="#">Misión</a>
                    <a href="#">Visión</a>
                    <a href="#">Valores</a>
                    <a href="#">Contacto</a>
                </div>
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