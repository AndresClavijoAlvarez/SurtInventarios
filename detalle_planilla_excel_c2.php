<?php
header("Content-Type: application/vnd.ms-excel");header("content-disposition: attachment;filename=detalle_planilla_conteo2.xls");?>
<?  
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
fi_conteos_manual.Planilla,
fi_conteos_manual.Fecha,
fi_conteos_manual.Estado,
fi_conteos_manual.Conteo, fi_conteos_manual.Cantidad,
zonas.zona
FROM
fi_conteos_manual ,
zonas 
WHERE
zonas.id_zona = fi_conteos_manual.Zona AND
fi_conteos_manual.Planilla = $planilla and 
fi_conteos_manual.Conteo = $la_de_conteo and 
fi_conteos_manual.Zona = $conteo_de_zona
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
       <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr> 
							   
                                    <th>Zona
								   <th>Planilla</th>
                                 <th>
				 Fecha
                                      </td>
				
			                    
			     <th>
				 Cantidad
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
<td><? echo $row["Fecha"];?></td>	


<td><? echo $row["Cantidad"];?></td>

                     <?
                    }  
                          ?> 
	</tr>
    </table>
                  
             </div>  
      </div>  
          
          