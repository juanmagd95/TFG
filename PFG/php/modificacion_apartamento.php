<?php  
$id_apartamento=$_GET["id_apart"];
$id=$_GET["id"];

	if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}
  
	$sql="SELECT *  FROM APARTMENTS WHERE ID_APARMENTS=" . $id_apartamento;

	$resultado = mysqli_query( $enlace, $sql);

	if (!$resultado) {
    		echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    		exit;
	}
	$fila = mysqli_fetch_array($resultado);

	
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../javascript/validaciones_modificacion_apartamento.js" ></script>

<link rel='stylesheet' type='text/css' href='../Estilos/modificacion_apartamento.css'>
</head>

<body>
<form method="post" action="<?php echo '../php/modificar_apartamento.php?id_apart=' . $id_apartamento . "&id=" . $id ?>" onsubmit="JavaScript:return validar_modificacion_apartamento(this);">

	<div>
	Localidad:<input type="text" name="localidad" value="<?php echo utf8_encode($fila['LOCALITY']); ?>">
	</div>
	<div>
	Calle:<input type="text" name="calle" value="<?php echo utf8_encode($fila['STREET']); ?>">
	</div>
	<div>
	Numero:<input type="text" name="numero" value="<?php echo $fila['NUMBER']; ?>">
	</div>
	<div>
	Piso:<input type="text" name="piso" value="<?php echo $fila['FLOOR']; ?>">
	</div>
	<div>
	Letra:<input type="text" name="letra" value="<?php if ($fila['WORD']!='0') echo $fila['WORD']; else echo ""; ?>">
	</div>
	
	<div>
	Número de habitaciones:<input type="text" name="num_habitaciones" value="<?php echo $fila['NUM_ROOMS']; ?>">
	</div>
	<div>
	Número de cuarto de baños:<input type="text" name="num_baños" value="<?php echo $fila['NUM_BATHROOMS']; ?>">
	</div>
	<div>
	Con internet: <br><input type="radio" name="internet" value="si" <?php if (utf8_encode($fila["INTERNET"])=="Sí") echo "checked='true'"; ?>> Sí
 				 <input type="radio" name="internet" value="no" <?php if (utf8_encode($fila["INTERNET"])=="No") echo "checked='true'"; ?>> No
 				 
	<div>
	Con ascensor: <br><input type="radio" name="ascensor" value="si"  <?php if (utf8_encode($fila["ELEVATOR"])=="Sí") echo "checked='true'"; ?>> Sí
 				 <input type="radio" name="ascensor" value="no" <?php if (utf8_encode($fila["ELEVATOR"])=="No") echo "checked='true'"; ?>> No
 				 
  
	</div>
	<div>
	Con calefacción: <br><input type="radio" name="calefaccion" value="si" <?php if (utf8_encode($fila["HEATING"])=="Sí") echo "checked='true'"; ?>> Sí
 				 <input type="radio" name="calefaccion" value="no" <?php if (utf8_encode($fila["HEATING"])=="No") echo "checked='true'"; ?>> No
 				 
  
	</div>
	<div>
	Con parking: <br><input type="radio" name="parking" value="si" <?php if (utf8_encode($fila["PARKING"])=="Sí") echo "checked='true'"; ?>> Sí
 				 <input type="radio" name="parking" value="no" <?php if (utf8_encode($fila["PARKING"])=="No") echo "checked='true'"; ?>> No
 				 
  
	</div>
	<div>
	
	Provincia: <select name="provincia">
	<option value="<?php echo utf8_encode($fila["PROVINCE"]); ?>"><?php echo utf8_encode($fila["PROVINCE"]); ?>
	<option value="&Aacute;lava" >&Aacute;lava
<option value="Albacete">Albacete
<option value="Alicante" >Alicante
<option value="Almer&iacute;a">Almer&iacute;a
<option value="&Aacute;vila" >&Aacute;vila
<option value="Badajoz">Badajoz
<option value="Baleares">Baleares
<option value="Barcelona" >Barcelona
<option value="Burgos">Burgos 
<option value="C&aacute;ceres" >C&aacute;ceres
<option value="C&aacute;diz">C&aacute;diz
<option value="Castell&oacute;n" >Castell&oacute;n
<option value="Ciudad Real">Ciudad Real
<option value="C&oacute;rdoba" >C&oacute;rdoba
<option value="Coru&#241;a">Coru&#241;a
<option value="Cuenca" >Cuenca
<option value="Gerona">Gerona
<option value="Granada" >Granada
<option value="Guadalajara">Guadalajara
<option value="Guip&uacute;zcoa" >Guip&uacute;zcoa
<option value="Huelva">Huelva
<option value="Huesca">Huesca
<option value="Ja&eacute;n" >Ja&eacute;n
<option value="Le&oacute;n">Le&oacute;n
<option value="L&eacute;rida" >L&eacute;rida
<option value="Lugo" >Lugo
<option value="Madrid">Madrid
<option value="M&aacute;laga" >M&aacute;laga
<option value="Murcia">Murcia
<option value="Navarra">Navarra
<option value="Orense ">Orense
<option value="Palencia">Palencia
<option value="Las Palmas" >Las Palmas
<option value="Pontevedra">Pontevedra
<option value="Salamanca">Salamanca
<option value="Tenerife" >Tenerife
<option value="Segovia" >Segovia
<option value="Sevilla">Sevilla
<option value="Soria" >Soria
<option value="Tarragona">Tarragona

<option value="Teruel">Teruel
<option value="Toledo" >Toledo
<option value="Valencia">Valencia
<option value="Valladolid">Valladolid
<option value="Vizcaya">Vizcaya
<option value="Zamora" >Zamora
<option value="Zaragoza">Zaragoza
</select>
	</div>
	<div>
	Precio:<input type="text" name="precio" value="<?php echo $fila['PRICE']; ?>">
	</div>
	
	
	
 Tipo de apartamento:<select name="tipo_apartamento">
        
        <?php
        $sql2="SELECT TYPE FROM APARTMENT_TYPES WHERE ID_APARTMENT_TYPE=" . $fila["ID_APARTMENT_TYPE"];
        $resultado2 = mysqli_query( $enlace, $sql2);
        $fila2=mysqli_fetch_array($resultado2);
        echo "<option value=" . $fila['ID_APARTMENT_TYPE'] . ">" . utf8_encode($fila2['TYPE']) . "</option>";
         $sql3="SELECT ID_APARTMENT_TYPE,TYPE FROM APARTMENT_TYPES";
          $resultado3 = mysqli_query($enlace,$sql3);
          while ($fila3 = mysqli_fetch_array($resultado3)) {
            echo '<option value="'. $fila3["ID_APARTMENT_TYPE"].'">'.utf8_encode($fila3["TYPE"]).'</option>';
          }
        ?>
      </select>
	
<div>
	<input type="submit" value="Modificar datos del Apartamento">
</div>
</form>
</body>
</html>