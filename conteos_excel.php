<?php
header("Content-Type: application/vnd.ms-excel");header("content-disposition: attachment;filename=conteos.xls");
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
include('conectar.php');
$connect=Conectarse();
	?>
<style type="text/css">
<!--
.Estilo1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>

<table width="100%" border="1">
  <tr>
    <td colspan="9"><h2 align="center" class="Estilo1">Todos los conteos </h2></td>
  </tr>
  <tr>
    <td>Planilla</td>
	  <td>UPC</td>
	  <td>Descripcion</td>
    <td>Barra</td>
	<td>Fecha</td>
	<td>Usuario</td>
	<td>Tienda</td>
	<td>Zona</td>
  </tr>
  
<?

$queryc ="SELECT planilla,barra, fecha, usuario, conteo, b.nombre_pv nom_tienda, c.zona nom_zona from fi_conteos a, tiendas b, zonas c
WHERE a.bodega=b.num_tienda AND a.Zona=c.id_zona;";  
			 $resultc = mysqli_query($connect, $queryc);  
               while($rowc = mysqli_fetch_array($resultc))  {
    ///////////////////////////////////
require ('conexion_hana.php'); 
$CODIGO=$rowc["barra"];				   
$conn = odbc_connect("Driver=$driver;ServerNode=$host;Database=$db_name;", $username, $password, SQL_CUR_USE_ODBC);
if (!$conn)
{
    echo "Connection failed.\n";
    echo "ODBC error code: " . odbc_error() . ". Message: " . odbc_errormsg();
}
else
{
		
 $resultqa = odbc_exec($conn, "CALL $db_name.CCU_INV_DETALLE('$CODIGO')"); 
   
}						  
 while ($row = odbc_fetch_object($resultqa))
	{	
	
	$ItemCode= $row->ItemCode;
	 $ItemName= $row->ItemName;

 }
///////////////////////////////////
     ?>   <tr>
    <td><? echo  $rowc["planilla"];?></td>
    <td><? echo  "'".$ItemCode;?></td>
    <td><? echo  $ItemName;?></td>	
    <td><? echo  "'".$rowc["barra"];?></td>
	<td><? echo  $rowc["fecha"];?>
	<td><? echo  $rowc["usuario"];?>

	<td><? echo  $rowc["nom_tienda"];?>
	<td><? echo  $rowc["nom_zona"];?>
		<?  
  } 
  ?>
 </table>

