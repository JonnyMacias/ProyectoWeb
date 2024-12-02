<?php

if (isset($_SESSION['username'])) {
    echo "La sesión está activa. Usuario: " . $_SESSION['username'];
} else {
    echo "No hay sesión activa.";
}
?>

<header>
            <nav>
            <ul class="menu-horizontal"> 
                    <li><a  href="home.php" style="color: white;"><img src="IMG/Edkena B.png" alt="Logo" class="logo">|</a></li>
                    <li><a href="#produ">Productos</a>
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
                    <li><a href="home.php#mis">Misión</a></li>
                    <li><a href="home.php#vis">Visión</a></li>
                    <li><a href="#">Valores</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li>
                        <?php if (isset($_SESSION['username'])): ?>
                            <div class="user-info">
                                <i class='bx bxs-user'></i>
                                <span><?php echo htmlspecialchars($_SESSION['username']); ?></span> <!-- Muestra el username -->
                            </div>
                            <form action="cerrar_sesion.php" method="POST">
                                
                            </form>
                        <?php else: ?>
                            <a href="login.php">
                                <img src="IMG/usuario.png" alt="Icono de usuario" style="width: 50px; height: 50px; vertical-align: middle;">
                                Inicie sesión
                            </a>
                            <form action="cerrar_sesion.php" method="POST">
                                
                            </form>
                        <?php endif; ?>
                    </li>

                </ul>
                
            </nav>
        </header>