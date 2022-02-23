<?
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
require ("aut_verifica.inc.php"); 
$nombre=$_SESSION['nombre_pv'];
$usuario_nivel=$_SESSION['usuario_nivel'];
$num_tienda=$_SESSION['num_tienda'];
$conteo=$_SESSION['conteo'];
$usuario=$_SESSION['usuario_nombres']." ".$_SESSION['usuario_apellidos'];
define('HOST_DB', 'localhost');  //Nombre del host, nomalmente localhost
define('USER_DB', 'root');       //Usuario de la bbdd
define('PASS_DB', '');           //Contraseña de la bbdd
define('NAME_DB', 'inv'); //Nombre de la bbdd
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB)
	or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS');
	mysql_select_db(NAME_DB)
	or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB);
////////////////////////////////////////////////
////////////////////////////////////////////////
$mysqli = new mysqli('localhost', 'root', '', 'inv');
$mysqli->set_charset("utf8");
$connect = mysqli_connect("localhost", "root", "", "inv");  
$sw_error=0;
$mysqli = new mysqli('localhost', 'root', '', 'inv');
$mysqli->set_charset("utf8");
$connect = mysqli_connect("localhost", "root", "", "inv");
////////////////////////////////////////////////
////////////////////////////////////////////////
if (!empty($_POST))
{
  $cierre_planilla = $_POST['cierre_planilla'];
  $zona_des = $_POST['zona_des'];
  $busqueda = $_POST['busqueda'];
	
$query ="SELECT
Max(fi_conteos.Id) as max
FROM
fi_conteos
WHERE
Barra = '$busqueda' and
Planilla = $cierre_planilla and
Zona = $zona_des and
Usuario = '$usuario' and 
Conteo = $conteo";  
 $result = mysqli_query($connect, $query);	  
while($row = mysqli_fetch_array($result)) 
	{
	$max=$row['max'];
}
	$sql2e = "delete from  
	fi_conteos
WHERE Conteo = $conteo and
	Planilla = $cierre_planilla
AND Bodega = $num_tienda and Zona = $zona_des and Barra = $busqueda and Id = $max";	
$resultado2e = mysql_query($sql2e); //Ejecución de 
/////////////////////////////////	
/////////////////////////////////
$aux_id_get1="x3245*ad98/725.840216";
	header("location:inv.php?id_planilla=".$cierre_planilla.$aux_id_get1.$zona_des);	
}
	


?>