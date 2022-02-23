<?
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
require ("aut_verifica.inc.php"); 

 session_name($usuarios_sesion);
     // incia sessiones
    session_start();
	
$nombre=$_SESSION['nombre_pv'];
$usuario_nivel=$_SESSION['usuario'];
$num_tienda=$_SESSION['num_tienda'];
$conteo=$_SESSION['conteo'];
$usuario_id=$_SESSION['usuario_id'];
$usuario=$_SESSION['usuario_nombres']." ".$_SESSION['usuario_apellidos'];

include('conectar.php');
$connect=Conectarse();

$cadena = $_POST["id_planilla2"];
$planilla=$_POST["planilla2"];
$m_zona=$_POST["zona2"];
$producto=$_POST["producto"];
echo $_POST["planilla2"];

$queryc ="SELECT MIN(id) id from fi_conteos 
WHERE planilla = $planilla AND barra  = $producto AND conteo = $conteo AND zona = $m_zona AND bodega=$num_tienda;";  
			 $resultc = mysqli_query($connect, $queryc);  
               while($rowc = mysqli_fetch_array($resultc))  {
    $id_producto = $rowc["id"];
          
  } 
  

$query= "DELETE from fi_conteos WHERE id =$id_producto;";

$result = mysqli_query($connect, $query); 

//header ("Location: inv.php?zona2=$m_zona&planilla2=$planilla");

?>