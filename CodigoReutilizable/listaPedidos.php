<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambiar según el usuario
$password = "3Hermanos"; // Cambiar según la contraseña
$database = "app_web"; // Cambiar según el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idCliente = $_POST['idCliemte'];
    $productos = $_POST['Producto'];
    $cantidades = $_POST['cantidad'];
    $estado = 0;
    $total = $_POST['total'];

    // Inserción en la base de datos
    $sqlPedido = "INSERT INTO Ventas (id_cliente, total_venta, estado) VALUES ('$idCliente', '$total', '$estado')";
    if ($conn->query($sqlPedido) === TRUE) {
        $idPedido = $conn->insert_id; // ID del último pedido insertado

        foreach ($productos as $index => $producto) {
            echo "<script>
        console.log('$producto');
      </script>";
            $cantidad = $cantidades[$index];
            $sqlDetalle = "INSERT INTO prod_vendido (id_venta, id_producto, cantidad) VALUES ('$idPedido', '$producto', '$cantidad')";
            $conn->query($sqlDetalle);
        }
        $conn->close();
        echo "<script>
        alert('Registro realizado con éxito');
        window.location.href = '../pedidos.php';
      </script>";
        exit();
    } else {
        echo "Error: " . $sqlPedido . "<br>" . $conn->error;
    }
}

$conn->close();
?>
