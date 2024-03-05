<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inces</title>
    <!--estilos-->
    <link rel="stylesheet" href="sistema/css/bootstrap.min.css">
    <link rel="stylesheet" href="sistema/css/index.css">
    <script src="sistema/js/libreriasJS/sweetalert2.all.min.js"></script>
    <!--Icono De La Pagina -->
    <link rel="icon" href="./sistema/include/inces.png">
</head>

<body>
    <div class="container d-flex justify-content-center ">
        <img class="img1" src="sistema/include/siscomara.png" alt="">
        <div class="fondo-contenedor d-flex justify-content-center align-items-center ">
            <div class="contenedor-central d-flex justify-content-center align-items-center ">
                <div class=" fondo d-flex flex-column justify-content-center align-items-center">
                    <form id="formulario" action="" method="post" autocomplete="off">
                        <!--input de usuario-->
                        <div class="mb-3 mt-5 input-group">
                            <span class="input-group-text" id="basic-addon1"><img src="sistema/icons/usuario-usuario.png" alt=""></span>
                            <input class="form-control" type="text" name="usuario" placeholder="Usuario"><br>
                        </div>
                        <!--input de contraseña-->
                        <div id="caja-passwaord" class="mb-3 input-group">
                            <span class="input-group-text" id="basic-addon1"><img onclick="cambiarimagen();" id="contraseña" src="sistema/icons/candado.png" alt=""></span>
                            <input id="input" class="form-control" type="password" name="contraseña" placeholder="Contraseña">
                        </div>
                        <!--boton de envio de datos -->
                        <div class="d-flex justify-content-center mt-4 mb-1">
                            <input type="submit" value="ACEPTAR" class="btn btn-danger" name="boton-aceptar">
                        </div>
                    </form>


                    <div class="fondo-imagenes d-flex mb-5 mt-4">
                        <img class="img2 " src="sistema/icons/venezuela.png" alt="">
                        <img class="img3" src="sistema/include/inces.png" alt="">
                    </div>
                    <!--barra inferior roja-->
                    <div class="rojo bg-danger"></div>
                </div>
            </div>
        </div>
    </div>
    <!--wave de fondo-->
    <section>
        <div class="wave"></div>
    </section>


    <script type="text/javascript">
        /*
     function SoloNumeros(e){
        var x = e.which || e.keycode;
        if((x >= 48 && x <=57))
        return true;
        else
        return false;
    }
*/
        //cambiar el input de password a text
        var contraseña = document.getElementById('contraseña');
        var input = document.getElementById('input');
        contraseña.addEventListener("click", function() {
            if (input.type == "password") {
                input.type = "text";

            } else {
                input.type = "password";

            }
        });
        //cambiar la imagen principal de ojo a ojo no visible 
        var fotomostrada = "ojo"

        function cambiarimagen() {
            var imagen = document.getElementById("contraseña");

            if (fotomostrada == "ojo") {
                imagen.src = "sistema/icons/candado-abierto2.png";
                fotomostrada = "visible";

            } else if (fotomostrada == "visible") {
                imagen.src = "sistema/icons/candado.png";
                fotomostrada = "ojo";
            }
        }
    </script>
</body>

</html>


<?php

session_start();

if (!empty($_POST)) {
    if (empty($_POST['usuario']) || empty($_POST['contraseña'])) {
?>
        <script type="text/javascript">
            Swal.fire({
                title: 'ERROR!',
                text: ' Por favor coloque un usuario y contraseña',
                icon: 'error',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#dc3545',
                footer: 'Para salir de la alarma presione el boton',
                timer: 4000
            });
        </script>
        <?php
    } else {

        $conexion = mysqli_connect("localhost", "root", "", "inces2");
        $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
        $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);
        $query = mysqli_query($conexion, "SELECT  * FROM usuario  WHERE usuario = '$usuario' AND contraseña = '$contraseña' AND  activo_us = 'activado' ");



        $_SESSION['usuario'] = $usuario;
        // verificar si este permiso ya existe en la base de datos /*
        $verificar_personal = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$usuario' AND contraseña = '$contraseña' AND  activo_us = 'desactivado' ");
        if (mysqli_num_rows($verificar_personal) > 0) {
        ?>
            <script type="text/javascript">
                Swal.fire({
                    title: 'ATENCIÓN !',
                    text: 'Este usuario esta desabilitado comunciate con los de recursos humanos o informática para habilitar este usuario ',
                    icon: 'warning',
                    confirmButtonText: false,
                    showConfirmButton: false,
                    timer: 7000
                })
            </script>
        <?php
            exit();
            mysqli_close($conexion);
        }
        $resultado = mysqli_num_rows($query);
        if ($resultado > 0) {

            header("location: sistema/principal.php");
            mysqli_close($conexion);
        } else {

        ?>
            <script type="text/javascript">
                Swal.fire({
                    title: 'Usuario o contraseña son erroneos',
                    icon: 'error',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#dc3545',
                    footer: 'Para salir de la alarma presione el boton ',
                    timer: 4000
                });
            </script>
<?php
            session_destroy();
        }
    }
}



?>