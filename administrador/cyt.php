<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php

    include "../plantilla/sesionadmin.php"
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COLORES Y TALLAS</title>
      <link rel="stylesheet" href="../css/administrador.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
      <?php
          include "../plantilla/cabeceradmin.php"
      ?>

      <?php

        //CREATING THE CONNECTION
            $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */
        $connection->set_charset("utf8");
        if ($result = $connection->query("SELECT * FROM producto where categoria='chaquetas' and sexo ='mujer' ")) {

          ?>

    <div class="container">

              <!-- PRINT THE TABLE AND THE HEADER -->
              <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
              <thead>
                <tr >
                  <th class="info"  colspan="2">
                  <center>
                    <b> CHAQUETAS DE MUJER</b>
                  </center>
                  </th>
                </tr>
                <tr class="info" >
                  <th>Nombre del Producto</th>
                  <th>Ver detalle</th>
                </tr>
              </thead>

          <?php

              //FETCHING OBJECTS FROM THE RESULT SET
              //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
              while($obj = $result->fetch_object()) {
                  //PRINTING EACH ROW
                  echo "<tr>";
                  echo "<td><b>".$obj->nombre."</b></td>";
                  echo "<td><center><a href='detallecolor.php?deta=$obj->codproducto'>
                  <button type='button' class='info'>Ver Detalles</button></a></center></td>";

                  echo "</tr>";
              }

              //Free the result. Avoid High Memory Usages


          } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT




//otra consulta PARA blusas///////

if ($result = $connection->query("SELECT * FROM producto where categoria='blusas' and sexo ='mujer' ")) {

  ?>

<div class="container">

      <!-- PRINT THE TABLE AND THE HEADER -->
      <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
      <thead>
        <tr >
          <th class="info"  colspan="2">
          <center>
            <b> BLUSAS DE MUJER</b>
          </center>
          </th>
        </tr>
        <tr class="info" >
          <th>Nombre del Producto</th>
          <th>Ver detalle</th>
        </tr>
      </thead>

  <?php

      //FETCHING OBJECTS FROM THE RESULT SET
      //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
          echo "<tr>";
          echo "<td><b>".$obj->nombre."</b></td>";
          echo "<td><center><a href='detallecolor.php?deta=$obj->codproducto'>
          <button type='button' class='info'>Ver Detalles</button></a></center></td>";

          echo "</tr>";
      }
    }



////////otra consulta PARA blusas///////

if ($result = $connection->query("SELECT * FROM producto where categoria='pantalones' and sexo ='mujer' ")) {

  ?>

<div class="container">

      <!-- PRINT THE TABLE AND THE HEADER -->
      <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
      <thead>
        <tr >
          <th class="info"  colspan="2">
          <center>
            <b>PANTALONES DE MUJER</b>
          </center>
          </th>
        </tr>
        <tr class="info" >
          <th>Nombre del Producto</th>
          <th>Ver detalle</th>
        </tr>
      </thead>

  <?php

      //FETCHING OBJECTS FROM THE RESULT SET
      //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
      while($obj = $result->fetch_object()) {
          //PRINTING EACH ROW
          echo "<tr>";
          echo "<td><b>".$obj->nombre."</b></td>";
          echo "<td><center><a href='detallecolor.php?deta=$obj->codproducto'>
          <button type='button' class='info'>Ver Detalles</button></a></center></td>";

          echo "</tr>";
      }


  }
  ////////otra consulta PARA blusas///////

  if ($result = $connection->query("SELECT * FROM producto where categoria='sudaderas' and sexo ='mujer' ")) {

    ?>

  <div class="container">

        <!-- PRINT THE TABLE AND THE HEADER -->
        <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
        <thead>
          <tr >
            <th class="info"  colspan="2">
            <center>
              <b>SUDADERA DE MUJER</b>
            </center>
            </th>
          </tr>
          <tr class="info" >
            <th>Nombre del Producto</th>
            <th>Ver detalle</th>
          </tr>
        </thead>

    <?php

        //FETCHING OBJECTS FROM THE RESULT SET
        //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
        while($obj = $result->fetch_object()) {
            //PRINTING EACH ROW
            echo "<tr>";
            echo "<td><b>".$obj->nombre."</b></td>";
            echo "<td><center><a href='detallecolor.php?deta=$obj->codproducto'>
            <button type='button' class='info'>Ver Detalles</button></a></center></td>";

            echo "</tr>";
        }


    }
    ////////otra consulta PARA blusas///////

    if ($result = $connection->query("SELECT * FROM producto where categoria='pantalones' and sexo ='hombre' ")) {

      ?>

    <div class="container">

          <!-- PRINT THE TABLE AND THE HEADER -->
          <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr >
              <th class="info"  colspan="2">
              <center>
                <b>PANTALONES DE HOMBRE</b>
              </center>
              </th>
            </tr>
            <tr class="info" >
              <th>Nombre del Producto</th>
              <th>Ver detalle</th>
            </tr>
          </thead>

      <?php

          //FETCHING OBJECTS FROM THE RESULT SET
          //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
          while($obj = $result->fetch_object()) {
              //PRINTING EACH ROW
              echo "<tr>";
              echo "<td><b>".$obj->nombre."</b></td>";
              echo "<td><center><a href='detallecolor.php?deta=$obj->codproducto'>
              <button type='button' class='info'>Ver Detalles</button></a></center></td>";

              echo "</tr>";
          }


      }
      ////////otra consulta PARA blusas///////

      if ($result = $connection->query("SELECT * FROM producto where categoria='chaquetas' and sexo ='hombre' ")) {

        ?>

      <div class="container">

            <!-- PRINT THE TABLE AND THE HEADER -->
            <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
            <thead>
              <tr >
                <th class="info"  colspan="2">
                <center>
                  <b>CHAQUETA DE HOMBRES</b>
                </center>
                </th>
              </tr>
              <tr class="info" >
                <th>Nombre del Producto</th>
                <th>Ver detalle</th>
              </tr>
            </thead>

        <?php

            //FETCHING OBJECTS FROM THE RESULT SET
            //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
            while($obj = $result->fetch_object()) {
                //PRINTING EACH ROW
                echo "<tr>";
                echo "<td><b>".$obj->nombre."</b></td>";
                echo "<td><center><a href='detallecolor.php?deta=$obj->codproducto'>
                <button type='button' class='info'>Ver Detalles</button></a></center></td>";

                echo "</tr>";
            }
            //Free the result. Avoid High Memory Usages
            $result->close();
            unset($obj);
            unset($connection);

        }

        ?>
        </div>
      </body>
      </html>
