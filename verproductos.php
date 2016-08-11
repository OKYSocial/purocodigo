<?php
require_once 'ruta.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ver Producos</title>
  </head>
  <body>
    <h1>Mi lista de productos</h1>
    <div class="">
      <form method="GET">
          <input type="text" name="buscar" value="">
          <input type="submit" value="Buscar">
      </form>
    </div>

    <div class="">
      <?php
      if (isset($_GET['buscar'])) {
        buscar($_GET['buscar']);
      }else{
        cargar();
      }
       ?>
    </div>

     <a href="index.html"> Insertar Nuevos Producos</a>
  </body>
</html>
