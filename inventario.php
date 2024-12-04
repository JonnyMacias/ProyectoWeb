
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="inventario/stilo.css">
    <link rel="stylesheet" href="CSS/estilo_home.css">


    <title>Inventario</title>

</head>
<body>
<?php  include 'CodigoReutilizable/encabezado.php'?>

  <div class="container mt-4 shadow-lg p-3 mb-5 bg-body rounded">
     <button id= "btnCrear" type="button" class="btn btn-primary" data-bs-toggle="modal" >Nuevo Producto</button>
      <table id="tablaClientes" class="table mt-2 table-bordered table-striped">
           <thead >
                <tr class="text-center">
                   <th>Codigo</th>
                   <th>Producto</th>
                   <th>Precio</th>
                   <th>Cantidad</th>
                   <th>Acciones</th>
                   </tr>
           </thead>
           <tbody>
           </tbody>
      </table>
  </div>

<div id= "modalProducto" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">PRODUCTO</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input id="nombre" type="text" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="descripcion" class="col-form-label">Descripcion:</label>
            <input id="descripcion" type="text" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="precio" class="col-form-label">Precio:</label>
            <input id="precio" type="number" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="stock" class="col-form-label">Cantidad:</label>
            <input id="stock" type="number" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="imagen" class="col-form-label">Imagen:</label>
            <input id="imagen" type="text" class="form-control" >
          </div>
          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <!-- JavaScript -->
     <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
     <script src="inventario/codiI.js"></script>
</body>
</html>
          
        


