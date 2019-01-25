<?php
	include('clases/pais.php');
	if (isset($_POST["nombre_pais"])){
		$nombre_pais=$_POST["nombre_pais"];
		$p = new pais();
		$p->pais2($nombre_pais);
		
		$p->Insertar();
		echo "<script>window.location.href='http://localhost/php/administrador.php';</script>";
	}
?>