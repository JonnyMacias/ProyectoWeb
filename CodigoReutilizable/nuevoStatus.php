<?php

$servername = "mano.cjkioe6eoc42.us-east-1.rds.amazonaws.com:3306";
$username = "root";
$password = "3Hermanos*";
$database = "edkena";



$conn = new mysqli($servername, $username, $password, $database);


$id_venta = $_GET['id_venta'];  // Suponiendo que recibes el id_venta a través de GET o POST
$nuevo_estado = 1;  // El nuevo valor para el campo 'estado' (0 o 1, dependiendo de tu lógica)

$sql = "UPDATE Ventas SET estado = ? WHERE id_venta = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $nuevo_estado, $id_venta);  // "ii" indica que ambos parámetros son enteros
$stmt->execute();

if ($stmt->affected_rows > 0) {
} else {
    echo "No se pudo actualizar el estado.";
}
?>