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
$m_zona1=$cadena[1]; 
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
$sqlz = "SELECT zona FROM zonas WHERE id_zona = $m_zona1";

	  $resultadoz = mysql_query($sqlz); //Ejecución de la consulta
      //Si hay resultados...

	     // Se recoge el número de resultados
		   while($filaz = mysql_fetch_assoc($resultadoz)){ 
             $n_zona = $filaz['zona'];
			 }	 
/////////////////////////////////////////////////

  $busqueda = $_POST['buscar'];
	$codigo_zona = $_POST['codigo_zona'];
	$planilla2 = $_POST['hplanilla'];
/////////////////////////////////////////
/////////////////////////////////////////////////
$busqueda = str_replace (".", "", $busqueda);
echo $codigo_zona;
if (!empty($busqueda)){
$sql = "SELECT * from fi_conteos_manual WHERE planilla = $planilla2 AND zona = $codigo_zona AND bodega=$num_tienda and Usuario <> '$usuario';";

	  $resultado = mysql_query($sql); //Ejecución de la consulta
      //Si hay resultados...
	  if (mysql_num_rows($resultado) > 0){ 
		  header ("Location: mensaje_planilla_iniciada.php?usuario=$usuario$aux_id_get1$planilla2");
	  }else {
	$sql1 = "
	INSERT INTO fi_conteos_manual (	
	Planilla,
	Fecha,
	Usuario,
	Estado,
	Bodega,
	Cantidad, 
	Conteo, Zona
)
VALUES
	(
		'$planilla2',
		NOW(),
		'$usuario',
		'2',
		'$num_tienda',
		'$busqueda',
		$conteo,$codigo_zona
		
	);
	";
 $resultado1 = mysql_query($sql1); //Ejecución de la consulta
header ("Location: planillas_.php?id=$codigo_zona");
}}
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
        <title>SISUR</title>
	<script language="javascript" type="text/javascript">
function format(input)
{
var num = input.value.replace(/\./g,'');
if(!isNaN(num)){
num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
num = num.split('').reverse().join('').replace(/^[\.]/,'');
input.value = num;
}
 
else{ alert('Solo se permiten numeros');
input.value = input.value.replace(/[^\d\.]*/g,'');
}
}
	   </script>
	<script>
	function alerta(){
		

    var opcion = confirm("La información es correcta?...no podrá ser actualizada sin autorización del auditor");
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
.Estilo2 {	color: #FF0000;
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
</head>
   
<body>

<p><div align="right">
  <?=$usuario?>
	</div>
</span>
  
</p>
<p>&nbsp;</p>
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
      <td width="50%" align="center"><span style="font-size: xx-large; color: #FB0408;"><span style="color: #080DFC; font-size: xx-large;"><strong>AUDITORIA
      </strong></span></td>
      <td width="25%" align="center"><span style="font-size: xx-large; color: #FB0408;"><strong>Planilla
          <?=$planilla ?>
      </strong></span></td>
     
    </tr>
    <tr>
      <td colspan="4" align="center"><div>
        <form id="buscador" name="buscador" method="post" action="">
          <p>
  <input style="font-size: 2em; color:#000000;" name="buscar" type="text" id="buscar" placeholder="" autocomplete="off" size="6" maxlength="6" onKeyUp="format(this)" onChange="format(this)">
			  
			  
			  
          <span style="text-align: center"></span>
          <input name="codigo_zona" type="hidden" id="codigo_zona" value="<?=$m_zona1?>">
		<input name="hplanilla" type="hidden" id="hplanilla" value="<?=$planilla?>">
          </p>
     
      
    
  
</table>

<table width="60%" border="1" align="center">
  <tbody>
    <tr>
      <input name="busqueda" type="hidden" id="busqueda" value="<?=$ItemCode?>"> <input name="cierre_planilla" type="hidden" id="cierre_planilla" value="<?=$planilla?>"><input name="zona_des" type="hidden" id="zona_des" value="<?=$m_zona1?>">
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
<td style="text-align: center"><input name="image" type="image" onClick="return alerta();" src="images/btn_guardar.png" />
    </tr>
  </tbody>
</table>
<p></p>

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

