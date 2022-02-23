<?php  
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
require ("aut_verifica.inc.php"); 
$nombre=$_SESSION['nombre_pv'];
$usuario_nivel=$_SESSION['usuario_nivel'];
$usuario=$_SESSION['usuario_nombres']." ".$_SESSION['usuario_apellidos'];
 $connect = mysqli_connect("localhost", "root", "", "inv");  
 $query ="SELECT * FROM zonas";  
 $result = mysqli_query($connect, $query);  
$servidor='http://surtitodo.com.co:8081/surtinet_v2/';
 $aux_id_get1="x3245*ad98/725.840216";

if (isset($_GET["id"]))
    {
	$id_zonas= $_GET["id"];	
}


if (isset($_POST["idd"]))
    {
		$id_zonas= $_POST["idd"];
		$zonas= $_POST['zonas'];
	
		$connect->query("UPDATE zonas SET zonas = '$zonas'  WHERE id_zonas = $id_zonas");
		header("location:zonas.php");	
	}

$mysqli = new mysqli('localhost', 'root', '', 'inv');
$mysqli->set_charset("utf8");
$connect = mysqli_connect("localhost", "root", "", "inv");  
$sw_error=0;

if (isset($_POST["zonas"]))
    {

		$zonas= $_POST['zonas'];
	$pini= $_POST['pini'];
	$pifi= $_POST['pifi'];
		
 $res = $mysqli->query("insert into zonas (zona,rango_inicial_planillas,rango_final_planillas) values ('$zonas',$pini,$pifi)"); 	
header ("Location: zonas.php");
}
?> 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SISUR Zonas</title>  
    
           <style>
	.boton {
text-decoration: none;
 color: #fff;
 font-weight: bold;
 padding: 12px 20px;
 font-size: 18px;
 border-radius: 10px;
 background-color: #666666;
 box-shadow: 0 5px 5px #313131, 0 9px 0 #393939, 0px 9px 10px rgba(0,0,0,0.4), inset 0px 2px 9px rgba(255,255,255,0.2), inset 0 -2px 9px rgba(0,0,0,0.2);
 position: relative;
 border-bottom: 1px solid rgba(255,255,255,0.2);
 display: inline-block;
 font-family: Arial, Helvetica, sans;
 text-shadow: 0px -1px 0px rgba(0,0,0,0.2);
}
 
.boton:hover {
 box-shadow: 0 5px 5px #313131, 0 9px 0 #393939, 0px 9px 10px rgba(0,0,0,0.4), inset 0px 2px 15px rgba(255,255,255,0.4), inset 0 -2px 9px rgba(0,0,0,0.2);
 color: #fff !important;
}
 
.boton:active {
 top: 7px;
 box-shadow: 0 2px 0 #393939, 0px 4px 4px rgba(0,0,0,0.4), inset 0px 2px 5px rgba(0,0,0,0.2);
 color: #fff !important;
}
 
.formaBoton {
 border-radius: 5px;
 padding-left: 25px;
 padding-right: 25px;
}
 
.colorRojo{
 background-color: #c34747;
 box-shadow: 0 5px 5px #853232, 0 9px 0 #5e2525, 0px 9px 10px rgba(0,0,0,0.4), inset 0px 2px 9px rgba(255,255,255,0.2), inset 0 -2px 9px rgba(0,0,0,0.2);
}
 
.colorRojo:hover {
 box-shadow: 0 5px 5px #853232, 0 9px 0 #5e2525, 0px 9px 10px rgba(0,0,0,0.4), inset 0px 2px 15px rgba(255,255,255,0.4), inset 0 -2px 9px rgba(0,0,0,0.2);
}
 
.colorRojon:active {
 box-shadow: 0 2px 0 #5e2525, 0px 4px 4px rgba(0,0,0,0.4), inset 0px 2px 5px rgba(0,0,0,0.2);
}
		  </style>
          
      </head>  
      <body>  
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
	  <p>&nbsp;</p>
		  <table width="40%" border="0" align="center">
		    <tbody>
		      <tr>
		        <th width="37%" scope="col">Tienda: 
		          <?=$nombre?></th>
		        
		       
		        <th width="63%" scope="col">Usuario: 
		          <?=$usuario?></th>

	          </tr>
		      
		      <tr>
		        <th scope="col">&nbsp;</th>
		        <th scope="col">&nbsp;</th>
		     
		  
		      
	          </tr>
		      <tr>
		        <th scope="col">&nbsp;</th>
		        <th scope="col">&nbsp;</th>
	          </tr>
		      <tr>

<th scope="col"><a class="boton colorBoton formaBoton" href="planillas_auditoria_c2.php?idd=<? echo $id_zonas.$aux_id_get1;?>2">Auditoria</a></th>
<th scope="col"><a class="boton colorBoton formaBoton" href="planillas_auditoria.php?idd=<? echo $id_zonas.$aux_id_get1;?>1">Conteo</a></th>				  
				  
	          </tr>
		    
	        </tbody>
      </table>
		  <p>&nbsp;</p>
	  <p>&nbsp;</p>
 </body>