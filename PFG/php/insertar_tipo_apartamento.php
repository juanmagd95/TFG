<?php
	include('clases/tipo_apartamento.php');
	
		$tipo=$_POST["nombre_tipo"];
		$t = new tipo_apartamento();
		$t->tipo_apartamento2($tipo);
		
		$t->Insertar();
		echo "<script>window.location.href='http://localhost/php/administrador.php';</script>";
	
?>