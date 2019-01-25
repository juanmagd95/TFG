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
echo "<script>function abrir2(){window.location.href='http://localhost/php/ver_apartamentos.php?id=" . $id . "';}</script>";
?>

<?php
echo "<script>function abrir3(){window.location.href='http://localhost/html/registro_apartamento.php?id=" . $id . "';}</script>";
?>
<?php
echo "<script>function abrir4(){window.location.href='http://localhost/php/eliminar_usuario.php?id=" . $id . "';}</script>";
?>
<?php
echo "<script>function abrir5(){window.location.href='http://localhost/php/ver_peticiones_alquiler.php?id=" . $id . "';}</script>";
?>

<link rel='stylesheet' type='text/css' href='../Estilos/arrendatario.css'>
</head>

<body>
<button  onclick="JavaScript:abrir();">Ver/Modificar Datos</button>
<button  onclick="JavaScript:abrir2();">Ver  mis apartamentos</button>
<button  onclick="JavaScript:abrir3();">Registrar apartamento</button>
<button  onclick="JavaScript:abrir5();">Ver peticiones de alquiler</button>
<div>
<button  onclick="JavaScript:abrir4();">Darse de baja</button>
</div>

</body>

</html>

