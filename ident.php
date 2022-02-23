<?php
require ("aut_verifica.inc.php"); 
if ($_SESSION['usuario_nivel'] == 11)
		{
		$url_relativa = "zonas.php";
		}
if ($_SESSION['usuario_nivel'] == 8)
		{
		$url_relativa = "conteos.php";
		}
				

header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" .$url_relativa);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
</body>
</html>
