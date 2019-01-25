<?php 
include('clases/pais.php');


$id_pais=$_GET["id_pais"];

$pais=new pais();
$pais->pais3($id_pais);
$pais->Borrar();
echo "<script>window.location.href='http://localhost/php/administrador.php';</script>";

?>