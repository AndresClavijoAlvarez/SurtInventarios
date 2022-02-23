<?php  
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
require ("aut_verifica.inc.php"); 
$nombre=$_SESSION['nombre_pv'];
$usuario_nivel=$_SESSION['usuario_nivel'];
$num_tienda=$_SESSION['num_tienda'];
$conteo=$_SESSION['conteo'];
 $connect = mysqli_connect("localhost", "root", "", "inv");  
 

	$zona_des= $_POST["zona_des"];
$cierre_planilla= $_POST["cierre_planilla"];
//echo $cierre_planilla;
echo $zona_des;
if ($conteo == 3) { 
				 
$connect->query("UPDATE fi_conteos SET estado = 2 WHERE Planilla = $cierre_planilla and Bodega =  $num_tienda and conteo = $conteo");
$result = mysqli_query($connect, $query);
////////////*////////////	
//$connect->query("delete from planilla_c3 WHERE planilla = $cierre_planilla and tienda =  $num_tienda");
//$result1 = mysqli_query($connect, $query1); 	
////////////////////////				   
				  }else {
	$connect->query("UPDATE fi_conteos SET estado = 2 WHERE Planilla = $cierre_planilla and Bodega =  $num_tienda and conteo = $conteo");
$result = mysqli_query($connect, $query);  
////////////////////////
	
}
	header("location:planillas.php?id=".$zona_des);	
	

?>		