
<?php
session_start();
require 'conexion.php';
require 'rol.php';


$id_usuario= $id;
$contraseñaActual = $_POST['contraseña-actual'];
$contraseñaNueva = $_POST['contraseña-nueva'];

$consultaCambioClave = ("UPDATE usuario SET contraseña='$contraseñaNueva '
 WHERE idusuario='$id_usuario' ");
$resultadosCambioClave =  mysqli_query($conexion, $consultaCambioClave);

if ($resultadosCambioClave) {
	header('Location: ../principal.php');
}else{
	?>
	<<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
	</head>
	<body>
	  <h6>El CAMBIO DE CONTRASEÑA NO SE LOGRO REALIZAR </h6>
	</body>
	</html>
	<?php
}

?>
