<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/estilo_Resumen_V.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="CSS/estilo_home.css">


    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root"; // Cambiar según el usuario
    $password = "3Hermanos"; // Cambiar según la contraseña
    $database = "app_web"; // Cambiar según el nombre de tu base de datos

    $conn = new mysqli($servername, $username, $password, $database);

    ?>
</head>

<body>
    <?php include 'CodigoReutilizable/encabezado.php' ?>
    <nav style=" margin: 0;; padding: 0; background-color: white; width: 100%; height: 100px;">

    </nav>
    <div class="containerRV">
        <div class="contIzquierdo">
            <img src="IMG/Edkena B.png" alt="LOGO">
            <h2>Estado de Ventas</h2>
            <form class="calendario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                <input type="number" id="anio" name="anio" min="2000" max="2100" required>
                <button type="submit" id="boton"><img src="IMG/buscar.svg" alt=""></button>
            </form>

        </div>

        <div class="contDerecho">
            <div class="container_grafica">
                <CEnter>
                    <h2>GRAFIA DE HSITORIAL DE VENTAS</h2>
                </CEnter>
                <canvas id="lineChart"></canvas>

            </div>
            <div class="container_datos">
                <div class="container_datos_iz">
                    <div class="item_Info">
                        <h2>GANANCIAS DEL AÑO</h2>
                        <img src="IMG/img_Ventas/iconGanancias.svg" alt="">
                        <h3 id="ganancias">$</h3>
                    </div>

                    <div class="item_Info">
                        <h2>VENTAS DEL AÑO</h2>
                        <img src="IMG/img_Ventas/IconVentas.svg" alt="">
                        <h3 id="ventas"></h3>
                    </div>
                    <div class="item_Info">
                        <h2>NUMERO DE CLIENTES</h2>
                        <img src="IMG/img_Ventas/clientes.svg" alt="">
                        <h3 id="clientes">500</h3>
                    </div>
                    <div class="item_Pedidos">
                        <img src="IMG/img_Ventas/iconCaja.svg" alt="">
                        <h3 id="">STATUS PEDIDOS</h3>
                        <ul>
                            <li><img src="IMG/ok.svg" alt=""> <span id ="fin"></span></li>
                            <li><img src="IMG/img_Ventas/chek.svg" alt=""> <span id="pros"></span></li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <footer style="background-color: black; height: 200px;">

    </footer>
</body>

<?php
// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener el año ingresado por el usuario
    $anio = $_GET['anio'] ?? '';

    // Validar que el año tenga un formato válido
    if (is_numeric($anio) && strlen($anio) === 4) {
        // Consulta para calcular promedio y conteo de ventas del año ingresado
        $sql = "SELECT 
                    COUNT(*) AS total_ventas,
                    AVG(total_venta) AS promedio_ventas
                FROM Ventas
                WHERE YEAR(fecha_venta) = ?";

        // Preparar la consulta para evitar inyecciones SQL
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $anio); // Asignar el parámetro del año
        $stmt->execute();

        // Obtener los resultados
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $sqlEstatus = "SELECT
                COUNT(CASE WHEN estado = 0 THEN 1 END) AS estatus_0,
                COUNT(CASE WHEN estado = 1 THEN 1 END) AS estatus_1
              FROM Ventas";

        $resultS = $conn->query($sqlEstatus);

        $estatus0 = 0;
        $estatus1 = 0;

        if ($resultS->num_rows > 0) {
            // Obtener el resultado
            $rowS = $resultS->fetch_assoc();
            $estatus0 = $rowS['estatus_0'];
            $estatus1 = $rowS['estatus_1'];

            echo "<script>
            const fin = document.getElementById('fin');
            const pros = document.getElementById('pros');
            fin.innerHTML = 'Fin: " . $estatus0 . "';
            pros.innerHTML = 'Proceso: " . $estatus1 . "';
            
                 </script>";
        }

        // Mostrar los resultados
        if ($row) {
            echo "<script>
            const gan = document.getElementById('ganancias');
            const ven = document.getElementById('ventas');
            
            gan.innerHTML = '$" . number_format($row['promedio_ventas'], 2) . "';
            ven.innerHTML = '" . $row['total_ventas'] . "';
            
                 </script>";
        } else {
            echo "No se encontraron resultados para el año $anio.";
        }

        $stmt->close();
    } else {
    }

    $sqlcliente = "SELECT COUNT(*) AS total_clientes FROM Clientes";
    $resultC = $conn->query($sqlcliente);

    if ($resultC->num_rows > 0) {
        // Obtener el resultado
        $rowC = $resultC->fetch_assoc();
        $totalClientes = $rowC['total_clientes'];

        // Mostrar el resultado con JavaScript
        echo "<script>
        const clientesElement = document.getElementById('clientes');
        clientesElement.innerHTML = $totalClientes;
    </script>";
    } else {
        echo "No se encontraron clientes.";
    }
}
?>


<?php
// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar las ventas por mes para el año ingresado
$anio = $_POST['anio'] ?? date('Y'); // Si no se proporciona un año, usa el año actual
$sqlVentas = "
    SELECT MONTH(fecha_venta) AS mes, SUM(total_venta) AS ventas
    FROM Ventas
    WHERE YEAR(fecha_venta) = $anio
    GROUP BY MONTH(fecha_venta)
    ORDER BY mes";

$resultV = $conn->query($sqlVentas);

$ventasPorMes = array_fill(0, 12, 0); // Inicializa un array de 12 meses con ventas 0

if ($resultV->num_rows > 0) {
    // Asigna las ventas por mes a los índices correspondientes
    while ($rowV = $resultV->fetch_assoc()) {
        $ventasPorMes[$rowV['mes'] - 1] = $rowV['ventas'];
    }
}

$conn->close();
?>

<script>
    // Pasar los datos PHP a JavaScript
    const ventasPorMes = <?php echo json_encode($ventasPorMes); ?>;

    // Selecciona el elemento canvas para la gráfica
    const ctx = document.getElementById('lineChart').getContext('2d');

    // Crea la gráfica de líneas con los datos de ventas del año
    const lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'], // Etiquetas de los meses
            datasets: [{
                label: 'VENTAS DEL AÑO',
                data: ventasPorMes, // Datos de ventas por mes
                borderColor: 'rgba(75, 192, 192, 1)', // Color de la línea
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color del área bajo la línea
                borderWidth: 2,
                fill: true // Rellena el área bajo la línea
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true // Inicia el eje Y desde cero
                }
            }
        }
    });
</script>


</html>