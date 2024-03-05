<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/botones.css">
    </head>
    <body>
        <script src="../js/libreriasJS/jquery-3.6.3.min.js"></script>
        <script src="../js/libreriasJS/sweetalert2.all.min.js"></script>
    </body>
    </html>
<?php

$Administrador = $_GET['datos'];

if ($Administrador === "Administrador") {
    header("location: descargarbd.php");
}else{
    ?>
    
    <script type="text/javascript">
        Swal.fire({
        title: 'Sucedio un problema!',
        icon: 'question',
        allowOutsideClick: true,
        allowEnterKey: true,
        confirmButtonText: false,
        showConfirmButton: false,
        html:'Para salir de la pagina haga click en el boton <b>Regresar</b>',
        footer:'<button class="boton-alerts-verde me-2" id="Regresar">Regresar</button>',
        timer: 10000000000000
                          
      });

            //Redireccionar a la pagina principal
            var BotonDescargarBD = document.getElementById("Regresar");
            BotonDescargarBD.addEventListener('click', function(){
            window.location.href = "../principal.php";
            });
            
            
    </script>
    <?php
}
