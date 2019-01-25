<?php 
if (isset($_GET["id"]))
	$id=$_GET["id"];
else
	$id="";
$id=$_GET["id"];
if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
}

if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
}
if (strlen($_POST["localidad"])>0){
	$localidad=utf8_decode($_POST["localidad"]);
	$sql="SELECT * FROM APARTMENTS WHERE LOCALITY = '" . $localidad . "'";
	if (strlen($_POST["num_habitaciones"])>0){
		$num_habitaciones=$_POST["num_habitaciones"];
		$sql.=" AND NUM_ROOMS = " . $num_habitaciones;


}
if ($_POST["internet"]!="sn"){
	if ($_POST["internet"]=="si")
		$internet=utf8_decode("Sí");
	else
		$internet=utf8_decode("No");
	$sql.=" AND INTERNET = '" . $internet . "'";
		

}

if ($_POST["parking"]!="sn"){
	if ($_POST["parking"]=="si")
		$parking=utf8_decode("Sí");
	else
		$parking=utf8_decode("No");
	$sql.=" AND PARKING = '" . $parking . "'";
	

}

 if ($_POST["provincia"]!="0"){
 	$provincia=utf8_decode($_POST["provincia"]);
 	$sql.=" AND PROVINCE = '" . $provincia . "'";
	

}
 if ($_POST["tipo_apartamento"]!="0"){
	$id_tipo=$_POST["tipo_apartamento"];
	$sql.= " AND ID_APARTMENT_TYPE = " . $id_tipo;

}


}






else if (strlen($_POST["num_habitaciones"])>0){
	$num_habitaciones=$_POST["num_habitaciones"];
	$sql="SELECT * FROM APARTMENTS WHERE NUM_ROOMS=" . $num_habitaciones;
	if (strlen($_POST["num_habitaciones"])>0){
		$num_habitaciones=$_POST["num_habitaciones"];
		$sql.=" AND NUM_ROOMS = " . $num_habitaciones;


}
if ($_POST["internet"]!="sn"){
	if ($_POST["internet"]=="si")
		$internet=utf8_decode("Sí");
	else
		$internet=utf8_decode("No");
	$sql.=" AND INTERNET = '" . $internet . "'";
		

}

if ($_POST["parking"]!="sn"){
	if ($_POST["parking"]=="si")
		$parking=utf8_decode("Sí");
	else
		$parking=utf8_decode("No");
	$sql.=" AND PARKING = '" . $parking . "'";
	

}

 if ($_POST["provincia"]!="0"){
 	$provincia=utf8_decode($_POST["provincia"]);
 	$sql.=" AND PROVINCE = '" . $provincia . "'";
	

}
 if ($_POST["tipo_apartamento"]!="0"){
	$id_tipo=$_POST["tipo_apartamento"];
	$sql.= " AND ID_APARTMENT_TYPE = " . $id_tipo;

}


}






else if ($_POST["internet"]!="sn"){
	if ($_POST["internet"]=="si")
		$internet=utf8_decode("Sí");
	else
		$internet=utf8_decode("No");

	$sql="SELECT * FROM APARTMENTS WHERE INTERNET = '" .$internet . "'";
	if ($_POST["parking"]!="sn"){
	if ($_POST["parking"]=="si")
		$parking=utf8_decode("Sí");
	else
		$parking=utf8_decode("No");
	$sql.=" AND PARKING = '" . $parking . "'";
	

}

 if ($_POST["provincia"]!="0"){
 	$provincia=utf8_decode($_POST["provincia"]);
 	$sql.=" AND PROVINCE = '" . $provincia . "'";
	

}
 if ($_POST["tipo_apartamento"]!="0"){
	$id_tipo=$_POST["tipo_apartamento"];
	$sql.= " AND ID_APARTMENT_TYPE = " . $id_tipo;

}


	

}

