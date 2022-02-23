<?php
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
require ("aut_verifica.inc.php"); 

 session_name($usuarios_sesion);
     // incia sessiones
    session_start();
  

$mysqli = new mysqli('localhost', 'root', '', 'inv');
$mysqli->set_charset("utf8");
$connect = mysqli_connect("localhost", "root", "", "inv");  
$sw_error=0;
$mysqli = new mysqli('localhost', 'root', '', 'inv');
$mysqli->set_charset("utf8");
$connect = mysqli_connect("localhost", "root", "", "inv");

$nombre=$_SESSION['nombre_pv'];
$usuario_nivel=$_SESSION['usuario'];
$num_tienda=$_SESSION['num_tienda'];
$conteo=$_SESSION['conteo'];
$usuario_id=$_SESSION['usuario_id'];
$usuario=$_SESSION['usuario_nombres']." ".$_SESSION['usuario_apellidos'];
$InicioCarga=date("H-i-s");
$date =date('d/m/Y g:ia');

////////////////////
//$idq =$_POST["id_planilla"];
// $aux_id_get1="x3245*ad98/725.840216";
$cadena = $_POST["id_planilla2"];
$planilla=$_POST["planilla2"];
$m_zona=$_POST["zona2"];

echo  $planilla ;

// Primero definimos la conexión a la base de datos
define('HOST_DB', 'localhost');  //Nombre del host, nomalmente localhost
define('USER_DB', 'root');       //Usuario de la bbdd
define('PASS_DB', '');           //Contraseña de la bbdd
define('NAME_DB', 'inv'); //Nombre de la bbdd
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB)
	or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS');
	mysql_select_db(NAME_DB)
	or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB);
/////////////////////////////////////////
$sqlz = "SELECT zona FROM zonas WHERE id_zona = $m_zona";

	  $resultadoz = mysql_query($sqlz); //Ejecución de la consulta
      //Si hay resultados...

	     // Se recoge el número de resultados
		   while($filaz = mysql_fetch_assoc($resultadoz)){ 
             $n_zona = $filaz['zona'];
			 }	 

?>
<script>
		
	function validar1(form){
		//
		
		alert ("dddd");
		form.action = "control_elim_uni.php";  
/*
    var opcion = confirm("Se ELIMINARÁ el ultimo registro ingresado, ¿Desea continuar?");
    if (opcion == true) {
  var formulario = document.getElementById("cierre");
		formulario.action = "descontar_upc.php";  

		formulario.submit();
		return true;
	} else {
return false;
	}
		*/
	}	
	</script>
	<?
	if($_POST){
	
  $busqueda = $_POST['buscar'];
	$m_zona = $_POST['hzona'];
	$planilla = $_POST['hplanilla'];
/////////////////////////////////////////
$sqlz = "SELECT zona FROM zonas WHERE id_zona = $m_zona";
	  $resultadoz = mysql_query($sqlz); //Ejecución de la consulta
      //Si hay resultados...

	     // Se recoge el número de resultados
		   while($filaz = mysql_fetch_assoc($resultadoz)){ 
             $n_zona = $filaz['zona'];
			 }	 
/////////////////////////////////////////////////	
  $entero = 0;
  
  if (empty($busqueda)){
	  $ItemName = 'Búsqueda sin resultados';
  }else{
	  // Si hay información para buscar, abrimos la conexión
		  
	  //Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar
	  $sql = "SELECT descripcion,barras FROM cat_productos WHERE barras = $busqueda";

	  $resultado = mysql_query($sql); //Ejecución de la consulta
      //Si hay resultados...
	  if (mysql_num_rows($resultado) > 0){ 
	     // Se recoge el número de resultados
		   while($fila = mysql_fetch_assoc($resultado)){ 
             $ItemName .= $fila['descripcion'] . '<br />';
			   $ItemCode = $fila['barras'];
			 }
////////////////////////////
///////////////////////////

$query3zjp ="SELECT * FROM fi_conteos WHERE Planilla = $planilla and Zona = $m_zona and Conteo = 4 and Bodega = $num_tienda";  
 $result3zjp = mysqli_query($connect, $query3zjp);
while($row3zjp = mysqli_fetch_array($result3zjp)) 
	{	
$jpp=$row3zjp["Planilla"];	
}
	if (!empty($jpp)) {
$resa1 = $mysqli->query("delete from fi_conteos WHERE 	planilla = $planilla and zona = $m_zona and Bodega = $num_tienda and Conteo = 4"); 

	}
////////////////////////////
///////////////////////////		  

		
		
	  
	  }else{
			   $ItemName = "NO HAY RESULTADOS EN LA BBDD";	
	  }
	  // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
	  mysql_close($conexion);
  }

}
?>

 $sql = "SELECT descripcion,barras FROM cat_productos WHERE barras = $busqueda";

	  $resultado = mysql_query($sql)
	  
