<?php $id=$_GET["id"];
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
function abrir(id_apart,id){
	window.location.href="modificacion_apartamento.php?id_apart=" + id_apart+ "&id=" + id;
}

</script>

<script>
function abrir2(id_apart,id){
	window.location.href="eliminar_apartamento.php?id_apart=" + id_apart + "&id=" + id;
}

</script>
<meta charset="UTF-8">
<link rel='stylesheet' type='text/css' href='../Estilos/usuario.css'>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid black;border-collapse:collapse;">
<tr>
<td style="border:1px solid black;">Modificar/eliminar</td><td style="border:1px solid black;">Localidad</td><td style="border:1px solid black;">Calle</td><td style="border:1px solid black;">Número</td><td style="border:1px solid black;">Piso</td><td style="border:1px solid black;">Letra</td><td style="border:1px solid black;">Num. habitaciones</td><td style="border:1px solid black;">Num. baños</td><td style="border:1px solid black;">Internet</td><td style="border:1px solid black;">Ascensor</td><td style="border:1px solid black;">Calefacción</td><td style="border:1px solid black;">Parking</td><td style="border:1px solid black;">Provincia</td><td style="border:1px solid black;">Precio</td><td style="border:1px solid black;">Tipo</td>
</tr>
<?php 
if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db($enlace, 'mydb' )) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}
			
			$sql = "SELECT ID_APARTMENT FROM APPLICATIONS WHERE ID_USER = " . $id  ;
			
			$resultado = mysqli_query($enlace,$sql);

			if (mysqli_num_rows($resultado) && !$resultado ) {
    			echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    			exit;
			}

			if (mysqli_num_rows($resultado))
				while($fila=mysqli_fetch_assoc($resultado)){
					$id_apartamento=$fila["ID_APARTMENT"];

					$sql2="SELECT * FROM APARTMENTS WHERE ID_APARMENTS = " . $id_apartamento;
					$resultado2 = mysqli_query($enlace,$sql2);
                     
					if (mysqli_num_rows($resultado2))
						while($fila2=mysqli_fetch_assoc($resultado2)){
							$sql3="SELECT TYPE FROM APARTMENT_TYPES WHERE ID_APARTMENT_TYPE = " . $fila2["ID_APARTMENT_TYPE"];
							$resultado3 = mysqli_query($enlace,$sql3);
							$fila3=mysqli_fetch_assoc($resultado3);
							$tipo_apartamento=$fila3["TYPE"];
							$id_apart=$fila2["ID_APARMENTS"];
							echo "<tr><td><button onclick='JavaScript:abrir(" . $id_apart ."," . $id . ");'>Modificar Apartamento</button><button onclick='JavaScript:abrir2(" . $id_apart ."," . $id . ");'>Eliminar Apartamento</button></td><td>" . utf8_encode($fila2["LOCALITY"]) . "</td><td>" . utf8_encode($fila2["STREET"]) . "</td><td>" . $fila2["NUMBER"] . "</td><td>" . $fila2["FLOOR"] . "</td><td>" . $fila2["WORD"] . "</td><td>" . $fila2["NUM_ROOMS"] . "</td><td>" . $fila2["NUM_BATHROOMS"] . "</td><td>" . utf8_encode($fila2["INTERNET"]) . "</td><td>" . utf8_encode($fila2["ELEVATOR"]) . "</td><td>" . utf8_encode($fila2["HEATING"]) . "</td><td>" . utf8_encode($fila2["PARKING"]) . "</td><td>" . utf8_encode($fila2["PROVINCE"]) . "</td><td>" . $fila2["PRICE"] . "</td><td>" . utf8_encode($tipo_apartamento) . "</td></tr>";
						}
				}

?>
</table>
</body>
</html>

