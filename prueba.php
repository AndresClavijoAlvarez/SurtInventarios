<?php 
include('conectar.php');
$connect=Conectarse();
sleep(1);
if (isset($_POST)) {
    $username = (string)$_POST['username'];
 
   $result = $connect->query(
        'SELECT id, barra from fi_conteos WHERE planilla = 37"'
    );
 
    if ($result->num_rows > 0) {
        echo '<div class="alert alert-danger"><strong>Oh no!</strong> Nombre de usuario no disponible.</div>';
    } else {
        echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> Usuario disponible.</div>';
    }
}