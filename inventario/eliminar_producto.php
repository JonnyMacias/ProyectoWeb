<?php
include 'conexion.php';

$id_producto = $_POST['id_producto'];

$sql = "DELETE FROM Productos WHERE id_producto = '$id_producto'";

if ($conn->query($sql) === TRUE) {
    echo "Producto eliminado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
