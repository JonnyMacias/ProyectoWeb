<?php
session_start();

// Verifica si la sesión está activa
if (!isset($_SESSION['rol'])) {
    header('location: login.php');
    exit();
} else {
    // Permite acceso solo si el rol es 1 (Administrador) o 2 (Cliente)
    if ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 3) {
        header('location: login.php');
        exit();
    }
}
?>

<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";  // Usuario de MySQL (por defecto en XAMPP es root)
$password = "";  // Contraseña de MySQL (por defecto en XAMPP es vacío)
$dbname = "edkena";  // Cambia esto por el nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Proveedores</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo"></div>
            <nav>
                <ul>
                    <li><a href="home.php" class="mission-button">Productos</a></li>
                    <li><a href="home.php#mis" class="mission-button">Misión</a></li>
                    <li><a href="home.php#vis" class="mission-button">Visión</a></li>
                    <li><a href="home.php" class="mission-button">Valores</a></li>
                </ul>
            </nav>
            <div class="user">
                <!-- Aquí va el icono de usuario -->
                <a href="login.php">
                    <img src="user-icon.png" alt="Iniciar sesión" class="user-icon">
                </a>
            </div>
            
        </header>

        <!--<aside>
            <div class="menu">
                <button class="menu-toggle">HOME</button>
                <div class="menu-content">
                    <a href="clientes.html" class="menu-item">Catálogo Clientes</a>
                    <a href="inventarios.html" class="menu-item">Inventarios</a>
                    <a href="proveedores.html" class="menu-item">Proveedores</a>
                    <a href="ventas.html" class="menu-item">Registro Ventas</a>
                </div>
            </div>
        </aside>-->
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
                <a href="inventarios.php" class="menu-item">Inventarios</a>
                <a href="index2.html" class="menu-item">Proveedores</a>
                <a href="ventas.html" class="menu-item">Registro Ventas</a>
                <button class="close-menu" id="close-btn">Cerrar</button>
            </div>
        </aside>
        
        
        
        <main>
            <h1>Catálogo de Proveedores</h1>
<!-- Botón de "Agregar Proveedor" -->
<div class="add-provider-button">
                <a href="agregar_proveedor.php" class="mission-button">Agregar Proveedor</a>
            </div>
            <!-- Formulario de búsqueda -->
<form method="GET" class="search-bar">
    <input type="text" name="search" placeholder="Buscar proveedor..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    <button type="submit">Buscar</button>
</form>

<!-- Mostrar los proveedores desde la base de datos -->
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Dirección</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Verificar si hay un término de búsqueda
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

        // Modificar la consulta SQL para incluir un filtro
        $sql = "SELECT id_proveedor, nombre, contacto, telefono, email, direccion FROM Proveedores";
        if ($searchTerm) {
            $sql .= " WHERE nombre LIKE '%" . $conn->real_escape_string($searchTerm) . "%' OR contacto LIKE '%" . $conn->real_escape_string($searchTerm) . "%'";
        }

        $result = $conn->query($sql);

        // Mostrar los resultados
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
        <td>" . $row["nombre"] . "</td>
        <td>" . $row["contacto"] . "</td>
        <td>" . $row["telefono"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["direccion"] . "</td>
        <td>
            <a href='editar_proveedor.php?id=" . $row["id_proveedor"] . "'>
                <img src='LAPIZ.JPG' alt='Editar' title='Editar' style='width: 20px; cursor: pointer;'>
            </a>
        </td>
      </tr>";

                      
            }
        } else {
            echo "<tr><td colspan='5'>No se encontraron proveedores.</td></tr>";
        }
        ?>
    </tbody>
</table>


        <!-- Mostrar los proveedores desde la base de datos -->
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody>
    <?php
    // Consultar la base de datos
    $sql = "SELECT id_proveedor, nombre, contacto, telefono, email, direccion FROM Proveedores";
    $result = $conn->query($sql);

    // Mostrar los resultados
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["nombre"] . "</td>
                    <td>" . $row["contacto"] . "</td>
                    <td>" . $row["telefono"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["direccion"] . "</td>
                    <td>
                        <a href='editar_proveedor.php?id=" . $row["id_proveedor"] . "'><img src='LAPIZ.JPG' alt='Editar' class='icon'></a>
                        <a href='borrar_proveedor.php?id=" . $row["id_proveedor"] . "' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este proveedor?\")'><img src='borrar.jpg' alt='Eliminar' class='icon'></a>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No hay proveedores registrados.</td></tr>";
    }
    ?>
</tbody>

        </table>
    </div>
    
    <script src="script.js"></script>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
