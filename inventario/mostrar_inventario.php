<?php
include 'conexion.php'; // Tu archivo de conexión a la base de datos

$sql = "SELECT p.id_producto, p.nombre_producto, p.descripcion, p.precio_unitario, p.stock, 
        p.imagen, pr.nombre_proveedor, p.fecha_actualizacion
        FROM Productos p
        LEFT JOIN Proveedores pr ON p.id_proveedor = pr.id_proveedor";

$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
echo json_encode($data);
?>
