<?php
session_destroy();
session_start();

	$user = $_POST["user"];
  $pass          = $_POST["pass"];


	require ("aut_verifica.inc.php");
$id=$_SESSION['usuario_id'];
if (!empty($id)){
$url_relativa = "../../aplicacion.php";
header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" .$url_relativa);
}else {
header ('Location: ../mensajes/error_de_ingreso2.php');
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<p>&nbsp;</p>
</body>


</html>
