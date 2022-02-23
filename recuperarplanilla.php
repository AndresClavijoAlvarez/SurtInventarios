<?
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
require ("aut_verifica.inc.php"); 
$nombre=$_SESSION['nombre_pv'];
$usuario_nivel=$_SESSION['usuario_nivel'];
$num_tienda=$_SESSION['num_tienda'];
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
  $clave = $_POST['clave'];
  $zona = $_POST['zona'];
  $planilla_borrado = $_POST['planilla_borrado'];
	
$query ="SELECT id_zona FROM zonas where zona = $zona";  
 $result = mysqli_query($connect, $query); 	
 while($row = mysqli_fetch_array($result))   {  
	$id_zona=$row["id_zona"];	
 }

if ($clave == 'x3245*ad98/725.') {

	$sql2e = "delete from  
	fi_conteos
WHERE Conteo = 2 and
	Planilla = $planilla_borrado
AND Bodega = $num_tienda and Zona = $id_zona and Estado = 2";	
$resultado2e = mysql_query($sql2e); //Ejecución de 
/////////////////////////////////	
/////////////////////////////////
/////////////////////////////////
$connect->query("delete from planilla_c3 WHERE 	planilla = $planilla_borrado AND tienda = $num_tienda");
$result = mysqli_query($connect, $query);	
	
$sql2 = "update 
	fi_conteos
SET
Conteo = 2
WHERE
	Planilla = $planilla_borrado
AND conteo = 4 AND Bodega = $num_tienda and Zona = $id_zona and Estado =2";	  
	  $resultado2 = mysql_query($sql2); //Ejecución de 
	//header("location:zonas.php");	
}
	
}

?>
<!DOCTYPE html>  
 <html>  
      <head> 
		  <title>SISUR Recuperar Planilla</title> 
<script>
	function alerta(){
    var opcion = confirm("La planilla ser\u00E1 grabada como Conteo 1, recuerde que no podr\u00E1 recuperar los datos y debe tener la clave de borrado para realizar la operaci\u00F3n....\u00BFDesea Continuar?");
    if (opcion == true) {
  var formulario = document.getElementById("form1");
		formulario.submit();
		return true;
	} else {
return false;
	}
		
	}
		
	</script>
	 </head>
<form action="recuperarplanilla.php" method="post" name="form1" id="form1" autocomplete="off">

<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="50%" border="10" align="center">
  <tbody>
    <tr>
      <th colspan="2" scope="col">Recuperar Planilla</th>
    </tr>
    <tr>
      <td>Zona</td>
      <td><input name="zona" type="text" id="zona" size="10"></td>
    </tr>
    <tr>
      <td>Planilla</td>
      <td><p>
        <input name="planilla_borrado" type="text" id="planilla_borrado" size="10">
        </p></td>
    </tr>
	  <tr>
	    <td>Clave de Borrado</td>
	    <td><p>
	      
	      <input name="clave" type="text" id="clave">
        </p></td>
      </tr>
    <tr>
      <td colspan="2"><div align="center"><a href="borrar_zona.php?id=<?=$id?>" style="text-align: right"><span style="text-align: center">
        <input name="image" type="image" src="images/btn_borrar.png" onClick="return alerta();"/>
      </span></a></div></td>
    </tr>
  </tbody>
</table>
	</form>