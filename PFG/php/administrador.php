
<!DOCTYPE HTML>
<html>
<head>

<meta charset="UTF-8">

<?php
echo "<script>function abrir(){window.location.href='http://localhost/html/registro_rol.html';}</script>";
?>

<?php
echo "<script>function abrir2(){window.location.href='http://localhost/html/registro_universidad.php';}</script>";
?>

<?php
echo "<script>function abrir3(){window.location.href='http://localhost/html/registro_pais.html';}</script>";
?>

<?php
echo "<script>function abrir4(){window.location.href='http://localhost/html/registro_tipo_apartamento.html';}</script>";
?>
<?php
echo "<script>function abrir5(){window.location.href='http://localhost/php/ver_roles.php';}</script>";
?>

<?php
echo "<script>function abrir6(){window.location.href='http://localhost/php/ver_paises.php';}</script>";
?>
<?php
echo "<script>function abrir7(){window.location.href='http://localhost/php/ver_universidades.php';}</script>";
?>

<?php
echo "<script>function abrir8(){window.location.href='http://localhost/php/ver_tipos_de_apartamento.php';}</script>";
?>
<link rel='stylesheet' type='text/css' href='../Estilos/administrador.css'>
</head>

<body>
<div>
<button  onclick="JavaScript:abrir();">Registrar Rol</button>

<button  onclick="JavaScript:abrir3();">Registrar País</button>
<button  onclick="JavaScript:abrir2();">Registrar universidad</button>
<button  onclick="JavaScript:abrir4();">Registrar Tipo de apartamento</button>
</div>
<div>
<button  onclick="JavaScript:abrir5();">Ver Roles</button>
<button  onclick="JavaScript:abrir6();">Ver Países</button>
<button  onclick="JavaScript:abrir7();">Ver Universidades</button>
<button  onclick="JavaScript:abrir8();">Ver Tipos de apartamentos</button>
</div>
</body>

</html>
