<?php
if($_GET['tecnologia']){
$tecnologia = $_GET['tecnologia'];
switch($tecnologia){
case 'xhtml':
$texto = '<h3>Xhtml</h3><p>La estructura html es muy simple: una lista de enlaces y un div d�nde se muestra el contenido.</p>';
break;
case 'css':
$texto = '<h3>Css</h3><p>El ejemplo funciona igual sin estilos Css pero al dise�ar los elementos resulta m�s atractivo el ejemplo.</p>';
break;
case 'jquery':
$texto = '<h3>jQuery</h3><p>Gracias al m�todo load de jQuery puedes crear tus aplicaciones Ajax con poco c�digo.</p>';
break;
}
echo utf8_decode($texto);
}
?>
