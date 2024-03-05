<?php
//conexion a la base de datos 
include("../php/conexion.php");
//identificador del usuario creado 
    $id=$_GET['id'];
    $desactivar = 0;
    //eliminar identificador de la tabla usuarios 
    $sql="UPDATE usuario SET activo_us='$desactivar' WHERE idusuario=$id";
    $query=mysqli_query($conexion, $sql);
    if($query){
        header("location: ../tabla-usuario.php");
    }





?>