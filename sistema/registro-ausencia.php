<?php
session_start();
include("php/rol.php");
date_default_timezone_set("America/Caracas");
date("d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro De Ausencia Justificada</title>
    <!--CSS De Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--CSS Del Tabla-Registo-->
    <link rel="stylesheet" href="css/registro-ausencia.css">
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
    <!-- JS SweetAlert2 -->
    <script src="js/libreriasJS/sweetalert2.all.min.js"></script>
    <!-- Bootstrap js-->
    <script src="js/libreriasJS/bootstrap.bundle.min.js"></script>
    <!-- JQuery-->
    <script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
<?php include("include/header.php");?>
<style>

</style>

<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex ">
  <div id="contenedor-segundario "class="contenedor-segundario d-flex justify-content-center align-items-center ">
        <div class="tabla container-fluid d-flex justify-content-center bg-danger p-2">
            <h4 class="text-white me-3">R E G I S T R O</h4>
            <h4 class="text-white me-3">D E</h4>
            <h4 class="text-white me-3">A U S E N C I A</h4>
            <h4 class="text-white ">J U S T I F I C A D A</h4>
        </div>
      <div class="formulario">
        
        <!-- Formulario -->
        <form  autocomplete="off" action="" method="POST" class="formulario_contenedor container-fluid">

          <div id="formulario">
             
              <!-- Cedula --> 
              <div class=" input-group ">
                <label class="mt-3 " for="">Cédula</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/cedula2.png" alt=""></span>
                <input list="browsers" type="text" name="cedula" class="form-control" id="cedula" placeholder="Cédula"onkeypress="buscar_datos_teclado()" onkeypress="return SoloNumeros(event);"><br>
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
                          <option  onclick="buscar_datos();" id="cedula" name="cedula" value="<?php echo $cedula_personal?> "> <?php echo $cedula_personal = $row['cedula']; echo " "; echo $nombre_personal; echo " ";echo $nombre_apellido;?></option>


                      <?php
                      }
                    ?>
                  </datalist>
              </div>
              <!-- identificador de la persona --> 
             <div class=" input-group " id="contenedor_identificador">
                <label class="mt-3 " for="">Identificador </label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/cedula2.png" alt=""></span>
                <input type="text" name="identificador" class="form-control" id="identificador" placeholder="identificador" autocomplete="off" ><br>
              </div>
              <!-- Nombre -->
              <div class="input-group  ">
                <label class="mt-3" for="">Nombre</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/usuario-usuario.png" alt=""></span>
                <input readonly id="nombre" class="input-auto form-control" type="text" name="nombre" placeholder="Nombre" ><br>
              </div>
        
           
              <!-- Apellido -->
              <div class="input-group ">
                <label class="mt-3" for="">Apellido</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/usuario-usuario.png" alt=""></span>
                <input readonly id="apellido" class="input-auto form-control" type="text" name="apellido" placeholder="Apellido" require="" pattern="[a-zA-Z]+"><br>
              </div>
                          
                            
              <!-- Sede -->
              <div class="input-group ">
                  <label class="mt-3" for="">Dependencia</label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/sede-sede.png" alt=""></span>
                  <input readonly id="sede" class="input-auto form-control" type="text" name="sede" placeholder="Dependencia" ><br>
              </div>                          
             

              <!-- Estatus -->
              <div class="input-group ">
                <label class="mt-3" for="">Estatus</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/grupo1.png" alt=""></span>
                <input readonly id="estatus" class="input-auto form-control" type="text" name="estatus" placeholder="Estatus">
              </div>

              <!-- Fecha del día-->
              <div class=" input-group ">
                  <label class="mt-3" for="">Fecha Inicio</label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/calendario.png" alt=""></span>
                  <input id="fecha-inicio" class="form-control" type="date" name="fecha-i" value="<?php echo date("Y"); echo'-'; echo date("m"); echo'-'; echo date("d");?>"><br>
              </div>

              <!-- Fecha fin -->
              <div class="input-group ">
                <label class="mt-3" for="">Fecha Fin</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/calendario.png" alt=""></span>
                <input id="fecha-f" class="form-control" type="date" name="fecha-f"><br>
              </div>

              <!-- permisos -->
              <div class=" input-group ">
                <label class="mt-3" for="">Permiso</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/permiso.png" alt=""></span>
                <select class="form-control" name="permiso" id="permiso">
                  <option value="">Seleccione Un Permiso </option>
                  <?php
                        $estados = "SELECT * FROM permisos";
                        $resultado = mysqli_query($conexion, $estados);
                        while ($per = mysqli_fetch_array($resultado)) {
                          $permiso = $per['permisos'];
                          $idpermiso_per = $per['idpermisos_aj'];
                          ?>
                            <option value="<?php echo $idpermiso_per?>"><?php echo $permiso?></option>
                          <?php
                        }
                  ?>
                </select><br>
              </div>

          </div>
              <!-- BOTON -->
              <div class="mt-3 d-flex justify-content-center align-items-center">
                <input type="button" value="BUSCAR" class="boton-verde me-2" id="buscar" name="btn_enviar" onclick="buscar_datos();">
                <input type="button" value="LIMPIAR" class="boton-amarillo me-2" id="limpiar" name="btn_enviar">
                <input id="generar" type="submit" value="GENERAR" class="boton-actualizar me-2"  name="boton-aceptar" >  
                <input type="color" name="color" class="ms-2">       
              </div> 
                <?php
                   
                  ?>
                   <section class="mt-4 contenedor-boton-admin d-flex">
                    <?php
                    if($idrol == 1){
                      ?>
                      <div class="mt-2 boton-crear">
                            <a href="tabla-ausencia.php" class="boton-actualizar" ><img src="icons/administracion.png" alt="" class="me-3">Tabla de ausencia justificada</a>
                          </div>
                          <div class="mt-2 me-2">
                            <button type="button"  data-bs-toggle="modal" data-bs-target="#boton-permiso" class="boton-verde" id=""><img src="icons/anadir-amigo.png" alt="" class="me-3">Crear permiso</button>
                      
                          </div>
                          <div class="mt-2 me-2">
                            <button type="button" class="boton-verde" data-bs-toggle="modal" data-bs-target="#modificar-permiso" id=""><img src="icons/anadir-amigo.png" alt="" class="me-3">Cambiar permisos</button>
                        </div>
                      <?php
                    }
                    ?>
                  <div class="mt-2 boton-crear">
                    <a href="./calendario.php" class="boton-actualizar" ><img src="icons/calendario2.png" alt="" class="me-3">Ver calendario</a>
                  </div>
                    
                   </section>
                  <?php
                ?>  
                 
          </form>

      </div>
  </div>

  <footer class="contenedor-upta d-flex">
    <div>
      <p>&copy Universidad Politécnica Territorial de Aragua Federico Brito Figuero(UPTA).</p>
      <p>&copy INCES la Romana</p>
    </div>
  </footer>
