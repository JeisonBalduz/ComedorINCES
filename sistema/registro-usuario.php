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
    <title>Registro De Usuario</title>
    <!--CSS De Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--CSS Del Tabla-Registo-->
    <link rel="stylesheet" href="css/crear-usuario.css">
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
<?php include("include/header.php");?>
<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex ">
  <div id="contenedor-segundario "class="contenedor-segundario d-flex align-items-center ">
      <div class="tabla container-fluid d-flex justify-content-center bg-danger ">
            <h4 class="text-white me-3">R E G I S T R O</h4>
            <h4 class="text-white me-3">D E</h4>
            <h4 class="text-white">U S U A R I O</h4>
        </div>
      <div class="formulario">
        <!-- Formulario -->
        <form action="" method="post" class="text-center">
            <!-- Cedula -->
          <div class=" input-group  ">
            <label class="mt-3" for="">Cédula</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/cedula2.png" alt=""></span>
            <input list="browsers" type="text" onkeypress="return SoloNumeros(event)" name="cedula" class="form-control" id="cedula" placeholder="Cédula" autocomplete="off" ><br>
            <datalist id="browsers">
                    <?php
                    $getclientes1 = "SELECT * FROM personal WHERE activo= '1' order by idpersonal ";
                    $resultado = mysqli_query($conexion, $getclientes1);
                        while($row = mysqli_fetch_array($resultado))
                    { 
                        $nombre_personal= $row['nombre'];
                        $nombre_apellido= $row['apellido'];
                        $cedula_personal = $row['cedula'];
                    ?>
                        <option  onclick="buscar_datos();" id="buscar" name="cedula" value="<?php echo $cedula_personal?> "> <?php echo $cedula_personal = $row['cedula']; echo " "; echo $nombre_personal; echo " ";echo $nombre_apellido;?></option>


                    <?php
                    }
                    ?>
            </datalist>    
          </div>
          <!-- Nombre -->
          <div class=" input-group  ">
            <label class="mt-3" for="">Nombre</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/usuario-usuario.png" alt=""></span>
            <input readonly class="form-control input" type="text" name="nombre" id="nombre" placeholder="Nombre"  autocomplete="off" readonly><br>
          </div>
          <!-- Apellido -->
          <div class="input-group ">
            <label class="mt-3" for="">Apellido</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/usuario-usuario.png" alt=""></span>
            <input readonly id="apellido" class="input-auto form-control input" type="text" name="apellido" placeholder="Apellido" require="" pattern="[a-zA-Z]+"><br>
          </div>
          
          <!-- Usuario --> 
          <div class=" input-group" id="contenedor_usuario">
            <label class="mt-3" for="">Usuario</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/usuario-usuario.png" alt=""></span>
            <input class="form-control input " type="text" name="usuario" id="usuario" placeholder="Usuario"  autocomplete="off"><br>
          </div>
           <!-- Contraseña --> 
          <div class=" input-group" id="contenedor_contraseña">
            <label class="mt-3" for="">Contraseña</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/contraseña.png" alt=""></span>
            <input class="form-control input " type="text" name="contraseña" id="contraseña" placeholder="Contraseña"  autocomplete="off" ><br>
          </div>
          <!--ROL-->
          <div class=" input-group" id="contenedor_roles">
            <label class="mt-3" for="">Roles</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/estatus.png" alt=""></span>
            <select class="form-control input" type="text" id="roles" name="rol">
            <?php
				      include "php/conexion.php";
                  $sql = $conexion -> query ("SELECT * FROM rol
                   ");
                  while ($row = $sql->fetch_assoc()) {
                    $rol = $row['rol'];
                    $id = $row['idrol'];
                    ?>
                     <option value="<?php echo $id?>"><?php echo $rol?></option>
                    <?php
                    
                  }
				      ?>
            </select>
          </div>
           <!-- BOTON -->
          <div class="mt-3 d-flex justify-content-center">
            <input type="button" value="Buscar" class="boton-buscar me-2" id="buscar" name="btn_enviar" onclick="buscar_datos();">          
            <input class="boton-generar_usuario  ps-3 pe-3" type="submit" name="boton-aceptar" id="enviar_usuario" value="Generar usuario"><br>      
          </div>
          </form>
      </div>  
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
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
<script src="js/reloj.js"></script>
<script src="js/menu_2.0.js"></script>
<script src="js/buscardatos.js"></script>
<script src="js/todo.js"></script>
</body>
</html>
<?php
            if(isset($_POST['boton-aceptar'])){
              if(!empty($_POST)){
                if (empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['contraseña'])) {
                  ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'VERIFICAR !!',
                          text:'Verifique si cada campo esta respectivamente lleno',
                          icon: 'warning',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 5000
                        })  
                    </script>
                  <?php
                }else{
                  include("php/conexion.php");
                  date_default_timezone_set("America/Caracas"); 

                  $nombre = $_POST['nombre'];
                  $usuario = $_POST['usuario'];
                  $contraseña = $_POST['contraseña'];
                  $cedula = $_POST['cedula'];
                  $rol = $_POST['rol'];
                  $fecha = date("Y/m/d");
                  $hora = date("h:i:s:A");
                
                  $activo = 'activado';
                  $consulta ="INSERT INTO usuario( usuario, contraseña, nombre, cedula_usuario, idrol, fecha_usuario, hora_usuario, activo_us) 
                  VALUES ('$usuario', '$contraseña','$nombre','$cedula', '$rol', '$fecha', '$hora', '$activo') ";

                  $verificar_personal= mysqli_query($conexion, "SELECT * FROM usuario WHERE cedula_usuario='$cedula' ");
                  if(mysqli_num_rows($verificar_personal) > 0){
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'ALERTA !!',
                          text:'Esta persona ya cuenta con un usuario',
                          icon: 'info',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        })  
                    </script>
                    <?php
                    exit();
                  }

                  $resultado = mysqli_query($conexion, $consulta);

                  if($resultado ){
                    ?>
                    <script type="text/javascript">
                         Swal.fire({
                          title: 'Enviado !!',
                          text:'Usuario creado exitosamente',
                          icon: 'success',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 3000
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
            }
?>

