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

$idq =$_GET["usuario"];
 $aux_id_get1="x3245*ad98/725.840216";
$cadena = explode("x3245*ad98/725.840216",$idq);
$usuario=$cadena[0]; 
$planilla=$cadena[1]; 
?>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #FF3300;
	font-size: 36px;
}
-->
</style>

<div class="alert alert-warning alert-dismissible fade in text-center" role="alert"> <strong>
        <H3>&nbsp;</H3>
        </strong></div>
    <table width="60%" border="0" align="center">
  <tr>
    <th scope="col"><p class="Estilo1">&nbsp;</p>
      <p class="Estilo1"><? echo "La planilla # ".$planilla."<br>"." Ya esta siendo dilingencianda <br> por otro usuario " ?></p>
    <p class="Estilo1">&nbsp;</p></th>
  </tr>
  <tr>
    <th scope="col"><p class="Estilo1">&nbsp;</p>
    <p class="Estilo1"><a href="conteos.php">Regresar</a></p></th>
  </tr>
</table>
    