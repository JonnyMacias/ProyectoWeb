<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro_web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del proveedor
$id_proveedor = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar los datos del proveedor
$sql = "SELECT * FROM Proveedores WHERE id_proveedor = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_proveedor);
$stmt->execute();
$result = $stmt->get_result();
$proveedor = $result->fetch_assoc();

if (!$proveedor) {
    die("Proveedor no encontrado.");
}

// Actualizar los datos al enviar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE Proveedores SET nombre = ?, contacto = ?, telefono = ?, email = ?, direccion = ? WHERE id_proveedor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nombre, $contacto, $telefono, $email, $direccion, $id_proveedor);

    if ($stmt->execute()) {
        echo "<script>alert('Proveedor actualizado correctamente'); window.location.href='index2.php';</script>";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Proveedor</h1>
        <form method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($proveedor['nombre']); ?>" required>

            <label for="contacto">Contacto:</label>
            <input type="text" id="contacto" name="contacto" value="<?php echo htmlspecialchars($proveedor['contacto']); ?>">

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($proveedor['telefono']); ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($proveedor['email']); ?>">

            <label for="direccion">Dirección:</label>
            <textarea id="direccion" name="direccion"><?php echo htmlspecialchars($proveedor['direccion']); ?></textarea>

            <div class="form-buttons">
                <button type="submit" class="submit-btn">Guardar cambios</button>
                <a href="index2.php" class="cancel-btn">Cancelar</a>
            </div>
            <style>
    .form-buttons {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .cancel-btn {
        display: inline-block;
        background-color: #f4f4f4;
        color: #333;
        text-decoration: none;
        padding: 10px 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        text-align: center;
        transition: background-color 0.3s, color 0.3s;
    }

    .cancel-btn:hover {
        background-color: #ddd;
        color: #000;
    }
</style>

        </form>
    </div>
</body>
</html>
