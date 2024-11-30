<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/estilo_Resumen_V.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="CSS/estilo_home.css">
</head>
<body>
    <?php include 'CodigoReutilizable/encabezado.php'?>
    <nav style=" margin: 0;; padding: 0; background-color: white; width: 100%; height: 100px;">

    </nav>
    <div class="containerRV"> 
        <div class="contIzquierdo">
            <img src="IMG/Edkena B.png" alt="LOGO">
            <h2>Estado de Ventas</h2>
            <div class="calendario">
                <input type="date" id="calendar-input" class="calendar-button"> 
                <img src="IMG/buscar.svg" alt="">
            </div>

            <h3>GRAFICA DE VENTAS</h3>
            <canvas id="pieChart"></canvas>
        </div>  
        <div class="contDerecho">
            <div class="container_grafica">
                <CEnter><h2>GRAFIA DE HSITORIAL DE VENTAS</h2></CEnter>
                <canvas id="lineChart"></canvas>
                
            </div>
            <div class="container_datos">
                <div class="container_datos_iz">
                    <div class="item_Info">
                        <h2>GANANCIAS DEL AÑO</h2>
                        <img src="IMG/img_Ventas/iconGanancias.svg" alt="">
                        <h3>$456,00</h3>
                    </div>

                    <div class="item_Info">
                        <h2>VENTAS EL ULTIMO AÑO</h2>
                        <img src="IMG/img_Ventas/IconVentas.svg" alt="">
                        <h3>500</h3>
                    </div>
                    <div class="item_Info">
                        <h2>NUMERO DE CLIENTES</h2>
                        <img src="IMG/img_Ventas/clientes.svg" alt="">
                        <h3>500</h3>
                    </div>
                    <div class="item_Pedidos">
                        <img src="IMG/img_Ventas/iconCaja.svg" alt="">
                        <h3>STATUS PEDIDOS</h3>
                        <ul>
                            <li><img src="IMG/ok.svg" alt=""> En proceso 54</li>
                            <li><img src="IMG/img_Ventas/chek.svg" alt=""> En revision 54</li>
                            <li><img src="IMG/borrar.svg" alt=""> En devolucion 54</li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <footer style="background-color: black; height: 200px;">

    </footer>
</body>
<script src="JS/script_Resumen_V.js"></script>
</html>