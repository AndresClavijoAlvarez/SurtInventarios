<?php
if($_GET['tecnologia']){
$tecnologia = $_GET['tecnologia'];
switch($tecnologia){
case 'xhtml':
$texto = '<h3>Xhtml</h3><p>La estructura html es muy simple: una lista de enlaces y un div dónde se muestra el contenido.</p>';
break;
case 'css':
$texto = '<h3>Css</h3><p>El ejemplo funciona igual sin estilos Css pero al diseñar los elementos resulta más atractivo el ejemplo.</p>';
break;
case 'jquery':
$texto = '<h3>jQuery</h3><p>Gracias al método load de jQuery puedes crear tus aplicaciones Ajax con poco código.</p>';
break;
}
echo utf8_decode($texto);
}
?>
