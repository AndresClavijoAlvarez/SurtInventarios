<?php
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

$planilla = $_POST["planilla"];
$id_zona = $_POST["id_zona"];
$zona = $_POST["zona"];
$producto = $_POST["buscar"];
/////////////////////////////////////////

 
$queryc ="SELECT MIN(id) id from fi_conteos 
WHERE planilla = $planilla AND barra  = $producto AND conteo = $conteo AND zona = $id_zona AND bodega=$num_tienda;";  
			 $resultc = mysqli_query($connect, $queryc);  
               while($rowc = mysqli_fetch_array($resultc))  {
    $id_producto = $rowc["id"];
          
  } 
  
  
if ($producto<>''){	
  if (empty($id_producto)){
	  $ItemName = 'Ese producto no existe en esa planilla';
	  $producto='';
  }else{
	 
	 header ("Location: control_elim_uni.php?planilla=$planilla&id_zona=$id_zona&zona=$zona&producto=$producto");
	  }
}
	 ?>

 

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

<table width="60%" border="2" align="center">
  <tbody>
   <tr>
      <td colspan="3" align="center"><div align="center" class="Estilo1">
        <h2><span class="Estilo2"><? echo $nombre?></span></h2>
      </div></td>
    </tr>
    <tr>
      <td width="25%" align="center"><span style="font-size: xx-large; color: #FC0509; text-align: left;"><strong>Zona
        <?=$zona?>
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
          <p><span style="text-align: center"></span>
            <input name="planilla" type="hidden" value="<?=$planilla?>"?>
   <input name="id_zona" type="hidden" value="<?=$id_zona?>"?>
  <input name="zona" type="hidden" value="<?=$zona?>"?>
          </p>
          <p><input name="buscar" type="search" autofocus required="required" id="buscar" placeholder="Buscar aquí..." size="13" maxlength="13"  style="visibility:block"></p>
          <p>
            <label>
            <input type="submit" name="Submit" value="Enviar">
            </label>
          </p>
        </form>	  </td>
    </tr>
    
    <tr>
      <td colspan="4" nowrap="nowrap"><font size=90 color="red">
        <h1 align="center"><strong>
        
          </strong></h1>
        </font>
        <h1 align="center">
          <?php 
// Resultado, número de registros y contenido.
if ($producto  <> ' '){
echo $ItemName; }
?>
        </h1>
        <p align="center">&nbsp;</p></td>
    </tr>
	<tr>
	
      <td colspan="4" ><div align="center"><a href="inv.php?id_planilla=<?=$planilla.$aux_id_get1.$id_zona?>"><img src=images/bt_volver.png  /></a> </div></td>
    </tr>
  </tbody>
</table>


		

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
