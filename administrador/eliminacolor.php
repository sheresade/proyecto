<?php
    include "../plantilla/sesionadmin.php"
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar color y tallas</title>

    <script src=""></script>
</head>

<body>


   <?php

    $connection = new mysqli("localhost","root","carolyne","tienda");

      if ($connection->connect_errno) {
          printf("ERROR AL ESTABLECER CONTACTO CON LA BASE DE DATOS", $connection->connect_errno);
          exit();
      }

   $id = $_POST['producto'];
   $color = $_POST['color'];



   $consulta="DELETE FROM colorproducto WHERE codproducto=$id and idcolor=$color";

   $connection->query($consulta);


      unset($connection);
      header("Location:cyt.php");



   ?>


</body>
</html>
