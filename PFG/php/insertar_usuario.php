<?php
	include('clases/usuario.php');
		$login = $_POST["login"];
		$password = $_POST["password"];
		$nombre=$_POST["nombre"];
		$apellido1=$_POST["apellido1"];
		$apellido2=$_POST["apellido2"];
		$tlf=$_POST["tlf"];
		$email=$_POST["email"];
		$hobbies[0]=$_POST["hobbie1"];
		$hobbies[1]=$_POST["hobbie2"];
		$hobbies[2]=$_POST["hobbie3"];
		$cultura=$_POST["cultura"];
		$edad=$_POST["edad"];
		$id_universidad=$_POST["universidad"];
		$id_rol=$_POST["rol"];

		$nombre_tabla = "users";
		if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}

			$sql = "SELECT ID_USER FROM " . $nombre_tabla . "  WHERE LOGIN = '" . $login . "'";
			$resultado = mysqli_query($enlace, $sql);
			
			 
			
			if (mysqli_num_rows($resultado) && !$resultado) {
    			echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    			exit;
			}

			
			if (mysqli_num_rows($resultado)){
				$resultado = mysqli_query($enlace,$sql);
          		if ($fila = mysqli_fetch_array($resultado)) 
					echo "<script>alert('Nombre de usuario ya registrado');window.location.href='http://localhost/html/registro_usuario.php';</script>";

				$sql = "SELECT * FROM " . $nombre_tabla . "  WHERE MAIL = " . $email;
				$resultado = mysqli_query($enlace, $sql);

				if (!$resultado) {
    				echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    				exit;
				}
				if($fila = mysql_fetch_assoc($resultado))
					echo "<script>alert('Email ya registrado');window.location.href='http://localhost/html/registro_usuario.php';</script>";
           }
         $usu=new usuario(); 
		$usu->usuario3($login, $password, $nombre, $apellido1, $apellido2, $tlf, $email, $hobbies, $cultura, $edad, $id_universidad, $id_rol);
		
		$usu->Insertar();
		 echo "<script>window.location.href='http://localhost';</script>";
	
?>