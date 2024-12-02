<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro_web";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha pasado un ID por GET
if (isset($_GET['id'])) {
    $id_proveedor = $_GET['id'];

    // Consulta para eliminar el proveedor
    $sql = "DELETE FROM Proveedores WHERE id_proveedor = ?";
    
    // Preparar y ejecutar la consulta
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id_proveedor);
        
        if ($stmt->execute()) {
            echo "Proveedor eliminado con éxito.";
            // Redirigir de vuelta al listado de proveedores después de eliminar
            header("Location: index2.php");  // Cambia esto por la página de listado de proveedores
            exit;
        } else {
            echo "Error al eliminar el proveedor: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    echo "ID de proveedor no proporcionado.";
}

$conn->close();
?>
