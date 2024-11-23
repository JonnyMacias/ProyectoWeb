<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <title>Productos</title>
        <link rel="stylesheet" href="CSS/estilo_home.css">
        <link rel="stylesheet" href="CSS/estilos_inventario.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <header>
            <nav>
                <ul class="menu-horizontal">
                    <li><a href="home.php">Inicio</a></li>
                    <li><a href="inventario.php">Productos</a>
                    <ul class="menu-vertical">
                                <li  class="">
                                    <a href="#">Contenedores</a>
                                </li>
                                <li  class="">
                                    <a href="#">Troqueladas</a>
                                </li>
                                <li  class="">
                                    <a href="#">Caja Regular Ranurada</a>
                                </li>
                                <li  class="">
                                    <a href="#">Separadores / Rejillas</a>
                                </li>
                                <li  class="">
                                    <a href="#">Tarima de Cartón</a>
                                </li>
                                <li  class="">
                                    <a href="#">Tarima de Madera</a>
                                </li>
                                <li  class="">
                                    <a href="#">Cartón Plastificado</a>
                                </li>
                                <li  class="">
                                    <a href="#">Cartón Antiestático</a>
                                </li>
                                <li  class="">
                                    <a href="#">Cartón Milchelman</a>
                                </li>
                                <li  class="">
                                    <a href="#">Diseño Interno</a>
                                </li>
                                <li  class="">
                                    <a href="#">Plástico Corrugado</a>
                                </li>
                                <li  class="">
                                    <a href="#">Bolsas VCI</a>
                                </li>
                            </ul>

                </li>
                    <li><a href="#">Misión</a></li>
                    <li><a href="#">Visión</a></li>
                    <li><a href="#">Valores</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <div class="user-info">
                        <i class='bx bxs-user'></i>
                        <span><?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
                    </div>
                <?php else: ?>
                    <a href="login.php">Inicie sesión</a>
                <?php endif; ?>
            </nav>
        </header>
        
        <div class="encabezado-img">
            <img src="/IMG/LOGO_EDKENA.png">
            <h1>EDKENA</h1>
            <p>Encuentra los productos de la mejor calidad</p>
        </div>

        <div class="slider">
             <ul>
               <li><img src="IMG/img_product/contenedores/c1.jpg"></li>
               <li><img src="IMG/img_product/bolsa/b2.jpg"></li>
               <li><img src="IMG/img_product/cartona/ca2.jpg"></li>
               <li><img src="IMG/img_product/cartonm/cm1.jpg"></li>
               <li><img src="IMG/img_product/tarima/tc1.jpg"></li>
               <li><img src="IMG/img_product/separadores/s1.jpg"></li>
               <li><img src="IMG/img_product/tarimam/tm.jpg"></li>
               <li><img src="IMG/img_product/diseño/d1.jpg"></li>
               <li><img src="IMG/img_product/contenedores/c2.jpg"></li>
               <li><img src="IMG/img_product/bolsa/b1.jpg"></li>
               <li><img src="IMG/img_product/cartona/ca1.jpg"></li>
               <li><img src="IMG/img_product/cartonm/cm2.jpg"></li>
               <li><img src="IMG/img_product/tarima/tc2.jpg"></li>
               <li><img src="IMG/img_product/separadores/s2.jpg"></li>
               <li><img src="IMG/img_product/tarimam/tm.jpg"></li>
               <li><img src="IMG/img_product/diseño/d2.jpg"></li>
            </ul>
        </div>

                <footer id="main-footer">
                    <div class="container">
                        <div id="footer-widgets" class="clearfix">
                            <div class="footer-widget">
                                <div id="text-3" class="fwidget et_pb_widget widget_text">
                                    <div class="textwidget">
                                        <p>© 2024 Packaging Store de México S.A. de C.V.</p>
                                        <p>
                                            <a href="https://packagingstoremexico.com/aviso-de-privacidad/">Aviso de Privacidad</a>
                                            | <a href="https://packagingstoremexico.com/derechos-arco/">Derechos ARCO</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-widget">
                                <div id="text-5" class="fwidget et_pb_widget widget_text">
                                    <h4 class="title">REDES SOCIALES</h4>
                                    <div class="textwidget">
                                        <p>
                                            <a href="https://www.linkedin.com/company/packaging-store-de-m%C3%A9xico-s.a.-de-c.v./">
                                                <img loading="lazy" decoding="async" class="aligncenter size-full wp-image-1020" src="https://packagingstoremexico.com/wp-content/uploads/2021/04/LinkedIn-icono-bco.png" alt="LINKEDIN PACKAGING STORE MÉXICO" width="50" height="50"/>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-widget">
                                <div id="nav_menu-5" class="fwidget et_pb_widget widget_nav_menu">
                                    <h4 class="title">Accesos Rápidos</h4>
                                    <div class="menu-menu-footer-container">
                                        <ul id="menu-menu-footer" class="menu">
                                            <li id="menu-item-649" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-649">
                                                <a href="https://packagingstoremexico.com/contacto/">Contacto</a>
                                            </li>
                                            <li id="menu-item-651" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-651">
                                                <a href="https://packagingstoremexico.com/infraestructura/">Infraestructura</a>
                                            </li>
                                            <li id="menu-item-652" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-652">
                                                <a href="https://packagingstoremexico.com/iso/">ISO</a>
                                            </li>
                                            <li id="menu-item-1075" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1075">
                                                <a href="https://packagingstoremexico.com/empresa-socialmente-responsable/">Empresa Socialmente Responsable</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="footer-bottom">
                        <div class="container clearfix">
                            <ul class="et-social-icons"></ul>
                        </div>
                    </div>
                </footer>
            </div>
    </body>
</html>
