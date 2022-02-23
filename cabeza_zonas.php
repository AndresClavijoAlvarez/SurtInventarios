<? 
require ("aut_verifica.inc.php"); 
$nombre=$_SESSION['nombre_pv'];
$usuario_nivel=$_SESSION['usuario_nivel'];
$num_tienda=$_SESSION['num_tienda'];
$conteo=$_SESSION['conteo'];
$Almacen = $num_tienda;
define('HOST_DB', 'localhost');  //Nombre del host, nomalmente localhost
define('USER_DB', 'root');       //Usuario de la bbdd
define('PASS_DB', '');           //Contraseña de la bbdd
define('NAME_DB', 'inv'); //Nombre de la bbdd
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB)
	or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS');
	mysql_select_db(NAME_DB)
	or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB);

$sql2 = "SELECT
max(rango_final_planillas) max
FROM zonas";
	  
	  $resultado2 = mysql_query($sql2); //Ejecución de la consulta
while($fila2 = mysql_fetch_assoc($resultado2)){ 
              $max = $fila2['max'];
			 }


?><p></p>
<p></p>
<p></p>
  <script>
		function val_jp( formulario )
{
	
		if (document.ingreso.tipo_doc.selectedIndex == "4"){
			
			document.ingreso.numerofac.value = 1;		
	}else 
		document.ingreso.numerofac.value = '';		
}
	function validaFecha( formulario )
{


if(ingreso.date.value == '')
	{
	alert('Debe Seleccionar una fecha')
	ingreso.date.focus()
	return false
	}
	if (document.ingreso.tipo_doc.selectedIndex == "0"){alert('Debe Seleccionar el tipo de Documento');return(false)}
	if (document.ingreso.tiendas.selectedIndex == "0"){alert('Debe Seleccionar la Tienda');return(false)}
	if (document.ingreso.proveedor.selectedIndex == "0"){alert('Debe Seleccionar Proveedor');return(false)}
	if(ingreso.numerofac.value == '')
	{
	alert('Debe Ingresar un Número')
	ingreso.numerofac.focus()
	return false
	}
	if(ingreso.fileField.value == '')
	{
	alert('Debe Adjuntar un Documento PDF')
	ingreso.fileField.focus()
	return false
	}
	ingreso.submit()
}

</script>
	<div id="sites-chrome-page-wrapper">
		  <div id="sites-chrome-page-wrapper-inside">
    <div xmlns="http://www.w3.org/1999/xhtml" id="sites-chrome-header-wrapper">
		      <table width="600" align="center" cellpadding="10" cellspacing="10" id="sites-chrome-header">
		        <tbody>
		          <tr id="sites-chrome-horizontal-nav">
		            <td id="sites-chrome-header-horizontal-nav-container" role="navigation">
                </td>
	              </tr>
	            </tbody>
	          </table>
      </div>	  
		     
</div>
	        </div>
	</div>
    </div>
	
<form action="#" method="post" enctype="multipart/form-data" name="ingreso" id="ingreso">
      <table width="100%" border="0">
        <tbody>
          <tr>
            <td><div align="center">
                <table width="44%" border="2" align="center" cellpadding="{scmCellpadding}" cellspacing="0" id="sites-chrome-main">
                  <tbody>
                    <tr>
						<td width="10%" bgcolor="#56CBAF" id="sites-canvas-wrapper" style="text-align: center"><strong>Unidades SAP</strong></td>
                      <td id="sites-canvas-wrapper" style="text-align: justify"><div align="center"><strong><font color="ED0404">Todos los campos son Obligatorios</strong></div></td>
                      <td id="sites-canvas-wrapper" style="text-align: center" bgcolor="#56CBAF"><strong> Conteo</strong></td>
                      <td id="sites-canvas-wrapper" style="text-align: center" bgcolor="#56CBAF"><strong> Auditoria</strong></td>
                      <td id="sites-canvas-wrapper" style="text-align: center" bgcolor="#56CBAF"><strong>Diferencia</strong></td>
                      <td id="sites-canvas-wrapper" style="text-align: center" bgcolor="#56CBAF"><strong>Avance</strong></td>
                    </tr>
                    
                    <tr>
                      <td width="10%" rowspan="4" bgcolor="#56CBAF" id="sites-canvas-wrapper"><h1><?
						require ('conexion_hana.php'); 
