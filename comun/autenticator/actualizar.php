<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo11 {color: #666666; font-style: italic; font-weight: bold; }
.Estilo12 {color: #666666; font-style: italic; font-weight: bold; font-size: 18px; }
.Estilo4 {color: #0000FF; font-style: italic; font-weight: bold; }
.Estilo5 {font-style: italic; color: #0000FF;}
.Estilo8 {color: #000000}
.Estilo6 {font-size: 24px}
-->
</style>
</head>

<body>
<form action="buscador1.php">
  <p class="Estilo4"><u><cite><tt>
        <?php    $frase = array(    1 => "Por responsabilidad con nuestro sistema de informacion reporta a tiempo las novedades",    2 => "&iquest;Tienes dudas?, !Pregunta&iexcl;",    3 => "Esta Es tu web",    4 => "No te olvides revisar",    5 => "Por nuestro desempe&ntilde;o efectivo",    6 => "Por los derechos de nuestros usuarios",    7 => "Por el derecho a una atencion integral",    8 => "Por la integridad de la informacion"    );     $x = rand(1,8);     echo "$frase[$x]";    ?>
  </u> </tt> </p>
  <table width="1137" border="1" cellpadding="0" id="tabla1">
    <tr>
      <td><p>
        <label for="label"></label>
        :
        <input name="palabra2" />
        <input type="submit" name="buscador2" value="Buscar" />
      </p>
          <p align="center">&nbsp;</p>
        <table width="65%" border="2" align="center">
            <tr>
              <td nowrap="nowrap" bordercolor="5"><p><img width="137" height="71" src="main_clip_image002.jpg" alt="G:\ISVIMED\Picture 1.jpg" /></p>
                  <p>&nbsp;</p>
                <p><img width="157" height="97" src="ingreso_clip_image002.jpg" alt="Logo membrete.jpg" /></p>
                <p>&nbsp;</p>
                <p><img src="ingreso_clip_image002_0000.jpg" alt="AYUDA" width="129" height="80" /></p></td>
            </tr>
          </table>
        <p align="center"><strong><em><img src="anim.gif" alt="gif1" width="32" height="32" /></em></strong></p></td>
      <td><div align="center" class="Estilo12">Favor Diligenciar la Totalidad de los Campos.. </div>
          <table width="73%" border="2" align="center">
            <tr>
              <td align="left" bordercolor="10" bgcolor="#FFFFCC" class="Estilo5"><p align="center" class="Estilo11">DATOS PERSONALES gggg </p></td>
              <td align="left" bordercolor="10" bgcolor="#FFFFCC" class="Estilo5"><p align="center" class="Estilo11">UBICACION SINIESTRO </p></td>
            </tr>
            <tr>
              <td width="34%" bordercolor="10" bgcolor="#FFFFCC" class="TitleColor"><label for="name"></label>
                  <pre>



Identificacion:(Beneficiario)
<b>
<?
// comprovamos si
// ha sido enviado el formulario
if(isset($_POST['eliminar']) && $_POST['eliminar'] == 'Eliminar'){
// creamos la consulta
// que eliminara el registro
// que viene via $_POST
$id_eliminar = $_POST['id'];
}
echo $id_eliminar;
?></b>

<label for="name">Nombre Completos<br /></label><input name="nombre1" type="text" id="name" size="15" /> <input name="nombre2" type="text" id="nombre1" size="15" />
<label for="label">Apellidos Completos
</label><input name="apellido1" type="text" id="label" size="15" /> <input name="apellido2" type="text" id="nombre12" size="15" />
Carpeta:
<input type="text" id="cod" name="carpeta" size="15" />
Numero Ficha Simpad
<input type="text" id="codigo" name="num_ficha_simpad" size="15" />
 
Fecha creacion
<input name="fecha_creacion" type="text" class="TextBox" id="fecha_creacion"    value="<?php echo @$FECHAREGISTRO; ?>" size="10" maxlength="10" /><img src="Calendar.gif" alt="lanzador2" name="lanzador2" width="20" height="17" class="Cursor" id="lanzador2" /></pre>
                  <p>
                    <label for="label"></label>
                    <label for="label4"></label>
                    Observacion
                    <textarea name="observaciones" cols="30" rows="3" id="nombre13"></textarea>
                  </p>
                <p><br />
                </p>
                <p>
                    <label for="email"></label>
                    <label for="label4"></label>
                </p></td>
              <td width="66%" bordercolor="10" bgcolor="#FFFFCC" class="TitleColor"><label for="name"></label>
                  <pre>
Direccion:
<input type="text" id="label3" name="dir_evento" size="50" />
<label for="name"></label><label for="label"></label>Barrio                          Evento 
<label><select name="barrio" id="barrio"><option selected="selected">Seleccione una Opcion</option><option>Alejandr&iacute;a</option><option>Alejandro Echevarria</option><option>Alfonso L&oacute;pez</option><option>Altamira</option><option>Altos del Poblado</option><option>Andaluc&iacute;a</option><option>Antonio Nari&ntilde;o</option><option>Aranjuez</option><option>Asomadera N&ordm; 1</option><option>Asomadera N&ordm; 2</option><option>Asomadera N&ordm; 3</option><option>Astorga</option><option>Aures N&ordm; 1</option><option>Aures N&ordm; 2</option><option>Barrio Caicedo</option><option>Barrio Colombia</option><option>Barrio Col&oacute;n</option><option>Barrio Crist&oacute;bal</option><option>Barrio Facultad de Minas</option><option>Barrios de Jes&uacute;s</option><option>Batall&oacute;n Girardot</option><option>Belalcazar</option><option>Belencito</option><option>Bello Horizonte</option><option>Berl&iacute;n</option><option>Bermejal - Los &Aacute;lamos</option><option>Betania</option><option>Blanquizal</option><option>Bolivariana</option><option>Bombon&aacute; N&ordm; 1</option><option>Bombon&aacute; N&ordm; 2</option><option>Bosques de San Pablo</option><option>Boston</option><option>Boyac&aacute;</option><option>Brasilia</option><option>Buenos Aires</option><option>Calasanz</option><option>Calasanz Parte Alta</option><option>Calle Nueva</option><option>Campo Alegre</option><option>Campo Amor</option><option>Campo Valdes N&ordm; 1</option><option>Campo Valdes N&ordm; 2</option><option>Caribe</option><option>Carlos E. Restrepo</option><option>Carpinelo</option><option>Castilla</option><option>Castropol</option><option>Catalu&ntilde;a</option><option>Central N&ordm; 2</option><option>Cerro El Volador</option><option>Coraz&oacute;n de Jes&uacute;s </option><option>C&oacute;rdoba</option><option>Cristo Rey</option><option>Cuarta Brigada</option><option>Cucaracho</option><option>Doce de Octubre N&ordm; 1</option><option>Doce de Octubre N&ordm; 2</option><option>Eduardo Santos</option><option>El Castillo</option><option>El Chagualo</option><option>El Compromiso</option><option>El Coraz&oacute;n</option><option>El Danubio</option><option>El Diamante</option><option>El Diamante N&ordm; 2</option><option>El Pesebre</option><option>El Pinal</option><option>El Play&oacute;n de Los Comuneros</option><option>El Poblado</option><option>El Pomar</option><option>El Raizal</option><option>El Salado</option><option>El Salvador</option><option>El Socorro</option><option>El Tesoro</option><option>El Triunfo</option><option>El Vel&oacute;dromo</option><option>Enciso</option><option>Estaci&oacute;n Villa</option><option>Estadio</option><option>Ferrini</option></select></label><label>  <select name="evento" id="evento"><option>Seleccione una Opcion</option><option>Colapso Vivienda</option><option>Deslizamiento</option><option>Deterioro Estructura</option><option>Humedades</option><option>Inundacion</option><option>Riesgo</option></select></label>                    
Telefonos
<input type="text" id="carpeta" name="telefono1" size="10" /> <input type="text" id="carpeta2" name="telefono2" size="10" />
Fecha Siniestro    
<input name="fecha_evento" type="text" class="TextBox" id="fecha_evento"    value="<?php echo @$FECHAREGISTRO; ?>" size="10" maxlength="10" /><img src="Calendar.gif" alt="lanzador2" name="lanzador2" width="20" height="17" class="Cursor" id="lanzador2" />      
Contrato  
<label><select name="contrato" id="contrato"><option>SI</option><option selected="selected">NO</option></select> <br />Fecha Contrato<br /><input name="fecha_creacion2" type="text" class="TextBox" id="fecha_creacion2"    value="<?php echo @$FECHAREGISTRO; ?>" size="10" maxlength="10" /><img src="Calendar.gif" alt="lanzador2" name="lanzador2" width="20" height="17" class="Cursor" id="lanzador2" /><br />Motivo No Contrato             </label>
<label><select name="motivo_no_contrato" id="motivo_no_contrato"><option>Seleccione una Opcion</option><option>No le Alquilaron</option><option>ZR No Apto</option><option>Inviable</option><option>Notificacion Personal</option><option>Tramite Zr</option><option>Remitido</option><option>Acta de No Aceptacion</option></select></label>
Subsidio de vivienda
<label><select name="subvivienda" id="subvivienda"><option>SI</option><option selected="selected">NO</option></select></label>
Integrantes Nucleo Familiar
<input type="text" id="carpeta3" name="integrantes" size="2" />
<input type="text" id="integrantes" name="zona" size="2" />
<input type="text" id="integrantes2" name="comuna" size="2" />
              </pre>              </td>
            </tr>
        </table></td>
    </tr>
  </table>
  <p class="Estilo4">&nbsp;</p>
</form>
</body>
</html>
