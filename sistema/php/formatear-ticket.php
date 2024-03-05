<?php
require 'conexion.php';

if(isset($_POST['cerrar'])){
    $consulta ="DELETE FROM ticket WHERE idpersonal";
    $resultado =mysqli_query($conexion, $consulta);

    if($resultado){
       
        $consulta_delete_invitado ="UPDATE  invitados SET estatus_invi = '0' ";
        $resultado_invitado = mysqli_query($conexion, $consulta_delete_invitado);

        if($resultado_invitado){
            $consulta_update ="DELETE FROM pedir_comida WHERE idcomer";
            $resultado_update = mysqli_query($conexion, $consulta_update);

            if($resultado_update){
                header('Location: ../registro-ticket.php');
            }
        }       
    }
}else{
    ?>
    <h5>NO SE RESIBIO NINGUN DATO</h5>
    <?php
}


 
?>
