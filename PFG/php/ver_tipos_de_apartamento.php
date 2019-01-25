<!DOCTYPE HTML>
<html>
<head>

<meta charset="UTF-8">
<script>
function abrir(id_tipo_apartamento){
	window.location.href="eliminar_tipo_apartamento.php?id_tipo_apartamento=" + id_tipo_apartamento;
}

</script>
<link rel='stylesheet' type='text/css' href='../Estilos/ver_apartamentos.css'>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid black;border-collapse:collapse;">
<tr>
<td style="border:1px solid black;">Eliminar</td><td style="border:1px solid black;">Tipo de apartamento</td>
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
			
			$sql = "SELECT ID_APARTMENT_TYPE, TYPE FROM APARTMENT_TYPES" ;
			
			$resultado = mysqli_query($enlace,$sql);

			if (mysqli_num_rows($resultado) && !$resultado ) {
    			echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    			exit;
			}

			if (mysqli_num_rows($resultado))
				while($fila=mysqli_fetch_assoc($resultado)){
					$id_tipo_apartamento=$fila["ID_APARTMENT_TYPE"];
					echo "<tr><td><button onclick='JavaScript:abrir(" . $id_tipo_apartamento .");'>Eliminar Tipo de apartamento</button></td><td>" . utf8_encode($fila["TYPE"]) . "</td></tr>";
				}
		?>
</table>
</body>
</html>