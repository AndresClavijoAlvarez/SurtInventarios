<?
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
require ("aut_verifica.inc.php"); 
include('conectar.php');
$connect=Conectarse();
$aux_id_get1="x3245*ad98/725.840216";

 session_name($usuarios_sesion);
     // incia sessiones
    session_start();
	
$nombre=$_SESSION['nombre_pv'];
$usuario_nivel=$_SESSION['usuario'];
$num_tienda=$_SESSION['num_tienda'];
$conteo=$_SESSION['conteo'];
$usuario_id=$_SESSION['usuario_id'];
$usuario=$_SESSION['usuario_nombres']." ".$_SESSION['usuario_apellidos'];

$planilla = $_GET["planilla"];
$id_zona = $_GET["id_zona"];
$zona = $_GET["zona"];
$producto = $_GET["producto"];

$queryc ="SELECT MIN(id) id from fi_conteos 
WHERE planilla = $planilla AND barra  = $producto AND conteo = $conteo AND zona = $id_zona AND bodega=$num_tienda;";  
			 $resultc = mysqli_query($connect, $queryc);  
               while($rowc = mysqli_fetch_array($resultc))  {
    $id_producto = $rowc["id"];
          
  } 
  

$query= "DELETE from fi_conteos WHERE id =$id_producto;";

$result = mysqli_query($connect, $query); 

header ("Location: inv.php?id_planilla=$planilla$aux_id_get1$id_zona");

?>