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
    <title>Añadir Producto</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/administrador.css">
</head>

<body>
  <?php
      include "../plantilla/cabeceradmin.php"
  ?>
      <div id="cuerpo">


      <b><h3>AÑADE UN PRODUCTO</h3></b>


 <div id="center" class="container">

   <?php
       $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
   if($connection->connect_errno){
       printf("ERROR AL INTENTAR CONECTARSE A LA BASE DE DATOS",$connection->connect_errno);
       exit();
   }
   if(!isset($_POST['envia'])){

   $consulta1="SELECT * FROM distribuidor";

        $result1=$connection->query($consulta1);
      echo "<form method='post' action='#' enctype='multipart/form-data'>";

      echo " <label>Nombre del  Distribuidor:</label>";
    echo "<select  name='coddistribuidor'>";
  while( $obj1 = $result1->fetch_object()){
    echo "<option value='$obj1->coddistribuidor'>$obj1->nombre</option>";
  }
  echo "</select><br>";
    echo " <label>Nombre del Producto:</label>";
    echo "<input type='text' name='nombre'  class='form-control style='width:50px'>";
    echo " <label>Descripcion:</label><br>";
    echo "<textarea name='descripcion' style='width: 500px; height: 150px;' ></textarea> <br>";
    echo " <label>Stock:</label>";
    echo "<select name='stock'>";
    for ($i=1; $i<=100; $i++)
    {
            echo  "<option value= $i;>";
            echo $i;
            echo "</option>";
    }
    echo "</select><br>";
    echo "<label>Elige la Imagen del Producto</label><br>";
    echo "<input type='file' name='imagen'><br>";
    echo " <label>Categoria:</label>";
    echo "<select  name='categoria'>";
    $consulta="SELECT DISTINCT categoria FROM producto";
        $result=$connection->query($consulta);
  while( $obj = $result->fetch_object()){
    echo "<option value='$obj->categoria'>$obj->categoria</option>";
  }
  echo "</select><br>";
      echo " <label>Precio del Producto:</label>";
      echo"<select name='precio'>";
      for ($i=10; $i<=100; $i++)
      {
              echo "<option value=$i>$i €</option>";
      }
      echo "</select><br>";
    echo " <label>Para quien es el producto (Mujer,Hombre,Niño):</label>";
    echo "<input type='text' name='sexo'  class='form-control style='width:1%'>";
    echo "<input type='submit' name='envia' class='btn btn-success' value='Enviar'>";
    echo "</form>";
}else{
$codproducto=$_POST['codproducto'];
$coddistribuidor=$_POST['coddistribuidor'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$stock=$_POST['stock'];
$dir_subida = '/var/www/html/proyecto/imagenes/';
$fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);
$imagen=$_FILES['imagen']['name'];
var_dump($_POST);
var_dump($_FILES);
$categoria=$_POST['categoria'];
$precio=$_POST['precio'];
$sexo=$_POST['sexo'];
if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}
$consulta_mysql2="INSERT INTO producto (codproducto,coddistribuidor,nombre,descripcion,stock,foto,categoria,precio,sexo)
VALUES  ( NULL,'$coddistribuidor','$nombre','$descripcion','$stock','$imagen','$categoria','$precio','$sexo')";
     if($connection->query($consulta_mysql2)==true){
   header('Location:producto.php');
  }else{
    echo $connection->error;
 }
}
        unset($connection);
?>

</div>
  </div>
</body>
</html>
