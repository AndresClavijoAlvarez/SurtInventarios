<?php
//  Autentificator
//  Gesti?n de Usuarios PHP+Mysql+sesiones
//  by Pedro Noves V. (Cluster)
//  clus@hotpop.com
//  v1.0  - 17/04/2002 Versi?n inicial.
//  v1.01 - 24/04/2002 Solucionado error sintactico en aut_verifica.inc.php.
//  v1.05 - 17/05/2002 Optimizaci?n c?digo aut_verifia.inc.php
//  v1.06 - 03/06/2002 Correcci?n de errores de la versi?n 1.05 y error con navegadores Netscape
//  v2.00 - 18/08/2002 Optimizaci?n c?digo + Seguridad.
//                     Ahora funciona con la directiva registre_globals= OFF. (PHP > 4.1.x)
//                     Optimizaci?n Tablas SQL. (rangos de tipos).
//  v2.01 - 16/10/2002 Solucionado "despistes" de la versi?n 2.00 de Autentificator
//                     en aut_verifica.inc.php y aut_gestion_usuarios.php que ocasinavan errores al trabajar
//                     con la directiva registre_globals= OFF.
//                     Solucionado error definici?n nombre de la sessi?n.
//
// Descripci?n:
// Gesti?n de P?ginas restringidas a Usuarios, con nivel de acceso
// y gesti?n de errores en el Login
// + administraci?n de usuarios (altas/bajas/modificaciones)
//
// Licencia GPL con estas extensiones:
// - Uselo con el fin que quiera (personal o lucrativo).
// - Si encuentra el c?digo de utilidad y lo usas, mandeme un mail si lo desea.
// - Si mejora el c?digo o encuentra errores, hagamelo saber el mail indicado.
//
// Instalaci?n y uso del Gestor de usuarios en:
// documentacion.htm
//  ----------------------------------------------------------------------------


// Motor autentificaci?n usuarios.

// Cargar datos conexion y otras variables.

// Datos conexi?n a la Base de datos (MySql)
$sql_host="192.168.10.100";  // Host, nombre del servidor o IP del servidor Mysql.
$sql_usuario="root";        // Usuario de Mysql
$sql_pass="";           // contrase?a de Mysql

$sql_db="prueba";     // Base de datos que se usar?.
$sql_tabla="usuario"; // Nombre de la tabla que contendr? los datos de los usuarios

// chequear p?gina que lo llama para devolver errores a dicha p?gina.

$url = explode("?",$_SERVER['HTTP_REFERER']);
$pag_referida=$url[0];
$redir=$pag_referida;
// chequear si se llama directo al script.
if ($_SERVER['HTTP_REFERER'] == ""){
die ("Error cod.:1 - Acceso incorrecto!");
exit;
}


// Chequeamos si se est? autentificandose un usuario por medio del formulario
if (isset($_POST['user']) && isset($_POST['pass'])) {
$user=$_POST['user'];
$pass=$_POST['pass'];
// Conexi?n base de datos.
// si no se puede conectar a la BD salimos del scrip con error 0 y
// redireccionamos a la pagina de error.
$db_conexion= mysql_connect("$sql_host", "$sql_usuario", "$sql_pass") or die(header ("Location:  $redir?error_login=0"));
mysql_select_db("$sql_db");

/*// realizamos la consulta a la BD para chequear datos del Usuario.
$usuario_consulta = mysql_query("SELECT id_usuario,nombre,pass,correo,ultimo_ingreso,rol,id_tienda FROM usuario WHERE nombre= '$user'") or die(header ("Location:  $redir?error_login=11111"));
*/
$query2 = "SELECT id_usuario,nombre,pass,correo,ultimo_ingreso,rol,id_tienda FROM usuario WHERE nombre= '$user'";

		$result = mysql_query($query2) or die('Consulta fallida: Usuario no Existe' . mysql_error());

	while ($line2 = mysql_fetch_array($result, MYSQL_ASSOC)) {

			
    // Paranoia: destruimos las variables login y password usadas
    unset($login);
    unset ($password);

    // En este punto, el usuario ya esta validado.
    // Grabamos los datos del usuario en una sesion.
    
     // le damos un mobre a la sesion.
    session_name($usuarios_sesion);
     // incia sessiones
    session_start();

    // Paranoia: decimos al navegador que no "cachee" esta p?gina.
    session_cache_limiter('nocache,private');
    
    // Asignamos variables de sesi?n con datos del Usuario para el uso en el
    // resto de p?ginas autentificadas.

    // definimos usuarios_id como IDentificador del usuario en nuestra BD de usuarios
    $_SESSION['usuario_id']=$line2['id_usuario'];
    
    // definimos usuario_nivel con el Nivel de acceso del usuario de nuestra BD de usuarios
    $_SESSION['usuario_rol']=$line2['rol'];
    
    //definimos usuario_nivel con el Nivel de acceso del usuario de nuestra BD de usuarios
    $_SESSION['usuario_nombre']=$line2['nombre'];

    //definimos usuario_password con el password del usuario de la sesi?n actual (formato md5 encriptado)
    $_SESSION['usuario_pass']=$line2['pass'];


    // Hacemos una llamada a si mismo (scritp) para que queden disponibles
    // las variables de session en el array asociado $HTTP_...
    $pag=$_SERVER['PHP_SELF'];
    Header ("Location: $pag?");
    exit;
    
   }  

// -------- Chequear sesi?n existe -------

// usamos la sesion de nombre definido.
session_name($usuarios_sesion);
// Iniciamos el uso de sesiones
session_start();

// Chequeamos si estan creadas las variables de sesi?n de identificaci?n del usuario,
// El caso mas comun es el de una vez "matado" la sesion se intenta volver hacia atras
// con el navegador.

}
?>
