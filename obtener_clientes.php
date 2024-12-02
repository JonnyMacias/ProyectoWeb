<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluir archivo de conexión
include 'conexion.php';

// Consulta para obtener los datos de la tabla Clientes
$sql = "SELECT id_cliente, CONCAT(nombre, ' ', apellido) AS nombre_completo, email, telefono FROM Clientes";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Generar filas dinámicamente
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_cliente'] . "</td>";
        echo "<td>" . $row['nombre_completo'] . "</td>";
        echo "<td>" . $row['email'] . " / " . $row['telefono'] . "</td>";
        echo "<td>
                <button class='open-modal' data-action='view' data-client='" . $row['nombre_completo'] . "'>Ver</button>
                <button class='open-modal' data-action='edit' data-id='" . $row['id_cliente'] . "'>Editar</button>
                <button class='open-modal' data-action='delete' data-id='" . $row['id_cliente'] . "'>Eliminar</button>
              </td>";
        echo "</tr>";
    }
} else {
    // Si no hay resultados
    echo "<tr><td colspan='4'>No se encontraron clientes.</td></tr>";
}

// Cerrar conexión
$conn->close();
?>

