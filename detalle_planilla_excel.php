<?php
header("Content-Type: application/vnd.ms-excel");header("content-disposition: attachment;filename=detalle_planilla_excel.xls");?>
<?php  
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
require ("aut_verifica.inc.php"); 
$nombre=$_SESSION['nombre_pv'];
$usuario_nivel=$_SESSION['usuario_nivel'];

 $connect = mysqli_connect("localhost", "root", "", "inv");  
 
$servidor='http://surtitodo.com.co:8081/surtinet_v2/';
 $aux_id_get1="x3245*ad98/725.840216";
$id_planilla= $_GET["id_planilla"];
$cadena = explode("x3245*ad98/725.840216",$id_planilla);
$planilla=$cadena[0]; 
$conteo_de_zona=$cadena[1];
$la_de_conteo=$cadena[2];

$query ="SELECT
fi_conteos.Planilla,
fi_conteos.Barra,
fi_conteos.Fecha,
fi_conteos.Estado,
fi_conteos.Conteo,
zonas.zona,
cat_productos.descripcion
FROM
fi_conteos ,
zonas ,
cat_productos
WHERE
zonas.id_zona = fi_conteos.Zona AND
fi_conteos.Barra = cat_productos.barras and
fi_conteos.Planilla = $planilla and 
fi_conteos.Conteo = $la_de_conteo and 
fi_conteos.Zona = $conteo_de_zona
order by 1
";  
 $result = mysqli_query($connect, $query);  

$mysqli = new mysqli('localhost', 'root', '', 'inv');
$mysqli->set_charset("utf8");
$connect = mysqli_connect("localhost", "root", "", "inv");  
$sw_error=0;


?> 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SISUR Zonas</title>  
      </head>  
      <body>  
   
		 
		        
           <input name="conteo" type="hidden" id="conteo" value="<?=$conteo ?>">
           <div class="container">
             <div class="table-responsive">  
       <table id="employee_data" class="table table-striped table-bordered" border="1">  
                          <thead>  
                               <tr> 
<th>Zona</th>
<th>Planilla</th>
<th>UPC</th>
<th>Descripcion</th>	
<th>Codigo. Barras</th>
<th>Fecha</th>

<th>Estado</th>
	
                                 
                            </tr>  
                          </thead> 

                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          { 

 ///////////////////////////////////
$CODIGO=$row["Barra"];							  
require ('conexion_hana.php'); 
$conn = odbc_connect("Driver=$driver;ServerNode=$host;Database=$db_name;", $username, $password, SQL_CUR_USE_ODBC);
if (!$conn)
{
    echo "Connection failed.\n";
    echo "ODBC error code: " . odbc_error() . ". Message: " . odbc_errormsg();
}
else
{
		
 $resultqaa = odbc_exec($conn, "CALL $db_name.CCU_INV_DETALLE('$CODIGO')"); 
   
}						  
 while ($rowa = odbc_fetch_object($resultqaa))
	{	
	
	$ItemCode= $rowa->ItemCode;
	 $ItemName= $rowa->ItemName;

 }
///////////////////////////////////							  
							?>
<tr>
<td><? echo $row["zona"];?></td>	
<td><? echo $row["Planilla"];?></td>
    <td><? echo  "'".$ItemCode;?></td>
    <td><? echo  $ItemName;?></td>		
<td><? echo "'".$row["Barra"];?></td>

<td><? echo $row["Fecha"];?></td>	

<td><? 
if ($row["Estado"]== 1)echo "Abierto";	
if ($row["Estado"]== 2)echo "Cerrado";								  
							  ?></td>

                     <?
                    }  
                          ?> 
	</tr>
    </table>
                  
             </div>  
      </div>  
          
 