
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
    <div class="container">
      <div class="table-responsive">
        <table border="1" class="table table-striped table-bordered" id="employee_data">  
                          <thead>  
                               <tr> 
							   
                                    <th>Zona
                                    <th>Planilla
                                    <th>
				 Codigo. Barras
                                      </td>
							  <th>
				 Descripcion
                                      </td>
					  <th>
				 Fecha
                                      </td>
				 <th>
				 Conteo
                                      </td>
			   <th>
				 Estado
                                      </td>
					 
                                 
                            </tr>  
                          </thead> 

                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
							?>
<tr>
<td><? echo $row["zona"];?></td>	
<td><? echo $row["Planilla"];?></td>
<td><? echo $row["Barra"];?></td>
<td><? echo $row["descripcion"];?></td>	
<td><? echo $row["Fecha"];?></td>	
<td><? echo $row["Conteo"];?></td>
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
          
          
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/funciones.js"></script>
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  