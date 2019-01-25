<!DOCTYPE HTML>
<html>
<head>

<meta charset="UTF-8">
<script>
function abrir(id_universidad){
	window.location.href="eliminar_universidad.php?id_universidad=" + id_universidad;
}

</script>
<link rel='stylesheet' type='text/css' href='../Estilos/ver_apartamentos.css'>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid black;border-collapse:collapse;">
<tr>
<td style="border:1px solid black;">Eliminar</td><td style="border:1px solid black;">Nombre de la Universidad</td><td style="border:1px solid black;">País</td>
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
			
			$sql = "SELECT ID_UNIVERSITY, ID_COUNTRY, UNIVERSITY_NAME FROM UNIVERSITIES" ;
			
			$resultado = mysqli_query($enlace,$sql);

			if (mysqli_num_rows($resultado) && !$resultado ) {
    			echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    			exit;
			}

			if (mysqli_num_rows($resultado))
				while($fila=mysqli_fetch_assoc($resultado)){
					$id_universidad=$fila["ID_UNIVERSITY"];
					$sql2="SELECT NAME FROM COUNTRIES WHERE ID_COUNTRY=" . $fila["ID_COUNTRY"];
					$resultado2 = mysqli_query($enlace,$sql2);

					if (mysqli_num_rows($resultado2)) {
						$fila2=mysqli_fetch_assoc($resultado2);
						$pais=$fila2["NAME"];
					}
					else
						$pais="";


					echo "<tr><td><button onclick='JavaScript:abrir(" . $id_universidad .");'>Eliminar Universidad</button></td><td>" . utf8_encode($fila["UNIVERSITY_NAME"]) . "</td><td>" . utf8_encode($pais) . "</td></tr>";
			  }
		?>
</table>
</body>
</html>