<?php
			$login=$_POST["login"];
			$password=$_POST["password"];
			if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db($enlace, 'mydb' )) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}
			
			$sql = "SELECT ID_USER, LOGIN, PASSWORD, ID_ROL FROM USERS WHERE LOGIN = '" . utf8_decode($login) . "'";
			
			$resultado = mysqli_query($enlace,$sql);

			if (mysqli_num_rows($resultado) && !$resultado ) {
    			echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    			exit;
			}

			if (mysqli_num_rows($resultado) && $fila=mysqli_fetch_assoc($resultado)){
				$pass=utf8_encode($fila["PASSWORD"]);
				
				if ($password!=$pass)
					echo "<script>alert('La contraseña no es correcta');window.location.href='http://localhost/html/ingreso_usuario.html?id=" . $id . "';</script>";
				else{
					$id=$fila["ID_USER"];
					if ($fila["ID_ROL"]==1)
						echo "<script>window.location.href='http://localhost/php/administrador.php';</script>";
					else if ($fila["ID_ROL"]==2)
						echo "<script>window.location.href='http://localhost/php/usuario.php?id=" . $id . "';</script>";
					else
						echo "<script>window.location.href='http://localhost/php/arrendatario.php?id=" . $id . "';</script>";

				}
			}else{
				
				
				
				echo "<script>alert('El usuario no existe  " . $login . "');
				window.location.href='http://localhost/html/ingreso_usuario.html';</script>";
			}	
			
				

			
?>