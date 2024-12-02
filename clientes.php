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
if (isset($_SESSION['username'])) {
    echo "La sesión está activa. Usuario: " . htmlspecialchars($_SESSION['username']);
} else {
    echo "No hay sesión activa.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Clientes</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/estilo_clientes.css">
    <style>
       
    </style>
</head>
<body>
    <div class="header">
        <div class="nav-links">
            <img id="LogoEDKENA" src="IMG/Edkena B.png" alt="LogoEDKENA" width="30">
            <a href="#">Productos</a>
            <a href="#">Misión</a>
            <a href="#">Visión</a>
            <a href="#">Valores</a>
        </div>
        <div class="user-info">
            <img src="user-icon.png" alt="User Icon" width="30">
            <span>Eduardo Ponce</span>
            <form action="cerrar_sesion.php" method="POST">
                <input type="submit" value="Cerrar sesion">
            </form>
        </div>
    </div>

    <div class="container">
        <h1>CATÁLOGO CLIENTES</h1>
        <div class="search-bar">
            <input type="text" placeholder="Buscar Clientes...">
            <button>🔍</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID.</th>
                    <th>Nombre</th>
                    <th>Ventas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Macias Ibarra Jonny</td>
                    <td>15</td>
                    <td class="actions">
                        <img src="icon-view.png" alt="Ver">
                        <img src="icon-edit.png" alt="Editar">
                        <img src="icon-delete.png" alt="Eliminar">
                    </td>
                </tr>
                <!-- Más filas pueden ser añadidas aquí -->
            </tbody>
        </table>
    </div>
</body>
</html>
