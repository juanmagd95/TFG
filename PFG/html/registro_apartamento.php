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
  
	$sql="SELECT ID_APARTMENT_TYPE, TYPE FROM APARTMENT_TYPES";

	$resultado = mysqli_query( $enlace, $sql);

	if (!$resultado) {
    		echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    		exit;
	}
	
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../javascript/validaciones_apartamento.js" ></script>

<link rel='stylesheet' type='text/css' href='../Estilos/registro_apartamento.css'>
</head>

<body>
<form method="post" action="<?php echo '../php/insertar_apartamento.php?id=' . $id ?>" onsubmit="JavaScript:return validar_apartamento(this);">

	<div>
	Localidad:<input type="text" name="localidad">
	</div>
	<div>
	Calle:<input type="text" name="calle">
	</div>
	<div>
	Numero:<input type="text" name="numero">
	</div>
	<div>
	Piso:<input type="text" name="piso">
	</div>
	<div>
	Letra:<input type="text" name="letra">
	</div>
	
	<div>
	Número de habitaciones:<input type="text" name="num_habitaciones">
	</div>
	<div>
	Número de cuarto de baños:<input type="text" name="num_baños">
	</div>
	<div>
	Con internet: <br><input type="radio" name="internet" value="si"> Sí
 				 <input type="radio" name="internet" value="no"> No
 				 <input type="radio" name="internet" value="sn" checked = 'true' style="display:none">
	<div>
	Con ascensor: <br><input type="radio" name="ascensor" value="si"> Sí
 				 <input type="radio" name="ascensor" value="no"> No
 				 <input type="radio" name="ascensor" value="sn" checked = 'true' style="display:none">
  
	</div>
	<div>
	Con calefacción: <br><input type="radio" name="calefaccion" value="si"> Sí
 				 <input type="radio" name="calefaccion" value="no"> No
 				 <input type="radio" name="calefaccion" value="sn" checked = 'true' style="display:none">
  
	</div>
	<div>
	Con parking: <br><input type="radio" name="parking" value="si"> Sí
 				 <input type="radio" name="parking" value="no"> No
 				 <input type="radio" name="parking" value="sn" checked = 'true' style="display:none">
  
	</div>
	<div>
	Provincia: <select name="provincia">
	<option value="0">Seleccione una provincia
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
	Precio:<input type="text" name="precio">
	</div>
	
	
	
 Tipo de apartamento:<select name="tipo_apartamento">
        <option value="0">Seleccione tipo de apartamento</option>
        <?php
          $resultado = mysqli_query($enlace,$sql);
          while ($fila = mysqli_fetch_array($resultado)) {
            echo '<option value="'. $fila["ID_APARTMENT_TYPE"].'">'.utf8_encode($fila["TYPE"]).'</option>';
          }
        ?>
      </select>
	
<div>
	<input type="submit" value="Registrar Apartamento">
</div>
</form>
</body>
</html>

