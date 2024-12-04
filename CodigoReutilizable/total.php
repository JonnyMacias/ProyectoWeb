<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambiar según el usuario
$password = "3Hermanos"; // Cambiar según la contraseña
$database = "app_web"; // Cambiar según el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Error de conexión']));
}

// Obtener los datos enviados desde JavaScript
$input = json_decode(file_get_contents('php://input'), true);
$nombreProducto = $input['nombreProducto'];
$cantidad = $input['cantidad'];

// Consulta para obtener el precio unitario
$sql = "SELECT precio_unitario FROM Productos WHERE id_producto = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $nombreProducto);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $precioUnitario = $row['precio_unitario'];
    $precioTotal = $precioUnitario * $cantidad;

    echo json_encode(['success' => true, 'precioTotal' => $precioTotal]);
} else {
    echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
}

$stmt->close();
$conn->close();
?>