else if ($_POST["parking"]!="sn"){
	if ($_POST["parking"]=="si")
		$parking=utf8_decode("Sí");
	else
		$parking=utf8_decode("No");
	$sql="SELECT * FROM APARTMENTS WHERE PARKING = '" . $parking . "'";

	if ($_POST["provincia"]!="0"){
 	$provincia=utf8_decode($_POST["provincia"]);
 	$sql.=" AND PROVINCE = '" . $provincia . "'";
	

}
 if ($_POST["tipo_apartamento"]!="0"){
	$id_tipo=$_POST["tipo_apartamento"];
	$sql.= " AND ID_TYPE_APARTMENT = " . $id_tipo;

}


}

else if ($_POST["provincia"]!="0"){
	$provincia=utf8_decode($_POST["provincia"]);
 	$sql="SELECT * FROM APARTMENTS WHERE PROVINCE = '" . $provincia . "'";

 	if ($_POST["tipo_apartamento"]!="0"){
	$id_tipo=$_POST["tipo_apartamento"];
	$sql.= " AND ID_APARTMENT_TYPE = " . $id_tipo;

}


}
else if ($_POST["tipo_apartamento"]!="0"){
	
	$id_tipo=$_POST["tipo_apartamento"];
	$sql= "SELECT * FROM APARTMENTS WHERE ID_APARTMENT_TYPE = " . $id_tipo;
}
else{
	$sql= "SELECT * FROM APARTMENTS";
	echo "Todos los apartamentos:";
}



$resultado = mysqli_query( $enlace, $sql);

	

	if (!$resultado) {
    		echo "Error de BD, no se pudo consultar la base de datos\n";
    		echo mysqli_error($enlace);
    		
    		exit;
	}
	
	

	 ?>
<!DOCTYPE HTML>
<html>
<head>
<script>
function abrir(id_apart,id){
	window.location.href="alquilar_apartamento.php?id_apart=" + id_apart+ "&id=" + id;
}

</script>


</script>
<meta charset="UTF-8">
<link rel='stylesheet' type='text/css' href='../Estilos/resultados.css'>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid black;border-collapse:collapse;">
<tr>
<td style="border:1px solid black;">Alquiler</td><td style="border:1px solid black;">Localidad</td><td style="border:1px solid black;">Calle</td><td style="border:1px solid black;">Número</td><td style="border:1px solid black;">Piso</td><td style="border:1px solid black;">Letra</td><td style="border:1px solid black;">Num. habitaciones</td><td style="border:1px solid black;">Num. baños</td><td style="border:1px solid black;">Internet</td><td style="border:1px solid black;">Ascensor</td><td style="border:1px solid black;">Calefacción</td><td style="border:1px solid black;">Parking</td><td style="border:1px solid black;">Provincia</td><td style="border:1px solid black;">Precio</td><td style="border:1px solid black;">Tipo</td>
</tr>
<?php 
if (mysqli_num_rows($resultado))
						while($fila2=mysqli_fetch_assoc($resultado)){
							$sql3="SELECT TYPE FROM APARTMENT_TYPES WHERE ID_APARTMENT_TYPE = " . $fila2["ID_APARTMENT_TYPE"];
							$resultado3 = mysqli_query($enlace,$sql3);
							$fila3=mysqli_fetch_assoc($resultado3);
							$tipo_apartamento=$fila3["TYPE"];
							$id_apart=$fila2["ID_APARMENTS"];
							echo "<tr><td><button onclick='JavaScript:abrir(" . $id_apart ."," . $id . ");'>Alquilar </button></td><td>" . utf8_encode($fila2["LOCALITY"]) . "</td><td>" . utf8_encode($fila2["STREET"]) . "</td><td>" . $fila2["NUMBER"] . "</td><td>" . $fila2["FLOOR"] . "</td><td>" . $fila2["WORD"] . "</td><td>" . $fila2["NUM_ROOMS"] . "</td><td>" . $fila2["NUM_BATHROOMS"] . "</td><td>" . utf8_encode($fila2["INTERNET"]) . "</td><td>" . utf8_encode($fila2["ELEVATOR"]) . "</td><td>" . utf8_encode($fila2["HEATING"]) . "</td><td>" . utf8_encode($fila2["PARKING"]) . "</td><td>" . utf8_encode($fila2["PROVINCE"]) . "</td><td>" . $fila2["PRICE"] . "</td><td>" . utf8_encode($tipo_apartamento) . "</td></tr>";
						}
?>
</table>
</body>
</html>