<?php
    $id=$_GET["id"];
	include('clases/apartamento.php');
	include('clases/aplicacion.php');
	header("Content-Type: text/html;charset=utf-8"); 
	 	$localidad=$_POST["localidad"];
		$calle=$_POST["calle"];
		$numero=0;
		if (isset($_POST["numero"]) && strlen($_POST["numero"])>0)
			$numero=$_POST["numero"];
		
			
		if (isset($_POST["piso"]) && strlen($_POST["piso"])>0)
			$piso=$_POST["piso"];
		else
			$piso = 0;
		if (isset($_POST["letra"]) && strlen($_POST["letra"])>0)
			$letra=$_POST["letra"];
		else
			$letra = '0';
		
		$num_habitaciones=$_POST["num_habitaciones"];
		$num_baños = $_POST["num_baños"];
		if ($_POST["internet"]=="si")
			$internet = true;
		else
			$internet = false;
		if ($_POST["ascensor"]=="si")
			$ascensor = true;
		else
			$ascensor = false;
		if ($_POST["calefaccion"]=="si")
			$calefaccion = true;
		else
			$calefaccion = false;
		if ($_POST["parking"]=="si")
			$parking = true;
		else
			$parking = false;
		
		$provincia = $_POST["provincia"];
		
		$precio = $_POST["precio"];
		if ($_POST["tipo_apartamento"]!='0')
			$id_tipo_apartamento = $_POST["tipo_apartamento"];
		else
			$id_tipo_apartamento = 0;
		echo "Numero= ". $numero;
		$apart=new apartamento();
		$apart->apartamento2($localidad, $calle, $numero, $piso, $letra, $num_habitaciones, $num_baños, $internet, $ascensor, $calefaccion, $parking, $provincia, $precio, $id_tipo_apartamento);
		$apart->mostrar();
		$id_apart=$apart->Insertar();
		
		$fecha=date('Y-m-d H:i:s');
		$ap=new aplicacion();
		$ap->aplicacion2($id,$id_apart,$fecha);
		
		$ap->Insertar();
		 echo "<script>window.location.href='http://localhost/php/arrendatario.php?id=". $id ."';</script>";
	
?>