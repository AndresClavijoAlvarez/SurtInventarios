<?php

//include('valores.p');
//Conexion a la base de datos
function Conectarse()
{
/*
 $db = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)
        (HOST = rac-scan.usbmed.edu.co)
        (PORT = 1521))) 
        (CONNECT_DATA = (SERVICE_NAME = SICPRO) ) )";
*/
 $db = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.1.15)(PORT = 1521)) ) (CONNECT_DATA = (SERVICE_NAME = PRUEBAS) ) )";
   if (!($link=Ocilogon("caseadm","case2015",$db)))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
    return $link;
}


//ora_parse ($cursor, $query_in, 0);
//Ejecutar sentencia SQL
function Ejecutar_Query($StrSQL,$link){
         $StrSQL = ociparse($link,$StrSQL);
         ociexecute ($StrSQL);
         return $StrSQL;
}
//Avanzar al proximo registro
function Proximo_Registro($result){
         return OCIFetch($result);
//         return OCIFetchInto ($result,$row,OCI_ASSOC);
//         return OCIFetchStatement ($result,$row);
}
//Liberar result
function Liberar_Result($result){
         OCIFreeStatement($result);
}
//Cerrar la conexion
function Cerrar_Conexion($link){
         OCILogOff($link);
}
//mueve el puntero de fila interno a la fila especificada para el identificador de resultado.
function Mover_Puntero($result, $i){
        return OCIResult($result, $i);
}
//Devuelve el numero de filas.
function Numero_Filas($result){
         return OCIRowCount($result);
}
//Devuelve el numero de Columnas.
function Numero_Columnas($result){
         return OCINumCols($result);
}
//Devuelve el nombre de la columna.
function Nombre_Columna($result,$i){
         return OCIColumnName($result,$i);
}


?>
