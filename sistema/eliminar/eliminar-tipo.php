<?php
//conexion a la base de datos 
include("../php/conexion.php");

//identificador del tipo para borrar en su tabla 
    $id=$_GET['idestatus'];
    //peticion sql para borrar el identificador 
    $sql="DELETE FROM estatus WHERE idestatus=$id";
    $query=mysqli_query($conexion, $sql);
    if($query){
        header("location: ../registro-tipo.php");
    }else{
        echo 'no';
    }




?>