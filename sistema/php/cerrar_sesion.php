<?php

session_start();//inicia en esta pagina la sesion dada
session_unset();//libera todas las variables de sesion
error_reporting(0);
$sesion = $_SESSION['usuario'];

if ($sesion == null || $sesion = '') {
    ?>
    <!DOCTYPE html>
      <head>
      <title>Inicio</title>
      <link rel="icon" href="../include/inces.png">
      <script src="../js/libreriasJS/sweetalert2.all.min.js"></script>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
       <link rel="stylesheet" href="../css/botones.css">
      </head>
      <body>
        <script type="text/javascript">
         Swal.fire({
          title: 'LISTO! SESION CERRADA EXITOSAMENTE',
          html: 'por favor haga click en el boton <b>CERRAR</b> para cerrar ',
          icon: 'success',
          allowOutsideClick: false,
          allowEnterKey: false,
          confirmButtonText: false,
          showConfirmButton: false,
          footer:'<a href="../../index.php<?php session_destroy(); // destruye la sesion iniciada?>" class="boton-alerts-verde">CERRAR</a>'
        })
        
             
        </script>                                 
      </body>
      <?php
    die("");
    
}

header("location: ../../index.php");
?>