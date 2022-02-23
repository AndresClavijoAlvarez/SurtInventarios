<?php
sleep(1);
//require_once'conexion.php';
  //  global Conectarse();


include('conectar.php');
$connect=Conectarse();


if($_REQUEST) {
    $cedula = $_REQUEST['cedula'];
    $sql="SELECT descripcion,barras FROM cat_productos WHERE barras = '$cedula'";
if ($result=mysqli_query($connect,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  //printf("Result set has %d rows.\n",$rowcount); mostrar resultado
 if($rowcount > 0)
        echo '<div id="Error">Cedula ya registrada</div>';
    else
        echo '<div id="Success">Disponible</div>';
}
  }



?>
