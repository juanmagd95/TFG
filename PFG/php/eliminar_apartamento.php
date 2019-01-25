<?php 
include('clases/apartamento.php');
include('clases/aplicacion.php');
$id=$_GET["id"];
$id_apartamento=$_GET["id_apart"];
if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db($enlace, 'mydb' )) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}
			
			$sql = "SELECT ID_APPLICATION FROM APPLICATIONS WHERE ID_APARTMENT = " . $id_apartamento ;
			
			$resultado = mysqli_query($enlace,$sql);

			while ($fila=mysqli_fetch_assoc($resultado)){
				$app=new aplicacion();
				$app->aplicacion3($fila["ID_APPLICATION"]);
				$app->Borrar();
			}

	  $apartamento=new apartamento();
	 
	  $apartamento->apartamento3($id_apartamento);
	  $apartamento->Borrar();
	  echo "<script>window.location.href='http://localhost/php/arrendatario.php?id=". $id ."';</script>";
?>