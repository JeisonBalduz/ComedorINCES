<?php

include("../php/conexion.php");
if(isset($_GET['boton-habilitar'])){

        $id=$_GET['tabla'];
        $activo= "activado";
        echo $id;
        
        $consulta1 ="UPDATE usuario SET activo_us='$activo' WHERE idusuario = '$id'";
        $resultadoeditar1 = mysqli_query($conexion, $consulta1);
    if($resultadoeditar1){
        ?>
        <script type="text/javascript">
            Swal.fire({
                    title: 'Estas seguro de habilitar a este usuario?',
                    icon: 'warning',
                    allowOutsideClick: true,
                    allowEnterKey: true,
                    confirmButtonText: false,
                    showConfirmButton: false,
                    html:'Para culminar de habilitar al usuario presione el boton <b>si</b>',
                    footer:'<button class="boton-alerts-verde me-2" id="campo">Si !</button><button class="boton-alerts-gris" id="cancelar-boton-habilitar">Cancelar</button>'                
                });
        </script>
            
        <?php
    }
}
?>