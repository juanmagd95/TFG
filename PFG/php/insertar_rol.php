<?php
	include('clases/rol.php');
	if (isset($_POST["nombre_rol"])){
		$nombre_rol=$_POST["nombre_rol"];
		$r = new rol();
		$r->rol2($nombre_rol);
		
		$r->Insertar();
		echo "<script>window.location.href='http://localhost/php/administrador.php';</script>";
	}
?>