<?php
include 'conexion.php';

$action = $_POST['action'];

if ($action === 'delete') {
    $id_cliente = intval($_POST['id']);
    $sql = "DELETE FROM Clientes WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_cliente);

    if ($stmt->execute()) {
        echo "Cliente eliminado con éxito.";
    } else {
        echo "Error al eliminar el cliente.";
    }
    $stmt->close();
} elseif ($action === 'edit') {
    $id_cliente = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE Clientes SET nombre = ?, apellido = ?, email = ?, telefono = ?, direccion = ? WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nombre, $apellido, $email, $telefono, $direccion, $id_cliente);

    if ($stmt->execute()) {
        echo "Cliente actualizado con éxito.";
    } else {
        echo "Error al actualizar el cliente.";
    }
    $stmt->close();
}

$conn->close();
?>
