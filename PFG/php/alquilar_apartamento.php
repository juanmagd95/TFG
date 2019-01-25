<?php 
	include('clases/alquiler.php');
	$id=$_GET["id"];
	if(strlen($id)==0 || $_GET["id"]=="undefined")
		echo "<script>alert('Debe iniciar sesión o registrarse');window.location.href='busqueda_apartamento.php';</script>";
	else{
		$id=$_GET["id"];
		$id_apart=$_GET["id_apart"];
		if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
		}

		if (!mysqli_select_db( $enlace, 'mydb')) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
		}

		$sql = "SELECT ID_USER FROM APPLICATIONS WHERE ID_APARTMENT = " . $id_apart;
		$resultado = mysqli_query( $enlace, $sql);

	

	if (!$resultado) {
    		echo "Error de BD, no se pudo consultar la base de datos\n";
    		echo mysqli_error($enlace);
    		
    		exit;
	}
	
	
		$fila=mysqli_fetch_assoc($resultado);
		$id_arrendatario=$fila["ID_USER"];
		$estado=0;
		$alquiler=new alquiler();
		$alquiler->alquiler2($id,$id_arrendatario, $id_apart, $estado);
		$alquiler->Insertar();
		echo "<script>window.location.href='http://localhost/php/usuario.php?id=" .$id ."';</script>";

	}
		