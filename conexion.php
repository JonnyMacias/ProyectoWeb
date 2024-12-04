<?php
// Datos de conexión
$host = "localhost";
$user = "root"; // Usuario de MySQL (por defecto en XAMPP)
$password = ""; // Contraseña (por defecto en XAMPP está vacía)
$dbname = "edkena";

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

?>

