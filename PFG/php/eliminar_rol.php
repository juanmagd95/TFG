<?php 
include('clases/rol.php');


$id_rol=$_GET["id_rol"];

$rol=new rol();
$rol->rol3($id_rol);
$rol->Borrar();
echo "<script>window.location.href='http://localhost/php/administrador.php';</script>";

?>