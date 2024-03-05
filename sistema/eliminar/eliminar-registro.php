<?php
session_start();
include("../php/conexion.php");
require '../php/rol.php';
date_default_timezone_set("America/Caracas");
// capturar datos enviados 
    $id_eliminado=$_GET['idper'];
    $nombre=$_GET['nombre'];
    $apellido=$_GET['apellido'];
    $cedula=$_GET['cedula'];
    $sede=$_GET['dependencia'];
    $estatus=$_GET['estatus2'];
    $deshabilitar = 0;
// Generar fechas y hora automatica para el guardado 
//automatico en la base de datos 
    $fecha_eli = date("d-m-Y");
    $hora_eli = date("h:i:s:a");
// capturar el usuario que este eliminando a esta persona
    $usuario_eliminador = $usuario;
    $cedula_usuario_eliminador =  $cedula_usuario;


// consulta SQL para tranferir a esa persona a la tabla de personal eliminado 
    $sql_eliminados="INSERT INTO personal_eliminado( idpersonal, usuario_eli, usuario_cedula_eli, fecha_eli, hora_eli)
    VALUES ('$id_eliminado', '$usuario_eliminador','$cedula_usuario_eliminador','$fecha_eli', '$hora_eli')";
    $resultado=mysqli_query($conexion, $sql_eliminados);
    
    
    if ($resultado) {
        // HAORA SI despues de tranferir a esta persona y pasar sus datos 
        //a la tabla de eliminados la vamos ahora si eliminar de la tabla personal 
        $sql_delete="UPDATE personal SET activo='$deshabilitar' WHERE idpersonal= $id_eliminado";
        $query=mysqli_query($conexion, $sql_delete);
            if($query){
                header("location: ../tabla-registro.php");
       }
       
    }
       





?>