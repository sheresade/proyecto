<?php
  include_once("../plantilla/db_configuration.php");
?>
<?php
    include "../plantilla/sesionadmin.php"
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../css/administrador.css">

    <title></title>
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
      if ($result = $connection->query("SELECT * FROM distribuidor;")) {



      ?>
    <div class="container">


          <!-- PRINT THE TABLE AND THE HEADER -->
          <table style="border:1px solid black" class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr class="info" >
              <th>Codigo de distribuidor</th>
              <th>Nombre</th>
              <th>Localidad</th>
              <th>Provincia</th>
              <th>CIF</th>
              <th>Editar</th>
              <th>Eliminar</th>


          </thead>

      <?php

          //FETCHING OBJECTS FROM THE RESULT SET
          //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
          while($obj = $result->fetch_object()) {
              //PRINTING EACH ROW
              echo "<tr>";
              echo "<td>".$obj->coddistribuidor."</td>";
              echo "<td>".$obj->nombre."</td>";
              echo "<td>".$obj->localidad."</td>";
              echo "<td>".$obj->provincia."</td>";
              echo "<td>".$obj->cif."</td>";
              echo "<td><center><a href='editardistribuidor.php?id=$obj->coddistribuidor'><button type='button' class='btn btn-info'>Editar</button></a></center></td>";
              echo "<td><center><a href='eliminardistribuidor.php?id=$obj->coddistribuidor'><button type='button' class='btn btn-danger'>Eliminar</button></a></center></td>";
              echo "</tr>";
          }

          //Free the result. Avoid High Memory Usages
          $result->close();
          unset($obj);
          unset($connection);

      } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

    ?>
    </div>
    <a href="agregadistribuidor.php"><button type='button' class='btn btn-success'>Añadir distribuidor</button></a>
    </body>
    </html>
