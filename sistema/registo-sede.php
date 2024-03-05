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
    <title>Registro de sedes</title>
    <!--Link de vinculacion-->
    <!--CSS De Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS De DataTable-->
    <link rel="stylesheet" href="js/datatable/datatables.min.css"/>
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--CSS Del Tabla-Registo-->
    <link rel="stylesheet" href="css/registro-sede.css">
    <!--Icono De La Pagina -->
    <link rel="icon" href="include/inces.png">
    <!-- JS SweetAlert2 -->
    <script src="js/libreriasJS/sweetalert2.all.min.js"></script>
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">

</head>
<body>
<?php include("include/header.php");?>

<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex justify-content-top ">
  <div id="contenedor-segundario "class="contenedor-segundario">
    
        <div class="tabla container-fluid d-flex justify-content-center bg-danger ">
            <h4 class="text-white me-3">R E G I S T R O</h4>
            <h4 class="text-white me-3">D E</h4>
            <h4 class="text-white">D E P E N D E N C I A</h4>
        </div>
      <div class="formulario ">
       
        <!-- Formulario -->
        <form action="" method="POST" class="">
          <!-- Nombre -->
          <div class=" input-group  ">
            <label class="mt-3" for="">Dependencia</label>
            <span class="input-group-text" ><img src="icons/sede-sede.png" alt="" ></span>
            <input minlength="3" maxlength="40"class="form-control" type="text" name="sede" id="sede" placeholder="Dependencia" onkeypress="return soloLetras(event);" onkeyup="convertirTexto()" autocomplete="off"><br>
          </div>
          <!--Código-->
          <div class=" input-group  ">
            <label class="mt-3" for="">Código</label>
            <span class="input-group-text" ><img src="icons/codigo-codigo.png" alt=""></span>
            <select class="form-control" name="codigo" id="">
              <option value="">Selecione un código para la depencendia</option>
                <?php
                    $codigos = "SELECT * FROM sedes_codigo order by idcs";
                    $resultado_codigos = mysqli_query($conexion, $codigos);
                        while($row = mysqli_fetch_array($resultado_codigos))
                    {
                        $IDcodigos= $row['idcs'];
                        $numero = $row['codigo_sede'];
                    ?>
                        <option value="<?php echo $IDcodigos?>"> <?php echo $numero;?></option>
                    <?php
                    }
                ?>
            </select><br>
          </div>
          <!--estado-->
          <div class=" input-group  ">
            <label class="mt-3" for="">Estado</label>
            <span class="input-group-text" ><img src="icons/estado-venezuela.png" alt=""></span>
            <select class="form-control" name="estado" id="">
                <?php
                    $getclientes1 = "SELECT * FROM estados order by idestado";
                    $resultado = mysqli_query($conexion, $getclientes1);
                        while($row = mysqli_fetch_array($resultado))
                    {
                        $IDestados= $row['idestado'];
                        $nombre = $row['estado'];
                    ?>
                        <option value="<?php echo $IDestados?>"> <?php echo $nombre;?></option>
                    <?php
                    }
                ?>
            </select><br>
          </div>
          
           <!-- BOTON -->
          <div class="mt-2 d-flex justify-content-center ">
            <input class="boton-eliminar " type="submit" name="boton-aceptar" value="Crear dependencia"><br>
            <?php
            /*
            if($idrol == 1){
                        ?>
                        <input class="boton-salir ms-2" type="submit" name="boton-sin-codigo" value="Crear dependencia sin codigo"><br>
                        <?php 
                     }
            */
            ?>
          </div>
          </form>
          <div class="botoncito d-flex justify-content-center">
            <div class="mt-2 me-3">
                <a href="php/reportes/reporte-tabla-dependencia.php" target="_blank" rel="noopener" ><button class="boton-alerts-rojo"><img src="icons/pdf.png" alt="" class="me-3">PDF</button></a>
            </div>
            
          </div>          
      </div>

      <div id="tabla-content" class="tabla-content  ">
          <table class="table table-striped table-bordered " id="myTable">
					  <thead class="thead-dark">
						  <tr>
                <th class="identificador_identificado">IDsedes</th>
                <th class="th1 ">DEPENDENCIA</th>
                <th class="th2 ">ESTADOS</th>
							  <th class="th3 ">ACCIONES</th>
						  </tr>
					  </thead>
				  </table>
          
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
<!-- JQuery -->
<script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
<!-- Llamado de DataTable -->
<script src="js/datatable/datatables.min.js"></script>
<!-- DataTable js DataTAble bootstrap -->
<script src="js/datatable/dataTables.bootstrap5.min.js"></script>
<!-- Llamado a la estructura de DataTable -->
<script src="./js/datatable/siver-side/data-table-sedes.js"></script>
<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
<!-- Todos los eventos para los input-->
<script src="js/todo.js"></script>
<?php include ("./modal/modal-sede.php");?>
<!-- Mover menú para telefonos movíles-->
<script src="js/registro-sede.js"></script>
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
<script src="js/todo.js"></script>
<script src="js/menu_2.0.js"></script>

