<?php
include("php/conexion.php");
$usuario = $_SESSION['usuario'];

if(!isset($usuario)){
  header("location: ../index.php");
}
$consulta_usuario = "SELECT * FROM usuario INNER JOIN rol ON usuario.idrol = rol.idrol  WHERE usuario='".$usuario."' ";
$resultado_usuario = $conexion->query($consulta_usuario);

while ($data=$resultado_usuario->fetch_assoc()){
  $id = $data['idusuario'];
  $cedula_usuario= $data['cedula_usuario'];
  $usuario = $data['usuario'];
  $contraseña = $data['contraseña'];
  $idrol = $data['idrol'];
  $rol = $data['rol'];
}
?>