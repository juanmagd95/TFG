<?php
	include('clases/aplicacion.php');
	
		$id_usuario=$_POST["id_usuario"];
		$id_apartamento=$_POST["id_apartamento"];
		$fecha=date('Y-m-d H:i:s');
		
		$app = new aplicacion($id_usuario, $id_apartamento,$fecha) ;
		$app->mostrar();
		$app->Insertar();
	
?>