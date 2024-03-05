<?php

include("../php/conexion.php");
            $id=$_GET['idper'];
            $activo= 1;
            echo $id;
            
            $consulta1 ="UPDATE personal SET activo='$activo' WHERE idpersonal = '$id'";
            $resultadoeditar1 = mysqli_query($conexion, $consulta1);

            $consulta2 ="DELETE FROM personal_eliminado WHERE idpersonal = '$id' ";
            $resultadoeditar2 = mysqli_query($conexion, $consulta2);
if($resultadoeditar1){
    if($resultadoeditar2){
        header('location: ../tabla-eliminados-registros.php');
    }else{
        echo '
        TUVIMOS PROBLEMAS PARA ELIMINAR A ESTE USUARIO 
        DE ESTA TABLA PERO YA SE HABILITO EN LA TABLA 
        DE PERSONAL
        ';
    }

}else{
    echo 'TUVIMOS PROBELMAS PARA HABILITAR 
    A ESTA PERSONAL ';
}
?>