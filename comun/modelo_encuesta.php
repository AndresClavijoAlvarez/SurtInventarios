<?php
session_start();
include ('menu.php');
$id=$_SESSION['usuario_id'];
//include('../comun/conexion.php');
$fecha = date("d/m/Y"); 

//$link=Conectarse(); // variable de conexi�n
//RECUPERAMOS LAS VARIABLES PARA TRABAJAR
//CODIGO PARA RECUPERAR LOS MODELOS CREADOS JHOAN POSADA 15/07/2013
$sql="SELECT
DECODE(A.TIPO_EVALUACION, 'In','Institucional','pm', 'Pregrados o Maestrias', 'do', 'Doctorados'),
A.NOMBRE_MODELO,
DECODE(A.ESTADO, '1','ACTIVO','0', 'INACTIVO'),
A.ID_MODELO
FROM
SIMA.EIP_MODELO_EVALUACION A
";
$con_est=OCIParse($link,$sql);
OCIExecute($con_est);

?>
<!DOCTYPE  html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	<head>

		<meta charset="utf-8">
		<title>USB</title>
		
	
</head>
	
	<body class="home">

	<form action="save_modelo.php" method="post" id="forma" name="forma">
	</tr>
      </table>
<table width="770" border="10" align="center" bordercolor="#FFCC99" background="http://web.usbmed.edu.co/notas_vacacionales/notas_vac/carrusel/images/bg.jpg">
      <tr>
        <td><table border="5" bgcolor="#FFFFFF" id="tablaok" wborder="5" >
          <tr>
            <td class="modo1"><p align="center" class="Estilo77">Tipo Evaluaci&oacute;n</p></td>
            <td class="modo2"><div align="center"><span class="Estilo77">
                <select name="tipo_evaluacion" class="datum" id="tipo_evaluacion" style="visibility:visible;">
                  <option value="0" selected="selected">Seleccione una Opci&oacute;n</option>
                  <option value="In">Institucional</option>
                  <option value="pm">Pregrados</option>
                  <option value="do">Doctorados O Maestrias</option>
                </select>
            </span></div></td>
          </tr>
          <tr>
            <td class="modo1"><label> </label>
                <label></label>
                <label></label>
                <div align="center"><span class="Estilo77">Nombre</span></div></td>
            <td class="modo2"><div align="center">
                <label>
                <textarea name="nombre_modelo" cols="60" rows="4" id="nombre_modelo"></textarea>
                </label>
            </div></td>
          </tr>
          <tr>
            <td class="modo1"><div align="center"><span class="Estilo77">Estado</span></div></td>
            <td class="modo2"><label> </label>
                <div align="center">
                  <select name="estado" id="estado">
                    <option value="2">Seleccione Estado</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
              </div></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
                <input type="submit" name="Submit" value="Guardar" onClick="return validaFecha( this.form );" />
                <script>
            /*efecto hover by auner*/ a.botonrss { width:166px; height:180px; /* dimensiones de las imagenes*/ text-indent:-9999px; overflow:hidden; /* ocultando el texto del enlace */ display:block; background:url(images/rss-boton.png) no-repeat 0 0; /* poniendo la imagen como fondo */ } a.botonrss:hover { background: url(images/rss-boton.png) no-repeat 0 -180px; /* Al hacer hover, ponemos la segunda imagen de fondo */ }
</script>

</div></td>
          </tr>
        </table>
        <p>&nbsp;</p></td>
      </tr>
    </form>
	<form id="form1" method="post">
    <table width="990" border="0">

  <td>
  <table width="988" border="5" align="center" cellpadding="0" cellspacing="0" class="display" id="example">
                    <thead>
                      <tr>
  
                            <th class="modo2">Tipo Evaluaci�n</th>
                            <th class="modo2">Nombre Modelo</th>
							<th class="modo2">Estado</th>
							<th class="modo2">Vigencias</th>
							
					  </tr>
      </thead>
                        <?php  

   while(OCIFetch($con_est)) {			
$TIPO_EVALUACION =OCIResult($con_est,1);
 $NOMBRE_MODELO =OCIResult($con_est,2);
$ESTADO =OCIResult($con_est,3);
$ID_MODELO =OCIResult($con_est,4);
 
$vigencia="<a href='Vigencia_modelo.php?id=$ID_MODELO'><img src='../comun/images/vigencias.gif'  width='90' height='28' /></a>\n";  

printf("<tr class=modo1>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s&nbsp;</td>
<td>%s</td>



</tr>",$TIPO_EVALUACION,$NOMBRE_MODELO,$ESTADO,$vigencia); 

}// CIERRA CONSULTA 

OCIFreeStatement($con_est);
Cerrar_Conexion($link);
?>
  </table>

  