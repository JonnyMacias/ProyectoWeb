
<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/estilo_pedidos.css">
    <link rel="stylesheet" href="CSS/estilo_clientes.css">
    <link rel="stylesheet" href="CSS/estilos_inventario.css">
    <link rel="stylesheet" href="CSS/estilo_menu.css">
    <?php
    // Conexión a la base de datos
    $servername = "mano.cjkioe6eoc42.us-east-1.rds.amazonaws.com:3306";
$username = "root";
$password = "3Hermanos*";
$database = "edkena";


    $conn = new mysqli($servername, $username, $password, $database);

    ?>
</head>

<body>
<div class="icono-menu">
            <img src="../ProyectoWeb/IMG/lista.png" id="icono-menu">
        </div>

        <div class="cont-menu active" id="menu">
            <ul>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="index2.php">Proveedores</a></li>
                <li><a href="inventario.php">Inventarios</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="Resumen_Ventas.php">Resumen Ventas</a></li>
                <li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <div class="user-info">
                            <i class='bx bxs-user'></i>
                            <span><?php echo htmlspecialchars($_SESSION['username']); ?></span> <!-- Muestra el username -->
                        </div>
                        <form action="cerrar_sesion.php" method="POST">
                            <button type="submit">Cerrar sesión</button>
                        </form>
                        <?php else: ?>
                            <a href="login.php">
                                <img src="IMG/usuario.png" alt="Icono de usuario" style="width: 50px; height: 50px; vertical-align: middle;">
                                Inicie sesión
                            </a>
                        <?php endif; ?>
                </li>                        
            </ul>
        </div>

        <script src="app.js"></script>
<div class="header">

    <div class="containe_pedidosr">
        <CEnter>
            <BR></BR>
            <h1>REGISTRO DE PEDIDOS</h1>
        </CEnter>

        <div class="conf_pedidos">
            <form class="search" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                <input type="text" placeholder="BUSACAR PEDIDOS" name="busqueda">
                <button type="submit"><img src="IMG/buscar.svg" alt=""></button>

            </form>
            <img src="IMG/img_Ventas/add.svg" alt="" class="agreagr" id="toggleButton">

        </div>

        <div class="tabla">
            <center>
                <table>
                    <tr class="tabla_header">
                        <td style="width: 10%;">Código</td>
                        <td style="width: 20%;">Cliente</td>
                        <td style="width: 20%;">Fecha</td>
                        <td style="width: 10%;">Total</td>
                        <td style="width: 5%;">Status</td>
                        <td style="width: 5%;">Finalizar</td>
                    </tr>
                    <?php
                    $busqueda = $_GET['busqueda'] ?? '';
                    $sql = "SELECT id_venta, id_cliente, fecha_venta, total_venta, estado FROM Ventas WHERE id_cliente LIKE ?";
                    $stmt = $conn->prepare($sql);
                    $likeBusqueda = "%" . $busqueda . "%";
                    $stmt->bind_param("s", $likeBusqueda);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr onclick='mostrarDetalle(" . $row['id_venta'] . ")'>";
                            echo "<td>" . $row['id_venta'] . "</td>";
                            echo "<td>" . $row['id_cliente'] . "</td>";
                            echo "<td>" . $row['fecha_venta'] . "</td>";
                            echo "<td>" . $row['total_venta'] . "</td>";
                            if ($row['estado'] == '0') {
                                echo "<td><img src='IMG/img_Ventas/camino.svg' alt=''></td>";
                                echo "<td onclick='setStatus(" . $row['id_venta'] . ")'> <img src='IMG/ok.svg' alt=''></td>";
                            } else {
                                echo "<td><img src='IMG/ok.svg' alt=''></td>";
                                echo "<td></td>";
                            }

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No se encontraron pedidos</td></tr>";
                    }
                    ?>
                </table>

                <div id="panelDetalle" style="display:none;">
                    <br><br>
                    <h3>Detalles de la Venta</h3>
                    <br><br>
                    <div class="contTable">
                        <table>
                            <tr>
                                <td style="width: 50%;">PRODUCTO</td>
                                <td style="width: 50%;">CANTIDAD</td>
                            </tr>
                        </table>


                        <table id="detalleContenido">


                        </table>
                    </div>
                    <!-- Aquí se mostrarán los detalles -->
                    <button onclick="cerrarPanel()">Cerrar</button>
                </div>
            </center>
        </div>

    </div>


    <div id="registerPanel" class="hidden">
        <div class="imagenRg">
            <img src="IMG/img_Ventas/carrito.png" alt="">
        </div>

        <div class="formulario">
            <a href="#" id="cerrar" onclick="cerrar()">X</a>
            <h2>AGREGAR NUEVO PEDIDO</h2>
            <form id="registerForm" action="CodigoReutilizable/listaPedidos.php" method="POST">
                <input type="text" name="idCliemte" placeholder="Id Cliente" autocomplete="off"><br><br><br>
                <h3>AGREGAR LISTA DE PRODUCTOS</h3><br>
                <div class="etiqueta">
                    <div id="contenedor">
                        <div class="cantidadP">
                            <input type="text" id="Producto" name="Producto[]" required placeholder="Producto" class="producto">
                            <input type="number" id="cantidad" name="cantidad[]" required placeholder="Cantidad" class="cantidad">
                        </div>
                    </div>
                    <img src="IMG/img_Ventas/mas.svg" alt="" id="agregarDiv">
                </div>
                <br><br>

                <center>
                    <div class="calTotal">
                        <label for="">$</label>
                        <input type="number" id="total" name="total" readonly>
                        <button id="calcularTotal">Calcular Total</button>
                    </div>


                </center>
                <center>
                    <button type="submit" class="boton">Registrar</button>
                </center>

            </form>


        </div>
    </div>


   
 
</body>

<?php include 'CodigoReutilizable/piepagina.php'?>
<script src="JS/script_Pedidos.js"></script>

</html>