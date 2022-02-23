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
$idq =$_GET["id_planilla"];
 $aux_id_get1="x3245*ad98/725.840216";
$cadena = explode("x3245*ad98/725.840216",$idq);
$planilla=$cadena[0]; 
$m_zona=$cadena[1]; 

if ($m_zona==''){
$m_zona= $_GET["zona2"];
$planilla= $_GET["planilla2"];
}


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
			 
			
/////////////////////////////////////////////////
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
echo $usuario;
 $sql = "SELECT * from fi_conteos WHERE planilla = $planilla AND zona = $m_zona AND bodega=$num_tienda and Usuario <> '$usuario';";

	  $resultado = mysql_query($sql); //Ejecución de la consulta
      //Si hay resultados...
	  if (mysql_num_rows($resultado) > 0){ 
		  header ("Location: mensaje_planilla_iniciada.php?usuario=$usuario$aux_id_get1$planilla");

	  }else {
		
	
	$sql1 = "
	INSERT INTO fi_conteos (	
	Planilla,
	Barra,
	Fecha,
	Usuario,
	Estado,
	Bodega,
	Cantidad, 
	Conteo, Zona
)
VALUES
	(
		'$planilla',
		'$busqueda',
		NOW(),
		'$usuario',
		'1',
		'$num_tienda',
		'1',
		$conteo, $m_zona
		
	);
	";
		
 $resultado1 = mysql_query($sql1); 
 
 //Ejecución de la consulta
		  ////////////////////////
		 }
		  $sql2 = "SELECT
Count(fi_conteos.Id) AS conteo
FROM
fi_conteos
WHERE
fi_conteos.Planilla = '$planilla' and Bodega = $num_tienda and Conteo = $conteo";

	  $resultado2 = mysql_query($sql2); //Ejecución de la consulta