</div>

<?php include("modal/modal-permiso.php");?>
<?php include("modal/modificar-permiso.php");?>

							<!-- JQuery -->
<script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
<!-- Llamado de DataTable -->
<script src="js/datatable/datatables.min.js"></script>
<!-- DataTable js DataTAble bootstrap -->
<script src="js/datatable/dataTables.bootstrap5.min.js"></script>
							

<script src="js/datatable/siver-side/data-soli-permisos.js"></script>
<script src="js/menu_2.0.js"></script>
<script src="js/todo.js"></script>
<script src="js/fechaActuales.jsjs"></script>
<script src="js/registro-ausencia.js"></script>
<!-- solicitudes se ausencia -->
<script src="js/fechaActuales.js"></script>
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>

</body>
</html>

<?php
                  if(isset($_POST['boton-aceptar'])){
                    if(!empty($_POST)){
                      if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['cedula'])
                      || empty($_POST['sede']) || empty($_POST['estatus']) || empty($_POST['fecha-i'])
                      || empty($_POST['fecha-f']) || empty($_POST['permiso']) ) {
                        ?>
                          <script type="text/javascript">
                               Swal.fire({
                                title: 'VERIFICAR !',
                                text:'Verefique si cada campo esta respectivamente lleno ',
                                icon: 'warning',
                                confirmButtonText: false,
                                showConfirmButton: false,
                                timer: 4000
                              })  
                          </script>
                        <?php
                      }else{
                        include("php/conexion.php");
                        
                        $identificador  = $_POST['identificador'];
                        $fecha_inicio =  $_POST['fecha-i'];
                        $fecha_fin =  $_POST['fecha-f'];
                        $color =  $_POST['color'];
                        $fecha = date("Y-m-d");
                        $hora = date("h:i:s:A");
                        $identificador_usuario = $id;
                        $permiso = $_POST['permiso'];
                      
                        $consulta_AJ ="INSERT INTO ausencia_justificada(idpersonal, id_permiso, fecha_inicio, fecha_fin, 
                        fecha_aj, hora_aj, iden_usuario_aj, color) VALUES ('$identificador', '$permiso', '$fecha_inicio', '$fecha_fin',
                         '$fecha', '$hora', '$identificador_usuario', '$color')";

                        
                        // verificar si este permiso ya existe en la base de datos /*
                        $verificar_personal= mysqli_query($conexion, "SELECT * FROM ausencia_justificada WHERE idpersonal='$identificador' ");
                        if(mysqli_num_rows($verificar_personal) > 0){
                          ?>
                          <script type="text/javascript">
                               Swal.fire({
                                title: 'ATENCIÓN !',
                                text:'Esta persona ya esta de permiso ',
                                icon: 'warning',
                                confirmButtonText: false,
                                showConfirmButton: false,
                                timer: 4000
                              })  
                          </script>
                          <?php
                          exit();
                        }


                        $conexion->query("SET @autoid := 0");
                        $conexion->query("UPDATE ausencia_justificada SET idpermiso = (@autoid := @autoid + 1)");
                        $conexion->query("ALTER TABLE ausencia_justificada AUTO_INCREMENT = 1");
                        // envio de la ausencia jsutificada a la base de datos 
                        $resultado = mysqli_query($conexion, $consulta_AJ);

                        if($resultado ){
                          ?>
                          <script type="text/javascript">
                               Swal.fire({
                                title: 'Ausencia exitosa !',
                                text:'Esta persona ahora ya esta de permiso ',
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
                  }
                 
?> 