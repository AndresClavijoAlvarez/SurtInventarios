<?php  
 $connect = mysqli_connect("localhost", "root", "", "inv");  
 $query ="SELECT * FROM movimientos,tiendas where movimientos.tienda = tiendas.id ORDER BY fecha_crea DESC";  
 $result = mysqli_query($connect, $query);  
$servidor='http://localhost/surtinet/';
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Surtiprueba</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">
             <div class="table-responsive">  
                  <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Tiendas</td>  
                                    <td>Remisión</td>  
                                    <td>Factura</td>  
                                    <td>Observacion</td>  
                                    <td>Archivo</td> 
                                    <td>Acción</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
							  $jp=$servidor.$row["file"];
							  
							
                               echo '  
                               <tr>  
                                    <td>'.$row["tienda"].'</td>  
                                    <td>'.$row["remision"].'</td>  
                                    <td>'.$row["factura"].'</td>  
                                    <td>'.$row["movimiento"].'</td>  
                                    <td>'.$row["file"].'</td>';
							  ?>
							  
					  <td><a href='<?php echo $jp; ?>' target="new">
					    <img src="../images/btn_ver.png" width="81" height="31" alt=""/></a></td>

</tr>  
                         <?php     
                          }  
                          ?>  
                     </table>
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  