while($fila2 = mysql_fetch_assoc($resultado2)){ 
              $registros .= $fila2['conteo'] . '<br />';
			 }
		
	  
	  }else{
			   $ItemName = "NO HAY RESULTADOS EN LA BBDD";	
	  }
	  // Cerramos la conexión (por seguridad, no dejar conexiones abiertas)
	  mysql_close($conexion);
  }
}else {
$s = "SELECT
Count(fi_conteos.Id) AS conteo
FROM
fi_conteos
WHERE
fi_conteos.Planilla = $planilla and Bodega = $num_tienda and Conteo = $conteo";
	  
	  $resultado2a = mysql_query($s); //Ejecución de la consulta
while($fila2a = mysql_fetch_assoc($resultado2a)){ 
              $registros .= $fila2a['conteo'] . '<br />';
			 }	
}
function SegundosDiferencia($horaini,$horafin)
{
	$horai=substr($horaini,0,2);
	$mini=substr($horaini,3,2);
	$segi=substr($horaini,6,2);
 
	$horaf=substr($horafin,0,2);
	$minf=substr($horafin,3,2);
	$segf=substr($horafin,6,2);
 
	$ini=((($horai*60)*60)+($mini*60)+$segi);
	$fin=((($horaf*60)*60)+($minf*60)+$segf);
 
	$dif=$fin-$ini;
 
	return $dif;
}
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
        <title>SISUR</title>
	<script>
	function alerta(){
		

    var opcion = confirm("La planilla no podrá ser abierta de nuevo, ¿ desea continuar ?");
    if (opcion == true) {
  var formulario = document.getElementById("cierre");
		formulario.submit();
		return true;
	} else {
return false;
	}
		
	}
	function alerta2(){
		

    var opcion = confirm("Se ELIMINARÁ el ultimo registro ingresado, ¿Desea continuar?");
    if (opcion == true) {
  var formulario = document.getElementById("cierre");
		formulario.action = "descontar_upc.php";  

		formulario.submit();
		return true;
	} else {
return false;
	}
		
	}	
	</script>
   <style>
	a.btnAzul {
    display: block;
    width: 250px;
    height: 60px;
    padding: 25px 0 0 0;
    margin: 0 auto;
    
    background: #4682B4;
    background: -moz-linear-gradient(top, #87CEEB 0%, #4682B4 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#87CEEB), color-stop(100%,#4682B4));
 
    box-shadow: inset 0px 0px 6px #fff;
    -webkit-box-shadow: inset 0px 0px 6px #fff;
    border: 1px solid #62C2F9;
    border-radius: 10px;
 
    font: bold 25px Helvetica, Sans-Serif;
    text-align: center;
    text-transform: uppercase;
    text-decoration: none;
    color: #3090C7;
    text-shadow: 0px 1px 2px #62C2F9;
}
	   a.btnrojo {
    display: block;
    width: 250px;
    height: 60px;
    padding: 25px 0 0 0;
    margin: 0 auto;
    
    background: #F21013;
    background: -moz-linear-gradient(top, #F21013 0%, #F21013 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#F21013), color-stop(100%,#C5121B));
 
    box-shadow: inset 0px 0px 6px #fff;
    -webkit-box-shadow: inset 0px 0px 6px #fff;
    border: 1px solid #fff;
    border-radius: 10px;
 
    font: bold 25px Helvetica, Sans-Serif;
    text-align: center;
    text-transform: uppercase;
    text-decoration: none;
    color: #;
    text-shadow: 0px 1px 2px #fff;
}
	   <style>
#boton{display:none;}
.Estilo2 {
	color: #FF0000;
	font-size: 36px;
}
   </style>
	   
	</style>
	<script>
	var statSend = false;
function checkSubmit() {
    if (!statSend) {
        statSend = true;
        return true;
    } else {
        //alert("El formulario ya se esta enviando...");
        return false;
    }
}
	</script>
<script>
	function validar(form){
		
		form.action = "formulario_elim_uni.php";  
	}	
</script>
	
</head>
   
<body>

<p><div align="right">
  <?=$usuario?>
</div>
<table width="60%" border="2" align="center">
  <tbody>
  <tr>
      <td colspan="3" align="center"><div align="center" class="Estilo1">
        <h2><span class="Estilo2"><? echo $nombre?></span></h2>
      </div></td>
    </tr>
    <tr>
      <td width="25%" align="center"><span style="font-size: xx-large; color: #FC0509; text-align: left;"><strong>Zona
          <?=$n_zona?>
      </strong></span></td>
      <td width="50%" align="center"><span style="font-size: xx-large; color: #FB0408;"><span style="color: #080DFC; font-size: xx-large;"><strong>CONTEO</strong></span></td>
      <td width="25%" align="center"><span style="font-size: xx-large; color: #FB0408;"><strong>Planilla
          <?=$planilla ?>
      </strong></span></td>
     
    </tr>
    <tr>
      <td colspan="4" align="center"><div>
        <form id="buscador" name="buscador" method="post" action="" onSubmit="return checkSubmit();">
          <p>
            <input name="buscar" type="search" autofocus required="required" id="buscar" placeholder="Buscar aquí..." size="13" maxlength="13"  style="visibility:block">
            
          <span style="text-align: center"></span>
          <input name="hzona" type="hidden" id="hzona" value="<?=$m_zona?>">
		<input name="hplanilla" type="hidden" id="hplanilla" value="<?=$planilla?>">
          </p>
        </form>
      </td>
    </tr>
    <tr>
      <td colspan="4" nowrap="nowrap"><font size=90 color="red"> 
		  <h1 align="center"><strong>
	      <?php 
// Resultado, número de registros y contenido.
echo $registros; 
?></strong></h1>
	   </font>
	   
	   <h1 align="center">
          <?php 
// Resultado, número de registros y contenido.
echo $ItemName; 
?>
      </h1></td>
    </tr>
  </tbody>
</table>
<form action="cierre_planilla.php" method="post" id="cierre" onSubmit="return alerta();" >
<table width="60%" border="1" align="center">
  <tbody>
    <tr>
      <input name="busqueda" type="hidden" id="busqueda" value="<?=$ItemCode?>"> <input name="cierre_planilla" type="hidden" id="cierre_planilla" value="<?=$planilla?>"><input name="zona_des" type="hidden" id="zona_des" value="<?=$m_zona?>"><? 
		if ($conteo == 3) {
		?>
      <td scope="col" align="center"><a href="planillas_c3.php?id=<? echo $m_zona;?>" class="myButton">CAMBIAR</a>
		  <? }else{ ?>
<td scope="col" align="center"><a href="planillas.php?id=<? echo $m_zona;?>" class="myButton">CAMBIAR</a>
	<? } ?>
<style>
.myButton {
	-moz-box-shadow:inset -50px 35px 29px -17px #f29c93;
	-webkit-box-shadow:inset -50px 35px 29px -17px #f29c93;
	box-shadow:inset -50px 35px 29px -17px #f29c93;
	background-color:#fe1a00;
	-moz-border-radius:25px;
	-webkit-border-radius:25px;
	border-radius:25px;
	border:1px solid #d83526;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	padding:8px 15px;
	text-decoration:none;
	text-shadow:0px 1px 0px #b23e35;
}
.myButton:hover {
	background-color:#ce0100;
}
.myButton:active {
	position:relative;
	top:1px;
	</style>
</td></td>
      
      <td align="center"><a href="#" class="myButton" onClick='alerta();'>CERRAR</a></td></td>
    </tr>
  </tbody>
</form>
   <tr >
      <td colspan="3" align="center" ><form name="form1" method="post" onSubmit="return validar(this)">
  <input name="planilla" type="hidden" value="<?=$planilla?>"?>
   <input name="id_zona" type="hidden" value="<?=$m_zona?>"?>
  <input name="zona" type="hidden" value="<?=$n_zona?>"?>

  <input name="image" type="image"  src="images/bt_eliminarG.png" />
    </form></td>
  </tr>
</table>
	


</table>
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

