<?php
// Datos de conexión
$host = "mano.cjkioe6eoc42.us-east-1.rds.amazonaws.com:3306";
$user = "root"; // Usuario de MySQL (por defecto en XAMPP)
$password = "3Hermanos*"; // Contraseña (por defecto en XAMPP está vacía)
$dbname = "edkena";

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

?>

