<?php
$servername = "localhost";
$username = "root"; // Cambiar según el usuario
$password = "3Hermanos"; // Cambiar según la contraseña
$database = "app_web"; // Cambiar según el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $database);

$id_venta = $_GET['id_venta'] ?? '';

if ($id_venta) {
    $sql = "SELECT p.nombre_producto, pv.cantidad 
            FROM prod_vendido pv
            JOIN Productos p ON pv.id_producto = p.id_producto
            WHERE pv.id_venta = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_venta);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
       
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['nombre_producto']."</td>";
            echo "<td>".$row['cantidad']."</td>";
            echo "</tr>";
        }
       
    } else {
        echo "No se encontraron productos para esta venta.";
    }
} else {
    echo "ID de venta no proporcionado.";
}

$stmt->close();
$conn->close();
?>
