<?php
include 'conexion.php';

$id_producto = $_POST['id_producto'];
$nombre_producto = $_POST['nombre_producto'];
$descripcion = $_POST['descripcion'];
$precio_unitario = $_POST['precio_unitario'];
$stock = $_POST['stock'];
$imagen = $_POST['imagen'];
$id_proveedor = $_POST['id_proveedor'];

$sql = "UPDATE Productos SET 
        nombre_producto = '$nombre_producto', 
        descripcion = '$descripcion', 
        precio_unitario = '$precio_unitario', 
        stock = '$stock', 
        imagen = '$imagen', 
        id_proveedor = '$id_proveedor' 
        WHERE id_producto = '$id_producto'";

if ($conn->query($sql) === TRUE) {
    echo "Producto actualizado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