</body>
</html>

<?php
            if(isset($_POST['boton-aceptar'])){
              if(!empty($_POST)){
                if (empty($_POST['sede']) || empty($_POST['codigo'])) {
                  ?>
                    <script type="text/javascript">
                         Swal.fire({
                          title: 'VERIFICAR !',
                          text:'Verifique si creo un nombre o le coloco respectivamente el código a la dependencia ',
                          icon: 'warning',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        })  
                    </script>
                  <?php
                }else{
                  date_default_timezone_set("America/Caracas");
                  include("php/conexion.php");
                  $sedes = $_POST['sede'];
                  $estado = $_POST['estado'];
                  $codigo_sede = $_POST['codigo'];
                  $fecha = date("Y/m/d");
                  $hora = date("h:i:s:A");
                  $cedulausuario = $id;
                  $estado_activo = 1;
                  
                  $consulta ="INSERT INTO  sedes (sede, idestados, codigo, fecha, hora, iden_usuario, estado_sede ) VALUES ('$sedes','$estado', '$codigo_sede', '$fecha', '$hora','$cedulausuario', '$estado_activo')";
                  
                  $verificar_personal= mysqli_query($conexion, "SELECT * FROM sedes WHERE sede='$sedes' ");
                  if(mysqli_num_rows($verificar_personal) > 0){
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'ATENCION !',
                          text:'Esta dependencia ya existe en la base de datos ',
                          icon: 'warning',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        })  
                    </script>
                    <?php
                    exit();
                  }
                  $verificar_codigo= mysqli_query($conexion, "SELECT * FROM sedes WHERE codigo='$codigo_sede' ");
                  if(mysqli_num_rows($verificar_codigo) > 0){
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'ATENCION !',
                          text:'Este código esta utilizado ',
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
                  $conexion->query("UPDATE sedes SET idsede = (@autoid := @autoid + 1)");
                  $conexion->query("ALTER TABLE sedes AUTO_INCREMENT = 1");
                  $resultado = mysqli_query($conexion, $consulta);

                  if($resultado ){
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'Dependencia Generada!',
                          icon: 'success',
                          confirmButton: false,
                          confirmButtonText: false,
                          allowOutsideClick: false,
                          allowEnterKey: false,
                          confirmButtonColor: false,
                          showConfirmButton: false,
                          html:'Dependencia creada exitosamente, para cerrar la alerta dele click al boton <b>Aceptar</b> ',
                          footer:'<a class="boton-alerts-verde" href="registo-sede.php">ACEPTAR</a>'
                          
                        });
                      
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
            if(isset($_POST['boton-sin-codigo'])){
              if(!empty($_POST)){
                if (empty($_POST['sede']) || empty($_POST['codigo'])) {
                  ?>
                    <script type="text/javascript">
                         Swal.fire({
                          title: 'VERIFICAR !',
                          text:'Verifique si creo un nombre o le coloco respectivamente el código a la dependencia ',
                          icon: 'warning',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        })  
                    </script>
                  <?php
                }else{
                  date_default_timezone_set("America/Caracas");
                  include("php/conexion.php");
                  $sedes = $_POST['sede'];
                  $estado = $_POST['estado'];
                  $codigo_sede = $_POST['codigo'];
                  $fecha = date("Y/m/d");
                  $hora = date("h:i:s:A");
                  $cedulausuario = $id;
                  $estado_activo = 1;
                  
                  $consulta ="INSERT INTO  sedes (sede, idestados, codigo, fecha, hora, iden_usuario, estado_sede ) VALUES ('$sedes','$estado', '$codigo_sede', '$fecha', '$hora','$cedulausuario', '$estado_activo')";
                  
                  $verificar_personal= mysqli_query($conexion, "SELECT * FROM sedes WHERE sede='$sedes' ");
                  if(mysqli_num_rows($verificar_personal) > 0){
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'ATENCION !',
                          text:'Esta dependencia ya existe en la base de datos ',
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
                  $conexion->query("UPDATE sedes SET idsede = (@autoid := @autoid + 1)");
                  $conexion->query("ALTER TABLE sedes AUTO_INCREMENT = 1");
                  $resultado = mysqli_query($conexion, $consulta);

                  if($resultado ){
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'Dependencia Generada!',
                          icon: 'success',
                          confirmButton: false,
                          confirmButtonText: false,
                          allowOutsideClick: false,
                          allowEnterKey: false,
                          confirmButtonColor: false,
                          showConfirmButton: false,
                          html:'Dependencia creada exitosamente, para cerrar la alerta dele click al boton <b>Aceptar</b> ',
                          footer:'<a class="boton-alerts-verde" href="registo-sede.php">ACEPTAR</a>'
                          
                        });
                      
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