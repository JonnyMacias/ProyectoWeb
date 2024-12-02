<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="CSS/estilo_home.css">
        <link rel="stylesheet" href="CSS/estilos_inventario.css">
        <link rel="stylesheet" href="CSS/stilostarjetas.css">
        <link rel="stylesheet" href="CSS/estilo_menu.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
        <?php
 
include 'db.php';


?>
    </head>
    <body>

        <!--CODIGO DEL MENU -->
        <div class="icono-menu">
            <img src="../ProyectoWeb/IMG/lista.png" id="icono-menu">
        </div>

        <div class="cont-menu active" id="menu">
            <ul>
                <li><a href="#mis">Misión</a></li>
                <li><a href="vis">Visión</a></li>
                <li><a href="#">Valores</a></li>
                <li><a href="#">Contacto</a></li>
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
        
        <div class="encabezado-img">
            <img src="/IMG/LOGO_EDKENA.png">
            <h1>EDKENA</h1>
            <p>Tu creatividad, nuestras herramientas</p>
        </div><br><br>

        <div id="produ"><h1>PRODUCTOS</h1></div><br><br><br>
        <!--Codigo de las imagenes que se mueven -->
        <?php include 'CodigoReutilizable/imgProduct.php'?>



        <!--Aqui va el resto del codigo que quieres agregar en la pagina -->
        <section class="container">
        <?php
        $sentecia=$pdo->prepare("SELECT * FROM productos");
        $sentecia->execute();
        $listaProductos=$sentecia->fetchAll(PDO::FETCH_ASSOC);
        //print_r($listaProductos);
        
        ?>
         <h2 class="container__title">Nuestros Productos</h2>

         <div class="card__container">
         <?php  foreach ($listaProductos as $producto){?>
            <article>
               <!-- CARD PRODUCT -->
               <div class="card__product">
                  <img src="<?php echo $producto['imagen'];?>" alt="image" class="card__img">
   
                  <div>
                     <h3 class="card__name"><?php echo $producto['nombre'];?></h3>
                     <span class="card__price">$<?php echo $producto['precio'];?></span>
                  </div>
               </div>

               <!-- POPUP MODAL -->
               <div class="modal">
                  <div class="modal__card">
                     <i class="ri-close-large-line modal__close"></i>

                     <img src="<?php echo $producto['imagen'];?>" alt="image" class="modal__img">

                     <div>
                        <h3 class="modal__name"><?php echo $producto['nombre'];?></h3>
                        <p class="modal__info"><?php echo $producto['descripcion'];?></p>
                        <span class="modal__price">$<?php echo $producto['precio'];?></span>
                     </div>

                     <div class="modal__buttons">
                        <button class="modal__button modal__button-ghost">Buy Now</button>
                        <button class="modal__button">Add to Cart</button>
                     </div>
                  </div>
               </div>
            </article>
            <?php }  ?>
         </div>
      </section>

      <br><br><br><br><br>

      <div id="mis"><h1>Misión</h1></div>
      <div class="contenido">
    <p>Nuestra misión es proporcionar soluciones integrales de almacenamiento a empresas y
         hogares, con productos de alta calidad que optimizan el espacio y mejoran la organización.
        Nos comprometemos a ofrecer un servicio excepcional, enfocado en la sostenibilidad y en satisfacer
        las necesidades específicas de nuestros clientes, contribuyendo a un entorno más ordenado y eficiente. <br>
        Somos una empresa que DIOS ha Bendecido y que esta  capacitada en el diseño y manufactura de empaques  
        especializados, caracterizada por su alta vocación de servicio, en constante crecimiento, que provee 
        fuentes de trabajo, haciendo una diferencia en sus condiciones laborales.</p>
    <img src="IMG/MISION.jpg" alt="Imagen Representativa">
</div>
<br><br><br><br><br>

<div id="vis"><h1>Visión</h1></div>
      <div class="contenido">
      <img src="IMG/vision.jpg" alt="Imagen Representativa">
    <p>Ser el proveedor líder en soluciones de almacenamiento innovadoras y sostenibles, reconocido
        por nuestra calidad superior y compromiso con la satisfacción del cliente. Aspiramos a transformar
        la manera en que las empresas y hogares gestionan sus espacios, promoviendo una organización eficiente
         y un entorno más ordenado para todos. <br>Trascender siendo reconocidos como una de las empresas líderes 
         de empaques especializados a nivel internacional, con innovación, incorporando la tecnología, manteniendo 
         los sistemas de gestión de calidad y ambiental, obteniendo rentabilidad.</p>
    
</div>




        <!--CODIGO PIE DE PAGINA -->