<?php 
include('clases/alquiler.php');
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
$sql="SELECT ID_ALQUILER FROM alquileres WHERE ID_APARTMENT =" . $id_apart;
$resultado = mysqli_query( $enlace, $sql);

	

	if (!$resultado) {
    		echo "Error de BD, no se pudo consultar la base de datos\n";
    		echo mysqli_error($enlace);
    		
    		exit;
	}
	if (mysqli_num_rows($resultado))
	$fila=mysqli_fetch_assoc($resultado);
	$id_alquiler=$fila["ID_ALQUILER"];
$alquiler=new alquiler();
$alquiler->alquiler3($id_alquiler);
$alquiler->Borrar();
echo "<script>window.location.href='http://localhost/php/usuario.php?id=" . $id . "';</script>";

?>