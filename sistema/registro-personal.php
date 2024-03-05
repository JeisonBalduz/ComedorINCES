<?php
session_start();
include("php/rol.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
     <!--CSS De Bootstrap-->
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--CSS Del Tabla-Registo-->
    <link rel="stylesheet" href="css/registro-personal.css">
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
<?php include("include/header.php");?>

<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex ">
  <div id="contenedor-segundario"class="contenedor-segundario  container-fluid">
        <div class="tabla container-fluid d-flex justify-content-center bg-danger ">
            <h4 class="text-white me-3">R E G I S T R O</h4>
            <h4 class="text-white me-3">D E</h4>
            <h4 class="text-white">P E R S O N A L</h4>
        </div>
        <!-- Formulario -->
        <form action="" method="POST" class="formulario container-fluid text-center">
          <!-- Nombre -->
          <div class="input-group " id="contenedor-input">
            <label class="mt-3 label-input" for="">Nombre</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/usuario-usuario.png" alt=""></span>
            <input minlength="3" maxlength="20"class="form-control input-input" id="nombre" type="text"  onkeypress="return soloLetras(event);" name="nombre" placeholder="Nombre" pattern="[a-zA-Z]+" autocomplete="off" onkeyup="convertirTexto()"><br>
          </div>
          <!-- Apellido -->
          <div class="input-group ">
            <label class="mt-3 label-input" for="">Apellido</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/usuario-usuario.png" alt=""></span>
            <input minlength="3" maxlength="20" class="form-control " type="text"  onkeypress="return soloLetras(event);"  id="apellido" disabled name="apellido" placeholder="Apellido" require="" pattern="[a-zA-Z]+" autocomplete="off" onkeyup="convertirTexto()"><br>
          </div>
          <!-- Cedula --> 
          <div class="input-group conten-input"id="contenedor-input">
            <label class="mt-3 label-input" for="">Cédula</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/cedula2.png" alt=""></span>
            <input minlength="6" maxlength="10" id="cedula" onkeypress="return SoloNumeros(event)" disabled class="form-control input-input " type="text" name="cedula" placeholder="Cédula" autocomplete="off"><br>
          </div>
           <!-- Correo -->
           <div class="input-group">
            <label class="mt-3 label-input" for="">Correo</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/email.png" alt=""></span>
            <input class="form-control " id="correo" type="email" name="correo" placeholder="Correo" require="" disabled autocomplete="off"><br>
          </div>
          <!-- Dependencia -->
          <div class="input-group">
            <label class="mt-3 label-input" for="">Dependencia</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/sede-sede.png" alt=""></span>
            <select class="form-control" type="text" id="sede" name="sede" disabled>
            
                <?php
                    $getclientes1 = "SELECT * FROM sedes ";
                    $resultado = mysqli_query($conexion, $getclientes1);
                        while($row = mysqli_fetch_array($resultado))
                    {
                      
                        $nombre = $row['sede'];
                        $id_sede = $row['idsede'];
                    ?>
                        <option value="<?php echo $id_sede?>"> <?php echo $nombre;?></option>
                    <?php
                    }
                ?>
            </select>
          </div>
          <!-- Estatus -->
          <div class="input-group" id="contenedor-input">
            <label class="mt-3 label-input" for="">Estatus</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/grupo1.png" alt=""></span>
            <select class="form-control input-input" type="text" id="estatus" name="estatus" disabled>
              
                <?php
                    $estatus = "SELECT * FROM estatus ";
                    $resultado = mysqli_query($conexion, $estatus);
                        while($row = mysqli_fetch_array($resultado))
                    {
                        $estatus = $row['estatus'];
                        $idestatus = $row['idestatus'];
                    ?>
                        <option class="" value="<?php echo $idestatus?>"> <?php echo $estatus;?></option>
                    <?php
                    }
                ?>
            </select>
          </div>
         
           <!-- BOTON -->
          <div class="contenedor-boton mt-3 mb-3 d-flex justify-content-center ">
            <input class="boton-eliminar"  value="Registrar" type="submit" name="boton-aceptar"><br>
          </div>
           
          </form>     
  </div>
  <footer class="contenedor-upta d-flex ">
    <div>
      <p>&copy Universidad Politécnica Territorial de Aragua Federico Brito Figuero(UPTA).</p>
      <p>&copy INCES la Romana</p>
    </div>
  </footer>
</div>

<!-- BootsTrap -->
<script src="js/libreriasJS/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="js/libreriasJS/sweetalert2.all.min.js"></script>
<!-- JQuery -->
<script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
<!-- Todos los eventos para los input-->
<script src="js/todo.js"></script>
<!-- JS De registro de personal-->
<script src="js/registro-personal.js"></script>
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>

<!-- PHP Para guiardar al personal -->
<?php
            if(isset($_POST['boton-aceptar'])){
             
                if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['cedula'])
                || empty($_POST['correo']) ) {
                  ?>
                    <script type="text/javascript">
                         Swal.fire({
                          title: 'VERIFICAR !',
                          text:'Verifique si cada campo esta lleno',
                          icon: 'warning',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 3500
                        })  
                    </script>
                  <?php
                }else{
                  include("php/conexion.php");
                  date_default_timezone_set("America/Caracas");
                  
                  $personal= $_POST['nombre'];
                  $apellido = $_POST['apellido'];
                  $cedula = $_POST['cedula'];
                  $correo = $_POST['correo'];
                  $sede =  trim($_POST['sede']);
                  $estatus = $_POST['estatus'];
                  $fecha = date("Y/m/d");
                  $hora = date("h:i:s:A");
                  $cedulausuario = $id;
                  $activar = 1;
                  
                  

                  $consulta_registro ="INSERT INTO personal (nombre, apellido, cedula, correo, idsede, idestatus, fecha, hora, activo, id_usuario)
                  VALUES ('$personal', '$apellido', '$cedula', '$correo', '$sede', '$estatus', '$fecha', '$hora', '$activar', '$cedulausuario')";

                  $verificar_personal= mysqli_query($conexion, "SELECT * FROM personal WHERE cedula='$cedula' ");
                  if(mysqli_num_rows($verificar_personal) > 0){
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'Esta Persona ya fue registrada con esta cédula de identidad',
                          icon: 'error',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        })  
                         
                    </script>
                    <?php
                    exit();
                  }
                  
                  $conexion->query("SET @autoid := 0");
                  $conexion->query("UPDATE personal SET idpersonal = (@autoid := @autoid + 1)");
                  $conexion->query("ALTER TABLE personal  AUTO_INCREMENT = 1");
                  
                  $resultado_registro = mysqli_query($conexion, $consulta_registro);

                  if($resultado_registro ){
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'Persona registrada con exito !!',
                          icon: 'success',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        })  
                    </script>
                    <?php
                  }else{
                    ?>
                      <h3 class="envioN"> !FORmulario nal¡</h3>
                    <?php
                  }
                  
                } 
              }
            
  ?>

</body>
</html>