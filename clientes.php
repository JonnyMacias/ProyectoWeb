<?php
session_start();

// Verifica si la sesión está activa
if (!isset($_SESSION['rol'])) {
    header('location: login.php');
    exit();
} else {
    // Permite acceso solo si el rol es 1 (Administrador) o 2 (Cliente)
    if ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 2) {
        header('location: login.php');
        exit();
    }
}

// Muestra información del usuario si la sesión está activa
/*if (isset($_SESSION['username'])) {
    echo "La sesión está activa. Usuario: " . htmlspecialchars($_SESSION['username']);
} else {
    echo "No hay sesión activa.";
}*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Clientes</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/estilo_clientes.css">
    <link rel="stylesheet" href="CSS/estilos_inventario.css">
</head>

<body>
    <div class="header">
        <div class="nav-links">
            <img id="LogoEDKENA" src="IMG/Edkena B.png" alt="LogoEDKENA" width="30">
            <a href="home.php">Productos</a>
            <a href="home.php#mis">Misión</a>
            <a href="home.php#vis">Visión</a>
            <a href="home.php#">Valores</a>
        </div>
        <div class="user-info">
        <div class="user-info">
                    <i class='bx bxs-user'></i>
                    <span><?php echo htmlspecialchars($_SESSION['username']); ?></span> <!-- Muestra el username -->
                </div>
            <form action="cerrar_sesion.php" method="POST">
                <button type="submit">Cerrar sesión</button>
            </form>
        </div>
    </div>

    <div class="container">
        <h1>CATÁLOGO CLIENTES</h1>
        <div class="search-bar">
            <input type="text" placeholder="Buscar Clientes...">
            <button>🔍</button>
            <button id="add-client-btn">+Agregar Cliente</button>

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID.</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="clientes-table">
                <?php
                include 'obtener_clientes.php';

                ?>
            </tbody>
        </table>
    </div>

    <!-- Ventana Modal Información del Cliente  -->
    <div class="VentanaModal" id="modal">
        <div class="contenidoModal">
            <h2>Detalles del Cliente</h2>
            <p id="client-details">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et, provident!</p>
            <div class="btn-cerrar">
                <button id="close-modal">Cerrar</button>
            </div>
        </div>
    </div>
    <!-- Ventana Modal para Agregar Cliente -->
    <div class="VentanaModal" id="add-client-modal">
        <div class="contenidoModal">
            <h2>Agregar Nuevo Cliente</h2>
            <form id="add-client-form">
                <label for="add-client-name">Nombre:</label>
                <input type="text" id="add-client-name" required>

                <label for="add-client-lastname">Apellido:</label>
                <input type="text" id="add-client-lastname" required>

                <label for="add-client-email">Correo Electrónico:</label>
                <input type="email" id="add-client-email">

                <label for="add-client-phone">Teléfono:</label>
                <input type="text" id="add-client-phone">

                <label for="add-client-address">Dirección:</label>
                <input type="text" id="add-client-address">

                <button type="submit">Guardar Cliente</button>
            </form>
            <div class="btn-cerrar">
                <button id="close-add-modal">Cerrar</button>
            </div>
        </div>
    </div>

    <script src="JS/clientes.js"></script>
</body>
        <!--CODIGO PIE DE PAGINA -->
        <?php include 'CodigoReutilizable/piepagina.php'?>

</html>