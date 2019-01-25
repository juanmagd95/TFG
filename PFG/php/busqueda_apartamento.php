<?php 
if (isset($_GET["id"]))
	$id=$_GET["id"];
else
	$id="";
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
<meta charset="UTF-8">


<link rel='stylesheet' type='text/css' href='../Estilos/busqueda_apartamento.css'>
</head>

<body>
<form method="post" action="<?php echo '../php/mostrar_resultados.php?id=' . $id; ?>">
<div>
Buscar por:
</div>
<div>
	Localidad:<input type="text" name="localidad">
	</div>
	
	<div>
	Número de habitaciones:<input type="text" name="num_habitaciones">
	</div>
	
	<div>
	Con internet: <br><input type="radio" name="internet" value="si"> Sí
 				 <input type="radio" name="internet" value="no"> No
 				 <input type="radio" name="internet" value="sn" checked = 'true' style="display:none">
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
	<input type="submit" value="Buscar Apartamentos">
</div>
</form>
</body>
</html>

