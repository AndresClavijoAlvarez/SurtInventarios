<?php  
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
require ("aut_verifica.inc.php"); 
$nombre=$_SESSION['nombre_pv'];
$usuario_nivel=$_SESSION['usuario_nivel'];
$conteo=$_SESSION['conteo'];
$usuario_id=$_SESSION['usuario_id'];
$usuario=$_SESSION['usuario_nombres']." ".$_SESSION['usuario_apellidos'];
 $connect = mysqli_connect("localhost", "root", "", "inv");
$mysqli = new mysqli('localhost', 'root', '', 'inv');
$mysqli->set_charset("utf8");
$connect = mysqli_connect("localhost", "root", "", "inv");  
$sw_error=0;
 $queryasi ="SELECT
fi_conteos.Id,
fi_conteos.Planilla,
fi_conteos.Barra,
fi_conteos.Fecha,
fi_conteos.Usuario,
fi_conteos.Estado,
fi_conteos.Bodega,
fi_conteos.Cantidad,
fi_conteos.Conteo,
fi_conteos.Zona,
fi_conteos.hconteo3
FROM
fi_conteos ,
zonas
WHERE
zonas.id_zona = fi_conteos.Zona and zonas.zona_ok = 1"; 
 $resultasi = mysqli_query($connect, $queryasi);  
while($row = mysqli_fetch_array($resultasi))  
{ 
$Id=$row["Id"];
$Planilla=$row["Planilla"];
$Barra=$row["Barra"];
$Fecha=$row["Fecha"];
$Usuario=$row["Usuario"];
$Estado=$row["Estado"];
$Bodega=$row["Bodega"];
$Cantidad=$row["Cantidad"];
$Conteo=$row["Conteo"];
$Zona=$row["Zona"];	

mysqli_query($connect,"insert into fi_conteos_def 
(Id,Planilla,Barra,Fecha,Usuario,Estado,Bodega,Cantidad,Conteo,Zona)
VALUES 
($Id,$Planilla,'$Barra','$Fecha','$Usuario',$Estado,'$Bodega',$Cantidad,$Conteo,$Zona)")or 
 die(mysqli_error($connect));
	
$connect->query("delete from fi_conteos WHERE id = $Id");	
	
}
$queryasi1 ="SELECT
*
FROM
zonas
"; 
 $resultasi1 = mysqli_query($connect, $queryasi1);  
while($row1 = mysqli_fetch_array($resultasi1))  
{ 
$id_zona=$row1["id_zona"];
$zona=$row1["zona"];
$rango_inicial_planillas=$row1["rango_inicial_planillas"];
$rango_final_planillas=$row1["rango_final_planillas"];
$zona_ok=$row1["zona_ok"];	
mysqli_query($connect,"insert into zonas_def 
(id_zona,zona,rango_inicial_planillas,rango_final_planillas,zona_ok)
VALUES 
($id_zona,$zona,'$rango_inicial_planillas','$rango_final_planillas','$zona_ok')")or 
 die(mysqli_error($connect));		
}
$connect->query("delete from zonas WHERE zona_ok = 1");	
?> 