<?php
session_start();

// Verifica si la sesión está activa
if (!isset($_SESSION['rol'])) {
    header('location: login.php');
    exit();
} else {
    // Permite acceso solo si el rol es 1 (Administrador) o 2 (Cliente)
    if ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 4) {
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
        <meta name="viewport" content="width=, initial-scale=1.0">
        <title>Productos</title>
        <link rel="stylesheet" href="CSS/estilo_home.css">
        <link rel="stylesheet" href="CSS/estilos_inventario.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
    <?php  include 'CodigoReutilizable/encabezado.php'?>
        
        <div class="encabezado-img">
            <img src="/IMG/LOGO_EDKENA.png">
            <h1>EDKENA</h1>
            <p>Encuentra los productos de la mejor calidad</p>
        </div>
        <!--CODIGO DEL MENU -->
          <?php include 'CodigoReutilizable/imgProduct.php'?>

          <!--Aqui va el resto del codigo que quieres agregar en la pagina -->

          

         <!--CODIGO PIE DE PAGINA -->
          <?php  include 'CodigoReutilizable/piepagina.php'?>
        


