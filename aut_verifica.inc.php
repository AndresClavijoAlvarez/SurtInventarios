<?
error_reporting( E_ALL );
ini_set( "display_errors", "0" );
$mysqli = new mysqli("localhost", "root", "", "inv");  
$usuarios_sesion="autentificator";

// Datos conexi�n a la Base de datos (MySql)
$sql_host="localhost";  // Host, usuario del servidor o IP del servidor Mysql.
$sql_usuario="root";        // Usuario de Mysql
$sql_pass="";           // contrase�a de Mysql

$sql_db="inv";     // Base de datos que se usar�.
$sql_tabla="usuario"; // usuario de la tabla que contendr� los datos de los usuarios


// chequear p�gina que lo llama para devolver errores a dicha p�gina.

$url = explode("?",$_SERVER['HTTP_REFERER']);
$pag_referida=$url[0];
$redir=$pag_referida;
// chequear si se llama directo al script.
if ($_SERVER['HTTP_REFERER'] == ""){
die ("Error cod:1 - Acceso incorrecto!");
exit;
}


// Chequeamos si se est� autentificandose un usuario por medio del formulario
if (isset($_POST['user']) && isset($_POST['pass'])) {

// Conexi�n base de datos.
// si no se puede conectar a la BD salimos del scrip con error 0 y
// redireccionamos a la pagina de error.
$db_conexion= mysql_connect("$sql_host", "$sql_usuario", "$sql_pass") or die(header ("Location:  $redir?error_login=0"));
mysql_select_db("$sql_db");

// realizamos la consulta a la BD para chequear datos del Usuario.
$usuario_consulta = mysql_query("SELECT * FROM $sql_tabla WHERE usuario='".$_POST['user']."'") or die(header ("Location:  $redir?error_login=1"));

 // miramos el total de resultado de la consulta (si es distinto de 0 es que existe el usuario)
 if (mysql_num_rows($usuario_consulta) != 0) {

    // eliminamos barras invertidas y dobles en sencillas
    $login = stripslashes($_POST['user']);
    // encriptamos el password en formato md5 irreversible.
    $password = $_POST['pass'];

    // almacenamos datos del Usuario en un array para empezar a chequear.
 	$usuario_datos = mysql_fetch_array($usuario_consulta);

    // liberamos la memoria usada por la consulta, ya que tenemos estos datos en el Array.
    mysql_free_result($usuario_consulta);
    // cerramos la Base de dtos.
    mysql_close($db_conexion);

    // chequeamos el usuario del usuario otra vez contrastandolo con la BD
    // esta vez sin barras invertidas, etc ...
    // si no es correcto, salimos del script con error 4 y redireccionamos a la
    // p�gina de error.
    if ($login != $usuario_datos['usuario']) {
       	Header ("Location: $redir?error_login=4");
		exit;}

    // si el password no es correcto ..
    // salimos del script con error 3 y redireccinamos hacia la p�gina de error
    if ($password != $usuario_datos['pass']) {
        Header ("Location: $redir?error_login=3");
	    exit;}

    // Paranoia: destruimos las variables login y password usadas
    unset($login);
    unset ($password);
	
    // En este punto, el usuario ya esta validado.
    // Grabamos los datos del usuario en una sesion.
    
     // le damos un mobre a la sesion.
    session_name($usuarios_sesion);
     // incia sessiones
    session_start();

    // Paranoia: decimos al navegador que no "cachee" esta p�gina.
    session_cache_limiter('nocache,private');

    $_SESSION['usuario_id']=$usuario_datos['id'];
    
    // definimos usuario_nivel con el Nivel de acceso del usuario de nuestra BD de usuarios
    $_SESSION['usuario_nivel']=$usuario_datos['rol'];
    
    //definimos usuario_nivel con el Nivel de acceso del usuario de nuestra BD de usuarios
    $_SESSION['usuario_login']=$usuario_datos['usuario'];
	$_SESSION['usuario_tienda']=$usuario_datos['tienda'];
	 $_SESSION['nombre_pv']=$usuario_datos['nombre_pv'];
	  $_SESSION['num_tienda']=$usuario_datos['num_tienda'];

    //definimos usuario_password con el password del usuario de la sesi�n actual (formato md5 encriptado)
    $_SESSION['usuario_password']=$usuario_datos['pass'];
	 $_SESSION['usuario_nombres']=$usuario_datos['nombres'];
	 $_SESSION['usuario_apellidos']=$usuario_datos['apellidos'];
	
	 
	$usuario=$_SESSION['usuario_login'];
	 $ttienda=$usuario_datos['tienda'];
	 
	 $ConsultaMySql= $mysqli->query("SELECT * from tiendas where id = $ttienda");

while($columna = mysqli_fetch_array($ConsultaMySql))
{
   $_SESSION['nombre_pv']=$columna["nombre_pv"];
     $_SESSION['num_tienda']=$columna['num_tienda'];
}  
    // Hacemos una llamada a si mismo (scritp) para que queden disponibles
    // las variables de session en el array asociado $HTTP_...
    $pag=$_SERVER['PHP_SELF'];
    Header ("Location: $pag?");
    exit;
    
   } else {
      // si no esta el usuario de usuario en la BD o el password ..
      // se devuelve a pagina q lo llamo con error
      Header ("Location: $redir?error_login=2");
      exit;}
} else {

session_name($usuarios_sesion);
// Iniciamos el uso de sesiones
session_start();
if (!isset($_SESSION['usuario_login']) && !isset($_SESSION['usuario_password'])){
// Borramos la sesion creada por el inicio de session anterior
session_destroy();
die ("Error cod.: 2 - Acceso incorrecto!");
exit;
}
}
?>
