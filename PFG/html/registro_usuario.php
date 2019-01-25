<?php  

	if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}
  
	$sql1="SELECT ID_UNIVERSITY, UNIVERSITY_NAME FROM UNIVERSITIES";

	$resultado1 = mysqli_query( $enlace, $sql1);

	$sql2="SELECT ID_ROLE, ROLE FROM ROLES";

	$resultado2 = mysqli_query( $enlace, $sql2);

	if (!$resultado2) {
    		echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    		exit;
	}
	
	 	
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript">
		  function abrir(){
		 var window_width=650;
var window_height=500;
var window_top=(screen.height-window_height)/2;
var window_left=(screen.width-window_width)/2;	
open("","Nueva2","width=" + window_width + ",height=" + window_height + ",top=" + window_top+ ",left=" + window_left + ";toolbar=no,menubar=no,scrollbars=no,titlebar=no,location=no,resizable=no");
}
		</script>
<script type="text/javascript" src="../javascript/validaciones_usuario.js" ></script>
<link rel='stylesheet' type='text/css' href='../Estilos/registro_usuario.css'>
</head>

<body>
<form method="post" action="../php/insertar_usuario.php" onsubmit="JavaScript:return validar_usuario(this);">
	<div>
	Nombre de usuario:<input type="text" name="login">
	</div>
	<div>
	Contraseña:<input type="password" name="password">
	</div>
	<div>
	Confirmar contraseña:<input type="password" name="repassword">
	</div>
	<div>
	Nombre:<input type="text" name="nombre">
	</div>
	<div>
	Primer apellido:<input type="text" name="apellido1">
	</div>
	<div>
	Segundo apellido:<input type="text" name="apellido2">
	</div>
	<div>
	Teléfono:<input type="text" name="tlf">
	</div>
	<div>
	Email:<input type="text" name="email">
	</div>
	
	<div> Indica tres hobbies (opcional)(uno en cada casilla):</div>
	Hobbie 1:<input type="text" name="hobbie1">
	Hobbie2:<input type="text" name="hobbie2">
	Hobbie3:<input type="text" name="hobbie3">

	<div>
	Cultura:<input type="text" name="cultura">
	</div>
	<div>
	Edad:<input type="text" name="edad">
	</div>
	Universidad:<select name="universidad">
        <option value="0">Seleccione Universidad</option>
        <?php
          $resultado1 = mysqli_query($enlace,$sql1);
          while ($fila = mysqli_fetch_array($resultado1)) {
            echo '<option value="'. $fila["ID_UNIVERSITY"].'">'.utf8_encode($fila["UNIVERSITY_NAME"]).'</option>';
          }
        ?>
      </select>
      <div>
      Rol:<select name="rol">
        <option value="0">Seleccione Rol</option>
        <?php
          $resultado2 = mysqli_query($enlace,$sql2);
          while ($fila = mysqli_fetch_array($resultado2)) {
          	if ($fila["ID_ROLE"]!=1)
            	echo '<option value="'. $fila["ID_ROLE"].'">'.utf8_encode($fila["ROLE"]).'</option>';
          }
        ?>
        </select>
      </div>
	<div>
	<input id='check' type='checkbox' name='pol_priv'>He le&iacute;do y Acepto la &nbsp;<a  target="Nueva2" class='enl_ob' onclick="JavaScript:abrir();"  href="../html/PolPriv.html">pol&iacute;tica de privacidad de datos</a>
  </div>
	<input type="submit" value="Registrar Usuario">
</form>
</body>
</html>

