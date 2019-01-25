<?php 
include('clases/tipo_apartamento.php');


$id_tipo_apartamento=$_GET["id_tipo_apartamento"];

$tipo=new tipo_apartamento();
$tipo->tipo_apartamento3($id_tipo_apartamento);
$tipo->Borrar();
echo "<script>window.location.href='http://localhost/php/administrador.php';</script>";

?>