<?php

//conexion a la base de datos 
include("../php/conexion.php");

//identificador del tipo para borrar en su tabla 
    $id=$_GET['permisos'];
    //peticion sql para borrar el identificador 
    $sql="DELETE FROM permisos WHERE idpermisos_aj =$id";
    $query=mysqli_query($conexion, $sql);
    if($query){
        header("location: ../registro-ausencia.php");
    }else{
        echo 'no';
    }



   





?>