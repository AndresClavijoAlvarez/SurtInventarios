<?php

function Conectarse()
{
	if (!($link=$connect = mysqli_connect("localhost", "root", "", "inv")))
	{
		echo "Error conectando a la base de datos.";
		exit();
	}
	

	return $link;
}


?>
