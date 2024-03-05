<?php
//incluir la conexion a la base de datos 
include("../php/conexion.php");

//teniendo identificador de la ausencia para borrar el usuario registrado
//como ausente
$id=$_GET['tabla'];

//generar peticion para el eliminado de dicho identificador 
$sql=("DELETE FROM ausencia_justificada WHERE idpermiso='".$id."'");
$query=mysqli_query($conexion, $sql);
 if($query){
   header('location: ../tabla-ausencia.php');
 }

 
?>
