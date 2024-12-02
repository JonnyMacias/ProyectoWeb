<?php
include 'conexion.php'; // Incluye el archivo de conexión

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

// Insertar datos en la base de datos
$query = "INSERT INTO clientes (nombre, apellido, email, telefono, direccion) 
          VALUES ('$nombre', '$apellido', '$email', '$telefono', '$direccion')";

if ($conn->query($query) === TRUE) {
    echo "Cliente agregado correctamente";
} else {
    echo "Error al agregar cliente: " . $conn->error;
}

$conn->close(); // Cierra la conexión
?>

