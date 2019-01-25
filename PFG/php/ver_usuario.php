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
  
	$sql="SELECT * FROM USERS WHERE ID_USER=" . $id;

	$resultado = mysqli_query( $enlace, $sql);

	

	if (!$resultado) {
    		echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    		exit;
	}
	 $fila = mysqli_fetch_array($resultado);
	 	$login=$fila["LOGIN"];
	 	$nombre=$fila["NAME"];
	 	$apellido1=$fila["FIRST_NAME"];
	 	$apellido2=$fila["SECOND_NAME"];
	 	$tlf=$fila["PHONE"];
	 	$email=$fila["MAIL"];
	 	if (strlen($fila["HOBBIES"])>0)
	 		

	 		 	$hobbies=explode(" ",$fila["HOBBIES"]);
	 	else
	 			$hobbies="";

	 	$cultura=$fila["CULTURE"];
	 	$edad=$fila["AGE"];
	 	$id_universidad=$fila["ID_UNIVERSITY"];
	 	$id_rol=$fila["ID_ROL"];


	 	$sql1 = "SELECT UNIVERSITY_NAME FROM UNIVERSITIES WHERE ID_UNIVERSITY = " . $id_universidad;
	 	$resultado1 = mysqli_query( $enlace, $sql1);
	 	if ($resultado1){
	 		$fila = mysqli_fetch_array($resultado1);
	 		$universidad=$fila["UNIVERSITY_NAME"];
	 	}else
	 		$universidad="";
	 	$sql2 = "SELECT ROLE FROM ROLES WHERE ID_ROLE = " . $id_rol;
	 	$resultado2 = mysqli_query( $enlace, $sql2);
	 	$fila = mysqli_fetch_array($resultado2);
	 	$rol=$fila["ROLE"];


	   $sql1="SELECT ID_UNIVERSITY, UNIVERSITY_NAME FROM UNIVERSITIES";

	$resultado1 = mysqli_query( $enlace, $sql1);

	$sql2="SELECT ID_ROLE, ROLE FROM ROLES";

	$resultado2 = mysqli_query( $enlace, $sql2);
	
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">

<script type="text/javascript" src="../javascript/validaciones_modificacion_usuario.js" ></script>
<script>
 function abrir(){
		 var window_width=650;
var window_height=500;
var window_top=(screen.height-window_height)/2;
var window_left=(screen.width-window_width)/2;	
open("","Nueva2","width=" + window_width + ",height=" + window_height + ",top=" + window_top+ ",left=" + window_left + ";toolbar=no,menubar=no,scrollbars=no,titlebar=no,location=no,resizable=no");
}
		</script>
<link rel='stylesheet' type='text/css' href='../Estilos/registro_usuario.css'>
</head>

<body>
<form method="post" action="../php/modificar_usuario.php?id=<?php echo $id; ?>" onsubmit="JavaScript:return validar_usuario(this);">
	<div>
	Nombre de usuario:<input type="text" name="login" value="<?php echo utf8_encode($login); ?>">
	</div>
	<div>
	Nueva Contraseña (opcional):<input type="password" name="password">
	</div>
	<div>
	Confirmar contraseña:<input type="password" name="repassword">
	</div>
	<div>
	Nombre:<input type="text" name="nombre" value="<?php echo utf8_encode($nombre); ?>">
	</div>
	<div>
	Primer apellido:<input type="text" name="apellido1" value="<?php echo utf8_encode($apellido1); ?>">
	</div>
	<div>
	Segundo apellido:<input type="text" name="apellido2" value="<?php echo utf8_encode($apellido2); ?>">
	</div>
	<div>
	Teléfono:<input type="text" name="tlf" value="<?php echo $tlf; ?>">
	</div>
	<div>
	Email:<input type="text" name="email" value="<?php echo utf8_encode($email); ?>">
	</div>
	
	<div> Indica tres hobbies (opcional) (uno en cada casilla):</div>
	Hobbie 1:<input type="text" name="hobbie1" value="<?php echo utf8_encode($hobbies[0]); ?>">
	Hobbie2:<input type="text" name="hobbie2" value="<?php echo utf8_encode($hobbies[1]); ?>">
	Hobbie3:<input type="text" name="hobbie3" value="<?php echo utf8_encode($hobbies[2]); ?>">

	<div>
	Cultura:<input type="text" name="cultura" value="<?php echo utf8_encode($cultura); ?>">
	</div>
	<div>
	Edad:<input type="text" name="edad" value="<?php echo $edad; ?>">
	</div>
	Universidad:<select name="universidad">
		<?php
        echo "<option value='" . $id_universidad . "'>" . utf8_encode($universidad ). "</option>";
        
          $resultado1 = mysqli_query($enlace,$sql1);
          while ($fila = mysqli_fetch_array($resultado1)) {
            echo '<option value="'. $fila["ID_UNIVERSITY"].'">'.utf8_encode($fila["UNIVERSITY_NAME"]).'</option>';
          }
        ?>
      </select>
      
	<div>
	<input type="submit" value="Modificar Datos">
	</div>
</form>
</body>
</html>

