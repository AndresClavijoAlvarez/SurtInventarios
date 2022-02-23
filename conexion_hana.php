<?

$driver = 'HDBODBC32';

// Host
// Note: I am hosting it on the Amazon AWS, so my host looks like this. Put whatever your system administrator gave you
$host = "192.168.10.3:30015";

// Default name of your hana instance
$db_name = "SURTITODO";
date_default_timezone_set('America/Bogota');
// Username
$username = 'SYSTEM';

// Password
$password = "Asdf1234$";


$conn = odbc_connect("Driver=$driver;ServerNode=$host;Database=$db_name;", $username, $password, SQL_CUR_USE_ODBC);


?>