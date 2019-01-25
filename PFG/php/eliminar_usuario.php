<?php 
include('clases/usuario.php');
include('clases/aplicacion.php');

$id=$_GET["id"];
if (!$enlace = mysqli_connect("localhost", "root", "")) {
    			echo 'No pudo conectarse a mysql';
   				exit;
			}

			if (!mysqli_select_db($enlace, 'mydb' )) {
    			echo 'No pudo seleccionar la base de datos';
    			exit;
			}
			
			$sql = "SELECT ID_APPLICATION FROM APPLICATIONS WHERE ID_USER = " . $id ;
			
			$resultado = mysqli_query($enlace,$sql);

			while ($fila=mysqli_fetch_assoc($resultado)){
				$app=new aplicacion();
				$app->aplicacion3($fila["ID_APPLICATION"]);
				$app->Borrar();
			}

$usu=new usuario();
$usu->usuario4($id);
$usu->Borrar();
 echo "<script>window.location.href='http://localhost';</script>";

?>