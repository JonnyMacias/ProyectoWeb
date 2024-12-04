<?php
include 'conexion.php';

$nombre_producto = $_POST['nombre_producto'];
$descripcion = $_POST['descripcion'];
$precio_unitario = $_POST['precio_unitario'];
$stock = $_POST['stock'];
$imagen = $_POST['imagen'];
$id_proveedor = $_POST['id_proveedor'];

$sql = "INSERT INTO Productos (nombre_producto, descripcion, precio_unitario, stock, imagen, id_proveedor) 
        VALUES ('$nombre_producto', '$descripcion', '$precio_unitario', '$stock', '$imagen', '$id_proveedor')";

if ($conn->query($sql) === TRUE) {
    echo "Producto agregado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

