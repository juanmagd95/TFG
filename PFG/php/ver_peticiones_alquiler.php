<?php 
	$id=$_GET["id"];


if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
}

if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
}
$sql="SELECT * FROM ALQUILERES WHERE ID_ARRENDATARIO =" . $id;


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
	window.location.href="aceptar_alquiler.php?id_apart=" + id_apart + "&id=" + id;
}

</script>
<script>
function abrir2(id_apart,id){
	window.location.href="eliminar_alquiler.php?id_apart=" + id_apart + "&id=" + id;
}

</script>


</script>
<meta charset="UTF-8">
<link rel='stylesheet' type='text/css' href='../Estilos/resultados.css'>
</head>

	<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid black;border-collapse:collapse;">
<tr>
<td style="border:1px solid black;">Aceptar/Rechazar</td><td style="border:1px solid black;">Localidad</td><td style="border:1px solid black;">Calle</td><td style="border:1px solid black;">Número</td><td style="border:1px solid black;">Piso</td><td style="border:1px solid black;">Letra</td><td style="border:1px solid black;">Num. habitaciones</td><td style="border:1px solid black;">Num. baños</td><td style="border:1px solid black;">Internet</td><td style="border:1px solid black;">Ascensor</td><td style="border:1px solid black;">Calefacción</td><td style="border:1px solid black;">Parking</td><td style="border:1px solid black;">Provincia</td><td style="border:1px solid black;">Precio</td><td style="border:1px solid black;">Tipo</td><td  style="border:1px solid black;">Estado</td>
</tr>
<?php 

if (mysqli_num_rows($resultado))
						
						while($fila=mysqli_fetch_assoc($resultado)){
							$id_apart=$fila["ID_APARTMENT"];
							if ($fila["STATE"]==0)
								$estado="En espera";
							else
								$estado="Aceptado";

							$sql2="SELECT * FROM APARTMENTS WHERE ID_APARMENTS = " . $id_apart;
								
							
							$resultado2 = mysqli_query($enlace,$sql2);
							if (mysqli_num_rows($resultado2))
							while($fila2=mysqli_fetch_assoc($resultado2)){
								$sql3="SELECT TYPE FROM APARTMENT_TYPES WHERE ID_APARTMENT_TYPE = " . $fila2["ID_APARTMENT_TYPE"];
								$resultado3 = mysqli_query($enlace,$sql3);
								$fila3=mysqli_fetch_assoc($resultado3);
								$tipo_apartamento=$fila3["TYPE"];
								$id_apart=$fila2["ID_APARMENTS"];
								echo "<tr><td><button onclick='JavaScript:abrir(" . $id_apart . "," . $id . ");'>Aceptar </button><button onclick='JavaScript:abrir2(" . $id_apart . "," . $id . ");'>Rechazar </button></td><td>" . utf8_encode($fila2["LOCALITY"]) . "</td><td>" . utf8_encode($fila2["STREET"]) . "</td><td>" . $fila2["NUMBER"] . "</td><td>" . $fila2["FLOOR"] . "</td><td>" . $fila2["WORD"] . "</td><td>" . $fila2["NUM_ROOMS"] . "</td><td>" . $fila2["NUM_BATHROOMS"] . "</td><td>" . utf8_encode($fila2["INTERNET"]) . "</td><td>" . utf8_encode($fila2["ELEVATOR"]) . "</td><td>" . utf8_encode($fila2["HEATING"]) . "</td><td>" . utf8_encode($fila2["PARKING"]) . "</td><td>" . utf8_encode($fila2["PROVINCE"]) . "</td><td>" . $fila2["PRICE"] . "</td><td>" . utf8_encode($tipo_apartamento) . "</td><td>" . $estado . "</td></tr>";
							}
						}
					

?>
</table>
</body>
</html>