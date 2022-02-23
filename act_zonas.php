<?
define('HOST_DB', 'localhost');  //Nombre del host, nomalmente localhost
define('USER_DB', 'root');       //Usuario de la bbdd
define('PASS_DB', '');           //Contraseña de la bbdd
define('NAME_DB', 'inv'); //Nombre de la bbdd
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB)
	or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS');
	mysql_select_db(NAME_DB)
	or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB);
$id_zona = $_GET['id'];
if($_POST){
  $clave = $_POST['clave'];
  $hiddenField = $_POST['hiddenField'];
	
if ($clave == 'Inventarios_2020') {
$sql2 = "delete from zonas where id_zona = $hiddenField ";	  
	  $resultado2 = mysql_query($sql2); //Ejecución de 

	header("location:zonas.php");	
}
	
}

?>
<form action="act_zonas.php" method="post" name="form1" id="form1">

<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="50%" border="10" align="center">
  <tbody>
    <tr>
      <th colspan="2" scope="col">Borrar ZONA <? $sql_zonas_p = "select * from zonas where id_zona = $id_zona";
$resultado_zonas_p = mysql_query($sql_zonas_p); //Ejecución de la consulta
while($fila2 = mysql_fetch_assoc($resultado_zonas_p)){ 
              $registros2 = $fila2['zona'];
			 }
		  echo $registros2;
		  ?></th>
    </tr>
    <tr>
      <td>Clave de Borrado</td>
      <td><p>
       
        <input type="text" name="clave" id="clave">
        <input name="hiddenField" type="hidden" id="hiddenField" value="<?=$id_zona?>">
      </p></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><a href="act_zonas.php?id=<?=$id?>" style="text-align: right"><span style="text-align: center">
        <input name="image" type="image" onclick="return validaFecha( this.form );" src="images/btn_borrar.png" />
      </span></a></div></td>
    </tr>
  </tbody>
</table>
	</form>
