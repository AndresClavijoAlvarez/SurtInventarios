<?
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'inv';
$usuario = 'root';
$contraseña = '';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

//$tabla="";
//$query="SELECT * FROM cata_prod ORDER BY ItemCode";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['alumnos']))
{
	$pabuscar=$_POST['alumnos'];
	$q=$conexion->real_escape_string($_POST['alumnos']);
	$query="SELECT * FROM cata_prod WHERE 
		CodeBars = $pabuscar ";
$buscarAlumnos=$conexion->query($query);
if ($buscarAlumnos->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID ALUMNO</td>
			<td>NOMBRE</td>
		</tr>';

	while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaAlumnos['ItemCode'].'</td>
			<td>'.$filaAlumnos['ItemName'].'</td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}	
	
	
}else
	{
		$tabla="Por favor leer codigo de barras";
	}




echo $tabla;
?>
