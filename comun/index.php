<?php
session_start();
session_destroy();
unset($_SESSION);
//include ('menu.php');
?>
<!DOCTYPE html>
<head>

<title>Ingreso Usuario</title>
<link rel="stylesheet" type="text/css" href="comun/style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 
 
 
   
    <style type="text/css">
<!--
.Estilo1 {color: #FF0000}
.Estilo2 {font-size: 16px}
.Estilo3 {color: #FF0000; font-weight: bold; }
.Estilo4 {color: #FFCC99}
-->
    </style>
</head>
<body>
<marquee direction="left" class="error-box2" id="ejemplo">
</marquee>
<p><a href="javascript:void(0);"></a> <a href="javascript:void(0);"></a></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </center>
    <div id="content">
    <form action="../comun/autentificator/ident.php" method="post" name="formlog" id="formlog">
      <h1> Ingreso Sistema
        <input name="login" type="hidden" value="si" />
      </h1>
      <div><span class="Estilo1">Digite su documento de Identidad</span>
          <input name="user" type="text" id="user" placeholder="Usuario (Número de Identificación)" required="" />
      </div>
      <div>
        <input name="pass" type="password" id="pass" placeholder="Contraseña" required="" />
      </div>
      <div>
        <input name="submit" type="submit" value="Aceptar" />
        <a href="http://asis.usbmed.edu.co/comun/gestion_info/Respuesta.php?parametros=E">Olvido su Contrase&ntilde;a</a> <a href="#"></a> </div>
    </form>
    <!-- form -->
    <div class="button">
      <table width="392" border="10" align="center">
        <tr>
          <td colspan="3"><div align="center">
              <marquee direction="left" class="error-box2 Estilo4" id="ejemplo">
              <span class="Estilo3"><span class="Estilo1">Navegadores recomendados</span></span>
              </marquee>
          </div></td>
        </tr>
        <tr>
          <td><span class="Apple-style-span" style="color: red;"><span class="Apple-style-span" style="color: red;"><img src="comun/images/chrome.png" alt="d" width="34" height="34"><img src="images/chrome1.png" alt="x" width="100" height="18"><span class="Apple-style-span" style="color: red;"><span class="Apple-style-span" style="color: red;"><span class="Apple-style-span" style="color: red;"><img src="images/mozilla.png" alt="d"></span></span></span></span></span></td>
          <td><span class="Apple-style-span" style="color: red;"><img src="images/ie.png" alt="d"></span></td>
          <td>&nbsp;</td>
        </tr>
      </table>
</div>
    <!-- button -->
</div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>  
<marquee direction="right" class="error-box2 Estilo2" id="ejemplo">
<h4>&nbsp;</h4>
</marquee>
<p>
  <!-- content -->
</p>
  <p>&nbsp;</p>
  <p>
    </div>
    <!-- container -->
</p>
</body>
</html>
