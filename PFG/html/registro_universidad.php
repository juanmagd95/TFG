<?php  

	if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}
  
	$sql="SELECT ID_COUNTRY, NAME FROM COUNTRIES";

	$resultado = mysqli_query( $enlace, $sql);

	if (!$resultado) {
    		echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    		exit;
	}
	
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../javascript/validaciones_universidad.js" ></script>
<link rel='stylesheet' type='text/css' href='../Estilos/registro_universidad.css'>
</head>

<body>
<form method="post" action="../php/insertar_universidad.php" onsubmit="JavaScript:return validar_universidad(this);">
	País:<select name="pais">
        <option value="0">Seleccione país</option>
        <?php
          $resultado = mysqli_query($enlace,$sql);
          while ($fila = mysqli_fetch_array($resultado)) {
            echo '<option value="'. $fila["ID_COUNTRY"].'">'.utf8_encode($fila["NAME"]).'</option>';
          }
        ?>
      </select>
	nombre de la universidad:<input type="text" name="nombre">
	<input type="submit" value="Registrar Universidad">
</form>
</body>
</html>

