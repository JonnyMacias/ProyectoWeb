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
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
        
    </head>
    <body>
        <!--CODIGO DEL MENU -->
        <?php  include 'CodigoReutilizable/encabezado.php'?>
        
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
         <h2 class="container__title">Nuestros Productos</h2>

         <div class="card__container">
            <article>
               <!-- CARD PRODUCT -->
               <div class="card__product">
                  <img src="IMG/img_product/contenedores/c1.jpg" alt="image" class="card__img">
   
                  <div>
                     <h3 class="card__name">CONTENEDOR</h3>
                     <span class="card__price"></span>
                  </div>
               </div>

               <!-- POPUP MODAL -->
               <div class="modal">
                  <div class="modal__card">
                     <i class="ri-close-large-line modal__close"></i>

                     <img src="IMG/img_product/contenedores/c1.jpg" alt="image" class="modal__img">

                     <div>
                        <h3 class="modal__name">CONTENEDOR</h3>
                        <p class="modal__info">
                        Contenedores con tarima de madera o tarima de cartón, diseñados
                         tomando en cuenta las necesidades de conservación del producto y 
                         la ergonomía en su uso.
                        </p>
                        <span class="modal__price"></span>
                     </div>

                     <div class="modal__buttons">
                        <button class="modal__button modal__button-ghost">Buy Now</button>
                        <button class="modal__button">Add to Cart</button>
                     </div>
                  </div>
               </div>
            </article>

            <article>
               <!-- CARD PRODUCT -->
               <div class="card__product">
                  <img src="IMG/img_product/separadores/s4.jpg" alt="image" class="card__img">
   
                  <div>
                     <h3 class="card__name">SEPARADORES/REJILLAS</h3>
                     <span class="card__price">--</span>
                  </div>
               </div>

               <!-- POPUP MODAL -->
               <div class="modal">
                  <div class="modal__card">
                     <i class="ri-close-large-line modal__close"></i>

                     <img src="IMG/img_product/separadores/s4.jpg" alt="image" class="modal__img">

                     <div>
                        <h3 class="modal__name">SEPARADORES/REJILLAS</h3>
                        <p class="modal__info">
                        Diseñados de acuerdo a las dimensiones de las piezas, pueden llevar diferentes acabados 
                        de acuerdo a los requerimientos del envío.
                        </p>
                        <span class="modal__price">--</span>
                     </div>

                     <div class="modal__buttons">
                        <button class="modal__button modal__button-ghost">Buy Now</button>
                        <button class="modal__button">Add to Cart</button>
                     </div>
                  </div>
               </div>
            </article>

            <article>
               <!-- CARD PRODUCT -->
                <div class="card__product">
                   <img src="IMG/img_product/diseño/d2.jpg" alt="image" class="card__img">
    
                   <div>
                      <h3 class="card__name">DISEÑO INTERNO</h3>
                      <span class="card__price">$59</span>
                   </div>
                </div>

               <!-- POPUP MODAL -->
               <div class="modal">
                  <div class="modal__card">
                     <i class="ri-close-large-line modal__close"></i>

                     <img src="IMG/img_product/diseño/d2.jpg" alt="image" class="modal__img">

                     <div>
                        <h3 class="modal__name">DISEÑO INTERNO</h3>
                        <p class="modal__info">
                        Se pueden realizar los diseños internos más diversos, en diferentes resistencias 
                        y formas, con el propósito de inmovilizar la pieza asegurándose de que la integridad de
                         la pieza sea el principal objetivo.
                        </p>
                        <span class="modal__price">--</span>
                     </div>

                     <div class="modal__buttons">
                        <button class="modal__button modal__button-ghost">Buy Now</button>
                        <button class="modal__button">Add to Cart</button>
                     </div>
                  </div>
               </div>
            </article>

            <article>
               <!-- CARD PRODUCT -->
                <div class="card__product">
                   <img src="IMG/img_product/troqueladas/t2.jpg" alt="image" class="card__img">
    
                   <div>
                      <h3 class="card__name">TROQUELEADAS</h3>
                      <span class="card__price">$--</span>
                   </div>
                </div>

               <!-- POPUP MODAL -->
               <div class="modal">
                  <div class="modal__card">
                     <i class="ri-close-large-line modal__close"></i>

                     <img src="IMG/img_product/troqueladas/t2.jpg" alt="image" class="modal__img">

                     <div>
                        <h3 class="modal__name">TROQUELEADAS</h3>
                        <p class="modal__info">
                        Cajas troqueladas con diseños específicos de 
                        acuerdo a necesidades de producto.
                        </p>
                        <span class="modal__price">$--</span>
                     </div>

                     <div class="modal__buttons">
                        <button class="modal__button modal__button-ghost">Buy Now</button>
                        <button class="modal__button">Add to Cart</button>
                     </div>
                  </div>
               </div>
            </article>

            <article>
               <!-- CARD PRODUCT -->
                <div class="card__product">
                   <img src="IMG/img_product/cartonm/cm2.jpg" alt="image" class="card__img">
    
                   <div>
                      <h3 class="card__name">CARTÓN CON MICHELMAN</h3>
                      <span class="card__price">$--</span>
                   </div>
                </div>

               <!-- POPUP MODAL -->
               <div class="modal">
                  <div class="modal__card">
                     <i class="ri-close-large-line modal__close"></i>

                     <img src="IMG/img_product/cartonm/cm2.jpg" alt="image" class="modal__img">

                     <div>
                        <h3 class="modal__name">CARTÓN CON MICHELMAN</h3>
                        <p class="modal__info">
                            Uso: El michelman es un recubrimiento que actúa 
                            como retardante a la humedad
                        </p>
                        <span class="modal__price">$--</span>
                     </div>

                     <div class="modal__buttons">
                        <button class="modal__button modal__button-ghost">Buy Now</button>
                        <button class="modal__button">Add to Cart</button>
                     </div>
                  </div>
               </div>
            </article>

            <article>
               <!-- CARD PRODUCT -->
                <div class="card__product">
                   <img src="IMG/img_product/plastico/p3.jpg" alt="image" class="card__img">
    
                   <div>
                      <h3 class="card__name">PLÁSTICO CORRUGADO</h3>
                      <span class="card__price">$--</span>
                   </div>
                </div>

               <!-- POPUP MODAL -->
               <div class="modal">
                  <div class="modal__card">
                     <i class="ri-close-large-line modal__close"></i>

                     <img src="IMG/img_product/plastico/p3.jpg" alt="image" class="modal__img">

                     <div>
                        <h3 class="modal__name">PLÁSTICO CORRUGADO</h3>
                        <p class="modal__info">
                        Para empaques retornables se cuenta con el plástico corrugado en 
                        calibre desde 3 a 10mm y en diversos colores. Al cuál se le pueden 
                        colocar hole-hands y esquineros apilables según sea el caso.
                        </p>
                        <span class="modal__price">$--</span>
                     </div>

                     <div class="modal__buttons">
                        <button class="modal__button modal__button-ghost">Buy Now</button>
                        <button class="modal__button">Add to Cart</button>
                     </div>
                  </div>
               </div>
            </article>
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
        <?php  include 'CodigoReutilizable/piepagina.php'?>