<?php
	include('clases/universidad.php');
	
		$id_pais=$_POST["pais"];
		$nombre = $_POST["nombre"];
		$uni = new universidad();
		$uni->universidad2($id_pais,$nombre);
		
		$uni->Insertar();
		echo "<script>window.location.href='http://localhost/php/administrador.php';</script>";
	
?>