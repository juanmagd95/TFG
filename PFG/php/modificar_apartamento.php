<?php 
include('clases/apartamento.php');

$id_apartamento=$_GET["id_apart"];
$id=$_GET["id"];

	  $apartamento=new apartamento();
	 
	  $apartamento->apartamento3($id_apartamento);

	  $apartamento->setLocalidad($_POST["localidad"]);
	  $apartamento->setCalle($_POST["calle"]);
	  $numero=0;
		if (isset($_POST["numero"]) && strlen($_POST["numero"])>0)
			$numero=$_POST["numero"];
		
			
		if (isset($_POST["piso"]) && strlen($_POST["piso"])>0)
			$piso=$_POST["piso"];
		else
			$piso = -1;
		if (isset($_POST["letra"]) && strlen($_POST["letra"])>0)
			$letra=$_POST["letra"];
		else
			$letra = '0';
	  $apartamento->setNumero($numero);
	   $apartamento->setPiso($piso);
	   $apartamento->setLetra($letra);
	 
	   $apartamento->setNum_Habitaciones($_POST["num_habitaciones"]);
	   $apartamento->setNum_Bannos($_POST["num_baños"]);
	   if (utf8_encode($_POST["internet"])=='si')
	   	$apartamento->setInternet(true);
	   else
	   	$apartamento->setInternet(false);
	    if (utf8_encode($_POST["ascensor"])=='si')
	   	$apartamento->setAscensor(true);
	   else
	   	$apartamento->setAscensor(false);
	   	 if (utf8_encode($_POST["calefaccion"])=='si')
	   	$apartamento->setCalefaccion(true);
	   else
	   	$apartamento->setCalefaccion(false);
	    if (utf8_encode($_POST["parking"])=='si')
	   	$apartamento->setParking(true);
	   else
	   	$apartamento->setParking(false);

	   	$apartamento->setProvincia($_POST["provincia"]);
	   	
	   		
	  

	   	$apartamento->setPrecio($_POST["precio"]);
	   

	   $apartamento->setId_Tipo_Apartamento($_POST["tipo_apartamento"]);
	   	$apartamento->Modificar();
	   	 echo "<script>window.location.href='http://localhost/php/arrendatario.php?id=". $id ."';</script>";

	   	?>