<script>
function validar1(form){
var campo
<?php
     $sql = "SELECT descripcion,barras FROM cat_productos WHERE barras = '$campo' ";

	  $resultado = mysql_query($sql); //Ejecución de la consulta
      //Si hay resultados...
	  if (mysql_num_rows($resultado) > 0){ 
	     // Se recoge el número de resultados
		   while($fila = mysql_fetch_assoc($resultado)){ 
             $ItemName .= $fila['descripcion'] . '<br />';
			   $ItemCode = $fila['barras'];
			 }
			 
			 
}?>
</script>
 

<!DOCTYPE html>
<html lang="es-ES">
<head>
<title>SISUR</title>
</head>
<body>
<p>
<div align="right">
  <?=$usuario?>
</div>
</span>
</p>
<div  align="center"> <strong>
        <H3><? echo $nombre?></H3>
        </strong> </div>
    </div>
	
<p>&nbsp;</p>
<table width="60%" border="2" align="center">
  <tbody>
    <tr>
      <td width="25%" align="center"><span style="font-size: xx-large; color: #FC0509; text-align: left;"><strong>Zona
        <?=$n_zona?>
        </strong></span></td>
      <td width="50%" align="center"><span style="font-size: xx-large; color: #FB0408;"><span style="color: #080DFC; font-size: xx-large;"><strong>CONTEO</strong><strong>
        <?=$_SESSION['conteo'] ?>
        </strong></span></td>
      <td width="25%" align="center"><span style="font-size: xx-large; color: #FB0408;"><strong>Planilla
        <?=$planilla ?>
        </strong></span></td>
    </tr>
    <tr>
      <td colspan="4" align="center"><div>
        <form  method="post" onSubmit="return validar(this)">
          <p><strong>Ingrese el código de barras a eliminar</strong></p>
          <p>
            <input name="producto" type="text">
            <span style="text-align: center"></span>
            <input name="planilla2" type="hidden" value="<?=$planilla?>"?>
            <input name="zona2" type="hidden" value="<?=$m_zona?>"?>
            
            
            
          </p>
          <p><input name="buscar" type="search" autofocus required="required" id="buscar" placeholder="Buscar aquí..." size="13" maxlength="13"  style="visibility:block"></p>
          <p>
            <label>
            <input type="submit" name="Submit" value="Enviar">
            </label>
          </p>
        </form></td>
    </tr>
    <tr>
      <td colspan="4" nowrap="nowrap"><font size=90 color="red">
        <h1 align="center"><strong>
          <?php 
// Resultado, número de registros y contenido.
echo $registros; 
?>
          </strong></h1>
        </font>
        <h1 align="center">
          <?php 
// Resultado, número de registros y contenido.
echo $ItemName; 
?>
        </h1>
        <p align="center">&nbsp;</p></td>
    </tr>
  </tbody>
</table>

<form id="buscador" name="buscador" method="post" action="" onSubmit="return checkSubmit();">
          <p>
            <input name="buscar" type="search" autofocus required="required" id="buscar" placeholder="Buscar aquí..." size="13" maxlength="13"  style="visibility:block">
            
          <span style="text-align: center"></span>
          <input name="hzona" type="hidden" id="hzona" value="<?=$m_zona?>">
		<input name="hplanilla" type="hidden" id="hplanilla" value="<?=$planilla?>">
          </p>
</form>
		

<p>&nbsp;</p>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {	
    $('#username').on('blur', function() {
        $('#result-username').html('<img src="images/loader.gif" />').fadeOut(1000);
 
        var username = $(this).val();		
        var dataString = 'username='+username;
 
        $.ajax({
            type: "POST",
            url: "check_username_availablity.php",
            data: dataString,
            success: function(data) {
                $('#result-username').fadeIn(1000).html(data);
            }
        });
    });              
});    
</script>
<p>&nbsp;</p>
</body>
</html>
<P>
<DIV align="center">
  <?
$FinCarga=date("H-i-s");
#la funcion SegundosDiferencia devuelve el numero de segundos entre dos horas.
$resultado=SegundosDiferencia($InicioCarga,$FinCarga);
 
#Mostramos los resultados.
echo "Ha tardado ".$resultado." segundos en cargar la pagina.";
 
?>
</DIV>
</P>
<script>
document.getElementById('buscar').style.display = 'block';
</script>
