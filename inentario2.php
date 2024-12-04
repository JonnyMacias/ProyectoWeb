<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";  // Usuario de MySQL (por defecto en XAMPP es root)
$password = "";  // Contraseña de MySQL (por defecto en XAMPP es vacío)
$dbname = "edkena";  // Cambia esto por el nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

    session_start();
?>