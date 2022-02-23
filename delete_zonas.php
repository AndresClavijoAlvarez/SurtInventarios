<?php
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
 $connect = mysqli_connect("localhost", "root", "", "inv");  
session_start();
//////////////////////////////////////////
$i_d=$_GET['id'];
$cadena = explode("x3245*ad98/725.840216",$i_d);
$id_zona=$cadena[1];
//////////////////////////////////////////


/*

 $query ="delete from estados 
where
id_estado = $id_estado";  
 $result = mysqli_query($connect, $query);
//////////////////////////////////////////
$aux_id_get1="x3245*ad98/725.840216";
header ("Location: estados.php");  
//////////////////////////////////////////
  
?> 

    */



