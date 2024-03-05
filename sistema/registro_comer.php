<?php
require 'php/conexion.php';
session_start();
include("php/rol.php");
require 'php/conexion.php';
date_default_timezone_set("America/Caracas");
$hora=date("H:i:s");
$horaalerta=date("h:i:s:A");
$hora2=("10:32:00");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro De Pedir Comida</title>
    <!--CSS De Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--CSS Del Tabla-Registo-->
    <link rel="stylesheet" href="css/registro-comer.css">
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
<?php include("include/header.php");?>

<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex ">
  <div id="contenedor-segundario" class="contenedor-segundario d-flex justify-content-center align-items-center">
        <div class="tabla container-fluid d-flex justify-content-center bg-danger p-2">
            <h4 class="text-white me-3">P E T I C I Ó N</h4>
            <h4 class="text-white me-3">D E</h4>
            <h4 class="text-white">C O M I D A</h4>
        </div>
      <div class="formulario">
        <!-- Formulario -->
        <form action="" method="post" class=" text-center">
                <!-- Cedula --> 
            <div class="input-group "id="contenedor-input">
                <label class="mt-3 label-input" for="">Cédula</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/cedula2.png" alt=""></span>
                <input list="browsers" type="text" name="cedula" class="form-control" id="cedula" placeholder="Cédula"onkeypress="buscar_datos_teclado()" onkeypress="return SoloNumeros(event);" autocomplete="off"><br>
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
             <!-- identificador de la persona --> 
             <div class=" input-group" id="contenedor_identificador">
                <label class="mt-3 " for="">Identificador </label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/cedula2.png" alt=""></span>
                <input type="text" name="identificador" class="form-control" id="identificador" placeholder="identificador" autocomplete="off" ><br>
              </div>
            <!-- Nombre -->
            <div class="input-group " id="contenedor-input">
                <label class="mt-3 label-input" for="">Nombre</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/usuario-usuario.png" alt=""></span>
                <input class="form-control" id="nombre" type="text"  name="nombre" placeholder="Nombre"  readonly><br>
            </div>
            <!-- Apellido -->
            <div class="input-group label-input me-3">
                <label class="mt-3" for="">Apellido</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/usuario-usuario.png" alt=""></span>
                <input class="form-control input-input" type="text" id="apellido" name="apellido" placeholder="Apellido"  readonly><br>
            </div>
            
            <!-- Sede -->
            <div class="input-group">
                <label class="mt-3 label-input" for="">Dependencia</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/sede-sede.png" alt=""></span>
                <input  id="sede" class="form-control  " type="text" name="sede" placeholder="Dependencia" readonly><br>
            </div>
            <!-- Estatus -->
            <div class="input-group" id="contenedor-input">
                <label class="mt-3 label-input" for="">Estatus</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/grupo1.png" alt=""></span>
                <input  id="estatus" class="form-control input-input" type="text" name="estatus" placeholder="Estatus" readonly><br>
            </div>
            <div>

            </div>
            
            <!-- BOTON -->
            <div class="contenedor-botones mt-3 d-flex  justify-content-center ">
                <input type="button" value="BUSCAR" class="boton-verde me-2" id="buscar" name="btn_enviar" onclick="buscar_datos();">
                <input class="boton-dependencia" type="submit" name="boton-comer" value="COMER"><br>
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
<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
<!-- Todos los eventos para los input-->
<script src="js/todo.js"></script>
<!-- JS De registro de personal-->
<script src="js/registro-personal.js"></script>
<script src="js/reloj.js"></script>
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
<script src="js/todo.js"></script>

</body>
</html>
<?php
            if(isset($_POST['boton-comer'])){
              if(!empty($_POST)){
                if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['cedula'] ) || empty($_POST['sede'] ) 
                || empty($_POST['estatus'] )   ) {
                  ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'VERIFICAR!',
                          text: 'Verifique si cada campo este respectivamente lleno',
                          icon: 'warning',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        });
                    </script>
                  <?php
                }else{
                  
                  $identificador = $_POST['identificador'];
                 
                  $fecha = date("d/m/y");
                  $hora = date("h:i:s:A");
                  $per_ticket = 1;
                  $identificador_usuario = $id;
                  $consulta_comer ="INSERT INTO pedir_comida(idpersonal, pd_ticket, id_usuario) VALUES ('$identificador','$per_ticket','$identificador_usuario') ";
                  
                  $verificar_habilitado= mysqli_query($conexion, "SELECT * FROM personal_eliminado WHERE  idpersonal='$identificador'");
                  if(mysqli_num_rows($verificar_habilitado) > 0){
                      ?>
                      <script type="text/javascript">
                        Swal.fire({
                          title: 'ALERTA !!',
                          text:'Esta persona esta deshabilitada del sistema Siscomara',
                          icon: 'info',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        }) ;
                           $('#nombre').value('');
                           $('#apellido').value('');
                            $('#cedula').value('');
                            $('#correo').value('');
                           $('#sede').value('');
                            $('#estatus').value('');
                       </script>
                      <?php
                  exit();
                  }
                $verificar_permiso= mysqli_query($conexion, "SELECT * FROM ausencia_justificada WHERE  idpersonal='$identificador'");
                  if(mysqli_num_rows($verificar_permiso) > 0){
                      ?>
                      <script type="text/javascript">
                        Swal.fire({
                          title: 'ALERTA !!',
                          text:'Esta persona esta de permiso no se puede realizar su pedido',
                          icon: 'warning',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        }) ;
                           $('#nombre').value('');
                           $('#apellido').value('');
                            $('#cedula').value('');
                            $('#correo').value('');
                           $('#sede').value('');
                            $('#estatus').value('');
                       </script>
                      <?php
                  exit();
                  }
                $verificar_peticion_comida= mysqli_query($conexion, "SELECT * FROM pedir_comida WHERE idpersonal = '$identificador' AND pd_ticket='$per_ticket'");
                if(mysqli_num_rows($verificar_peticion_comida) > 0){
                    ?>
                    <script type="text/javascript">
                         Swal.fire({
                          title: 'ALERTA !!',
                          text:'Esta persona ya pidio su solicitud de comida',
                          icon: 'warning',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        }) ;
                         $('#nombre').value('');
                         $('#apellido').value('');
                          $('#cedula').value('');
                          $('#correo').value('');
                         $('#sede').value('');
                          $('#estatus').value('');
                     </script>
                    <?php
                exit();
                }

                $conexion->query("SET @autoid := 0");
                $conexion->query("UPDATE pedir_comida SET idcomer = (@autoid := @autoid + 1)");
                $conexion->query("ALTER TABLE pedir_comida AUTO_INCREMENT = 1");
                $resultado = mysqli_query($conexion, $consulta_comer);
                    if($resultado ){
                        ?>
                            <script type="text/javascript">
                                Swal.fire({
                                  title: 'LISTO !!',
                                  text:'Solicitud de comida realizada con total éxito',
                                  icon: 'success',
                                  confirmButtonText: false,
                                  showConfirmButton: false,
                                  timer: 4000
                              }) ;
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