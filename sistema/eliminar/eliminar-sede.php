<?php
//conexion a la base de datos 
include("../php/conexion.php");

//identificador de sede
$id=$_GET['idsede'];
$estado_desactivado= 0;

//eliminar identificador de la sede 
$sql=("UPDATE sedes SET estado_sede = '$estado_desactivado' WHERE idsede = '$id'");
$query=mysqli_query($conexion, $sql);
 if($query){
   header('location: ../registo-sede.php');
 }

 
   




?>