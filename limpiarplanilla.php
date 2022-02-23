<?
define('HOST_DB', 'localhost');  //Nombre del host, nomalmente localhost
define('USER_DB', 'root');       //Usuario de la bbdd
define('PASS_DB', '');           //Contraseña de la bbdd
define('NAME_DB', 'inv'); //Nombre de la bbdd
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB)
	or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS');
	mysql_select_db(NAME_DB)
	or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB);
$planilla_borrado = $_GET['planilla_borrado'];
if($_POST){
  $clave = $_POST['clave'];
	$conteo = 1;
  $planilla_borrado = $_POST['planilla_borrado'];
	
if ($clave == 'Inventarios_2020') {
	if ($conteo == 2) {
		$sql2 = "delete from fi_conteos_manual where planilla = $planilla_borrado and conteo = $conteo ";	  
	  $resultado2 = mysql_query($sql2); //Ejecución de 
	}
	if ($conteo == 1) {
	
$sql2 = "delete from fi_conteos where planilla = $planilla_borrado and conteo = $conteo ";	  
	  $resultado2 = mysql_query($sql2); //Ejecución de 
	}
	header("location:zonas.php");	
}
	
}

?>
<!DOCTYPE html>  
 <html>  
      <head> 
		  <title>SISUR Limpiar Planillas</title> 
<script>
	function alerta(){
    var opcion = confirm("La planilla ser\u00E1 borrada para el conteo indicado, recuerde que no podr\u00E1 recuperar los datos y debe tener la clave de borrado para realizar la operaci\u00F3n....\u00BFDesea Continuar?");
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
<form action="limpiarplanilla.php" method="post" name="form1" id="form1" autocomplete="off">

<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="50%" border="10" align="center">
  <tbody>
    <tr>
      <th colspan="2" scope="col">Limpiar Planilla</th>
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
	      
	      <input type="text" name="clave" id="clave">
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