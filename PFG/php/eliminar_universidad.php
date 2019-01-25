<?php 
include('clases/universidad.php');


$id_universidad=$_GET["id_universidad"];

$uni=new universidad();
$uni->universidad3($id_universidad);
$uni->Borrar();
echo "<script>window.location.href='http://localhost/php/administrador.php';</script>";

?>