<?php
session_start();
include("php/conexion.php");
include("php/rol.php");

$cantidad_personal = current($conexion -> query("SELECT COUNT(idpersonal) AS personal FROM personal")->fetch_assoc()) ;
$cantidad_usuarios = current($conexion -> query("SELECT COUNT(idusuario) AS usuario FROM usuario")->fetch_assoc()) ;
$cantidad_tickets = current($conexion -> query("SELECT COUNT(idticket) AS tickets FROM ticket")->fetch_assoc()) ;
$cantidad_ausencia = current($conexion -> query("SELECT COUNT(idpermiso) AS ausencia FROM ausencia_justificada")->fetch_assoc()) ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!--Link de vinculacion-->
    
    <link rel="stylesheet" href="css/menus.css">
    <link rel="stylesheet" href="css/principal.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/botones.css">
    
  <!-- BootsTrap -->
<script src="js/libreriasJS/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="js/libreriasJS/sweetalert2.all.min.js"></script>
<!-- JQuery -->
<script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
    <!--Icono de la pagina-->
    <link rel="icon" href="include/inces.png">
</head>
<body>
<?php 
include("include/header.php");

?> 

<div class="contenedor_primario d-flex justify_content_center ">
  <?php
  require_once "./manualUsuario.php";
  ?>
   <div class="tabla d-flex justify-content-center align-items-center ">
      <h1 class=" text-center me-3 mt-5">
      ! Bienvenido 
      </h1>
      <h2 id="h2_usuario" class="text-center mt-5"> 
        <?php  echo $usuario?>
    </h2>
  </div>
  <?php
  require_once "./botonesUsuario.php";
  ?>
 
  <section class="section_datos d-flex justify-content-center">
    <div class="separador">
      <div class="container-fluid d-flex justify-content-center bg-danger p-2 text-white " >
        Datos De Usuario
      </div>
        <div class="contenedor_formulario_principal mb-2">
          <div class=" input-group  ">
            <label class="" for="rol">Rol</label>
            <span class="input-group-text" ><img src="icons/grupo1.png" alt="" ></span>
            <input class="form-control" id="rol" type="text" value="<?php echo $rol?>" readonly><br>
          </div>

          <div class=" input-group  ">
            <label class="mt-3" for="usuario">Usuario</label>
            <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt="" ></span>
            <input class="form-control" id="usuario" type="text" value="<?php echo $usuario?>" readonly><br>
          </div>

          <div class=" input-group  ">
            <label class="mt-3 " for="contraseña">Contraseña</label>
            <span class="input-group-text" ><img  src="icons/candado.png" onclick="cambiarimagen();" id="contraseña" alt="" ></span>
            <input class="form-control" id="input" type="password" value="<?php echo $contraseña?>" readonly><br>
          </div>
        </div>
    </div>

    <form class="separador" action="" method="POST">
      <div class="container-danger d-flex justify-content-center bg-danger p-2 text-white">
        Actualizar Datos
      </div>
        <div class="contenedor_formulario_principal">
          <input type="text" value="<?php echo $id;?>" id="identificardor-usuario" name="id-usuario">
          <div class=" input-group  ">
            <label class="" for="contraseña-actual">Contraseña actual</label>
            <span class="input-group-text" ><img id="contraseña2"  onclick="cambiarimagen2();" src="icons/candado.png" alt="" ></span>
            <input class="form-control" id="contraseña-actual" type="password" name="contraseña-actual" placeholder="Contraseña Actual"><br>
          </div>

          <div class=" input-group  mb-2">
            <label class="mt-3 " for="nueva-contraseña">Nueva Contraseña</label>
            <span class="input-group-text" ><img  id="contraseña3"  onclick="cambiarimagen3();" src="icons/candado.png" alt="" ></span>
            <input class="form-control" id="nueva-contraseña" type="password" name="contraseña-nueva" placeholder="Nueva Contraseña"><br>
          </div>
          <div>
            <input class="boton-actualizar" name="boton_actualizar" type="submit" value="Actualizar" name="boton-actualizar">
          </div>
        </div>
    </form>
    
  </section>

  <footer class="contenedor-upta d-flex ">
    <div>
      <p>&copy Universidad Politécnica Territorial de Aragua Federico Brito Figuero(UPTA).</p>
      <p>&copy INCES la Romana</p>
    </div>
  </footer>
</div>
<!-- Cerrar sesion -->
<script src="js/cerrar-session.js"></script>
<script src="./js/principal.js"></script>
<script src="js/todo.js"></script>
<script src="js/menu_2.0.js"></script>
<script src="./js/fechaActualAS.js"></script>
</body>
</html>
<?php


if (isset($_POST['boton_actualizar'])) {
  if (empty($_POST['contraseña-actual']) || empty($_POST['contraseña-nueva'])  ) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          title: 'VERIFICAR!!',
          icon: 'warning',
          confirmButtonText: false,
          showConfirmButton: false,
          html:'Verifique si cada campo para actualizar la contraseña fue llenado ',
          timer: 4000
                          
          })
        </script>
    <?php
     exit();
  }else{
    $id_usuario= $id;
    $contraseñaActual = $_POST['contraseña-actual'];
    $contraseñaNueva = $_POST['contraseña-nueva'];

    $consultaCambioClave = ("UPDATE usuario SET contraseña='$contraseñaNueva '
     WHERE idusuario='$id_usuario' AND contraseña = '$contraseñaActual' ");


    $claveactual = "SELECT contraseña FROM usuario WHERE  contraseña = '$contraseñaActual' ";
    $resultadoclaveactual = mysqli_query($conexion, $claveactual);

    if (mysqli_num_rows ($resultadoclaveactual) > 0) {
              $resultadosCambioClave =  mysqli_query($conexion, $consultaCambioClave);

            if ($resultadosCambioClave) {
              ?>
              <script type="text/javascript">
                Swal.fire({
                  title: 'Actualizacion Exitosa',
                  icon: 'success',
                  allowOutsideClick: false,
                  allowEnterKey: false,
                  confirmButtonText: false,
                  showConfirmButton: false,
                  html:'La contraseña de su usuario se actualizó correctamente, para cerrar la alerta dele click al boton <b>Aceptar</b> ',
                    footer:'<a class="boton-alerts-verde" href="principal.php">ACEPTAR</a>',
                                  
                  })
                </script>
            <?php



            }
    }else{
      ?>
      <script type="text/javascript">
        Swal.fire({
          title: 'ERROR !',
          icon: 'error',
          confirmButtonText: false,
          showConfirmButton: false,
          html:'La contraseña no se logro cambiar, por favor verifique si coloco la contraseña actual de su usuario correctamente. ',
          timer: 6000
                          
          })
        </script>
    <?php
    }
  }
  
}
?>


