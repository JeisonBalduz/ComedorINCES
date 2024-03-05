<?php

$db_host="localhost";
$db_name="root";
$db_pass="";
$db_user="inces2";


$conexion = mysqli_connect($db_host, $db_name, $db_pass, $db_user);
if (mysqli_connect_errno()) {
    echo "No se puedo conectar con la base de datos ";
    exit();
}

mysqli_select_db($conexion, $db_user) or die("No se encuentra la base de datos");
mysqli_set_charset($conexion, "utf8");


?>