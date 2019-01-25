<?php 
include('clases/usuario.php');

$id=$_GET["id"];
if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}

			$sql = "SELECT ID_ROL FROM USERS WHERE ID_USER = " . $id;
			$resultado = mysqli_query($enlace, $sql);
			
			 
			
			if (mysqli_num_rows($resultado) && !$resultado) {
    			echo "Error de BD, no se pudo consultar la base de datos\n";
    		
    			exit;
			}

			
			
				$resultado = mysqli_query($enlace,$sql);
          		if ($fila = mysqli_fetch_array($resultado))
          			$id_rol=$fila["ID_ROL"];
          		else
          			$id_rol=0;
	  $usu=new usuario();
	  $usu->usuario4($id);
	  $usu->setLogin($_POST["login"]);
	  if (strlen($_POST["password"])>0)
	  	$usu->setPassword($_POST["password"]);
	  
	  $usu->setNombre($_POST["nombre"]);
	  $usu->setApellido1($_POST["apellido1"]);
	  $usu->setApellido2($_POST["apellido2"]);
	  $usu->setTlf($_POST["tlf"]);
	  $usu->setEmail($_POST["email"]);
	  $hobbies[0]=$_POST["hobbie1"];
	  $hobbies[1]=$_POST["hobbie2"];
	  $hobbies[2]=$_POST["hobbie3"];
	  $usu->setHobbies2($hobbies);
	  $usu->setCultura($_POST["cultura"]);
	  $usu->setEdad($_POST["edad"]);
	  $usu->setId_Universidad($_POST["universidad"]);

	 
	  $usu->Modificar();
	  if ($id_rol==2)
	   	echo "<script>window.location.href='http://localhost/php/usuario.php?id=". $id ."';</script>";
	   else
	   		echo "<script>window.location.href='http://localhost/php/arrendatario.php?id=". $id ."';</script>";
	   
	   	
	  ?>