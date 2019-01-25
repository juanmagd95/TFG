<?php $id=$_GET["id"];
?>
<!DOCTYPE HTML>
<html>
<head>

<meta charset="UTF-8">

<?php
echo "<script>function abrir(){window.location.href='http://localhost/php/ver_usuario.php?id=" . $id . "';}</script>";
?>

<?php
echo "<script>function abrir2(){window.location.href='http://localhost/php/eliminar_usuario.php?id=" . $id . "';}</script>";
?>
<?php
echo "<script>function abrir3(){window.location.href='http://localhost/php/busqueda_apartamento.php?id=" . $id . "';}</script>";
?>

<?php
echo "<script>function abrir4(){window.location.href='http://localhost/php/ver_peticiones.php?id=" . $id . "';}</script>";
?>
<link rel='stylesheet' type='text/css' href='../Estilos/usuario.css'>
</head>

<body>
<button  onclick="JavaScript:abrir();">Ver/Modificar Datos</button>
<button  onclick="JavaScript:abrir3();">Buscar Apartamentos</button>
<button  onclick="JavaScript:abrir4();">Ver peticiones pendientes</button>
<div>
<button  onclick="JavaScript:abrir2();">Darse de baja</button>
</div>
</body>

</html>

