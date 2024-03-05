<?php 
require 'conexion.php';

$consulta="ALTER SEQUENCE estatus RESTART WITH idestatus = 1";
$resultado=mysqli_query($conexion,$consulta);

if($resultado){
    echo "hola si se logro";
}else{
    echo "hola no se logro";
}


?>