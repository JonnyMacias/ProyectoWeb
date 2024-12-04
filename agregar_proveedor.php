<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edkena"; // Reemplaza con el nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Variable para manejar el mensaje de éxito o error
$mensaje = "";

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];

    // Sentencia SQL para insertar el proveedor
    $sql = "INSERT INTO Proveedores (nombre, contacto, telefono, email, direccion) 
            VALUES ('$nombre', '$contacto', '$telefono', '$email', '$direccion')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        $mensaje = "Nuevo proveedor agregado con éxito.";
        // Redirigir a la página de proveedores o mostrar un mensaje de éxito
        // header("Location: proveedores.html"); // Puedes redirigir a una página de listado de proveedores
    } else {
        $mensaje = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
            <div class="logo"></div>
            <nav>
                <ul>
                    <li><a href="home.php" class="mission-button">Productos</a></li>
                    <li><a href="home.php" class="mission-button">Misión</a></li>
                    <li><a href="home.php" class="mission-button">Visión</a></li>
                    <li><a href="home.php" class="mission-button">Valores</a></li>
                </ul>
            </nav>
            <div class="user">
                <span>Alexis Flores</span>
                <img src="user-icon.png" alt="Usuario">
            </div>
        </header>
        <aside>
            <div class="menu-header">
                <button class="hamburger-menu" id="menu-btn">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </button>
                <span class="menu-title">HOME</span>
            </div>
            <div class="menu-drawer" id="menu-drawer">
                <a href="clientes.php" class="menu-item">Catálogo Clientes</a>
                <a href="inventario.php" class="menu-item">Inventarios</a>
                <a href="index2.php" class="menu-item">Proveedores</a>
                <a href="ventas.html" class="menu-item">Registro Ventas</a>
                <button class="close-menu" id="close-btn">Cerrar</button>
            </div>
        </aside>

    <main>
        <div class="container">
            <h1>Formulario de Nuevo Proveedor</h1>

            <!-- Mensaje de éxito o error -->
            <?php if ($mensaje != ""): ?>
                <div class="mensaje">
                    <p><?php echo $mensaje; ?></p>
                </div>
            <?php endif; ?>

            <form action="agregar_proveedor.php" method="POST">
                <label for="nombre">Nombre del Proveedor:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="contacto">Contacto:</label>
                <input type="text" id="contacto" name="contacto">

                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email">

                <label for="direccion">Dirección:</label>
                <textarea id="direccion" name="direccion"></textarea>

                <button type="submit" class="submit-btn">Agregar Proveedor</button>
            </form>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>