$conn = odbc_connect("Driver=$driver;ServerNode=$host;Database=$db_name;", $username, $password, SQL_CUR_USE_ODBC);
if (!$conn)
{
    echo "Connection failed.\n";
    echo "ODBC error code: " . odbc_error() . ". Message: " . odbc_errormsg();
}
else
{
		
 $resultqa = odbc_exec($conn, "CALL $db_name.CCU_INV_SISUR('$Almacen')"); 
    if (!$resultqa)
    {
        echo "Error while sending SQL statement to the database server.\n";
        echo "ODBC error code: " . odbc_error() . ". Message: " . odbc_errormsg();
    }
}						  
 while ($row = odbc_fetch_object($resultqa))
	{	
	
	$jp= $row->JP;
	$jp=intval($jp);
	echo $jp;
 }
						  
						  
						  
						  ?></h1></td>
                      <td id="sites-canvas-wrapper5" style="text-align: left"><div>
                        <div align="center">
                          <input name="zonas" type="number" id="zonas" placeholder="Numero Zona"  size="10" required="required" />
                        </div>
                      </div>                        <div></div>                        <div></div></td>
                      <td width="5%" rowspan="4" bgcolor="#56CBAF" id="sites-canvas-wrapper5" style="text-align: center">
						  <h1><?
						$sql2ac = "
						SELECT
Count(fi_conteos.Cantidad) as jp
FROM
fi_conteos
where conteo = 1
";
	  
	  $resultado2ac = mysql_query($sql2ac); //Ejecuci&oacute;n de la consulta
while($fila2ac = mysql_fetch_assoc($resultado2ac)){ 
              $maxac = $fila2ac['jp'];
			 }
						  $t2c = number_format($maxac, 0, '.', ',');// 1234.57
						  $con1=$maxac;
						  echo $t2c."";	  
						  ?></h1></td>
                      <td width="5%" rowspan="4" bgcolor="#56CBAF" id="sites-canvas-wrapper5" style="text-align: center"><h1><?
						$sql2ac = "
						SELECT
sum(fi_conteos_manual.Cantidad) as jp
FROM
fi_conteos_manual
where conteo = 2
";
	  
	  $resultado2ac = mysql_query($sql2ac); //Ejecuci&oacute;n de la consulta
while($fila2ac = mysql_fetch_assoc($resultado2ac)){ 
              $maxac = $fila2ac['jp'];
			 }
						  $t2c = number_format($maxac, 0, '.', ',');// 1234.57
						   $con2=$maxac;
						  echo $t2c."";	  
						  ?>
                      </h1></td>
						  <? $con3=$con1 - $con2 ;
						  $con3 = number_format($con3, 0, '.', ',');
						  
						  ?>
                      <td width="5%" rowspan="4" bgcolor="#56CBAF" id="sites-canvas-wrapper5" style="text-align: center"><h1><? echo ($con3); ?></h1></td>
                      <td width="5%" rowspan="4" bgcolor="#56CBAF" id="sites-canvas-wrapper5" style="text-align: center">
						  <h1><?
						$sql2a = "
						SELECT
Count(fi_conteos.Cantidad) jp
FROM
fi_conteos
WHERE
fi_conteos.Bodega = $num_tienda AND

fi_conteos.Conteo = 1";
	  
	  $resultado2a = mysql_query($sql2a); //Ejecución de la consulta
while($fila2a = mysql_fetch_assoc($resultado2a)){ 
              $maxa = $fila2a['jp'];
			 }
					$total=($maxa/$jp)*100;
							  
							
						  $t2 = number_format($total, 2, '.', ',');// 1234.57
						  echo $t2."%";	  
						  ?></h1></td>
                    </tr>
                    <tr>
                      <td id="sites-canvas-wrapper5" style="text-align: left"><div>
					    <div align="center">
					      <input name="pini" type="number" required="required" id="pini"  value="<? echo $max+1; ?>" />
					    </div>
				      </div>                        <div></div>                        <div></div></td>
                      </tr>
					  <tr>
					    <td id="sites-canvas-wrapper5" style="text-align: left"><div>
					    <div align="center">
					      <input name="pifi" type="number" id="pifi" placeholder="Planilla Final"  size="5" required="required" />
                        </div>
				      </div>                        <div></div>                        <div></div></td>
				    </tr>
                    
                    <tr>
                      <td id="sites-canvas-wrapper11"><div style="text-align: center">
                          <input name="image" type="image" onclick="return validaFecha( this.form );" src="images/btn_ingresar.png" />
                      </div></td>
                    </tr>
                  </tbody>
            </table></td>
          </tr>
        </tbody>
      </table>
  </span>
      <div align="center">
       
      </div>
</form>
