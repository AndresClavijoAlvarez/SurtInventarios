<?php
     
	
      function comprobar($b) {
            $con = mysql_connect('localhost','root', '');
            mysql_select_db('inv', $con);
       
            $sql = mysql_query("SELECT descripcion,barras FROM cat_productos WHERE barras = 7709978563359",$con);
             
            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
                  echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
            }else{
                  echo "<span style='font-weight:bold;color:red;'>El nombre de usuario ya existe.</span>";
            }
      }     
?>