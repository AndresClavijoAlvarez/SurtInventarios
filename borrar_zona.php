<?
define('HOST_DB', 'localhost');  //Nombre del host, nomalmente localhost
define('USER_DB', 'root');       //Usuario de la bbdd
define('PASS_DB', '');           //Contraseña de la bbdd
define('NAME_DB', 'inv'); //Nombre de la bbdd
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB)
	or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS');
	mysql_select_db(NAME_DB)
	or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB);

  $clave = $_POST['clave'];
  $hiddenField = $_POST['hiddenField'];
	
if ($clave == 'x3245*ad98/725.') {
$sql2 = "delete from zonas where id_zona = $hiddenField ";	  
	  $resultado2 = mysql_query($sql2); //Ejecución de 

header("location:zonas.php");	
}

?>