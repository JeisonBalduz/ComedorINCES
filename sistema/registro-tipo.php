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
    <title>Estatus</title>
    <!--CSS De Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS De DataTable-->
    <link rel="stylesheet" href="js/datatable/datatables.min.css"/>
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--CSS Del Tabla-Registo-->
    <link rel="stylesheet" href="css/registro-tipo.css">
    <!--Icono De La Pagina -->
    <link rel="icon" href="include/inces.png">
    <!-- JS SweetAlert2 -->
    <script src="js/libreriasJS/sweetalert2.all.min.js"></script>
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
<?php include("include/header.php");?>
<style>
  a{
    text-decoration: none;
  }
  a:hover{
    color: #fff;
  }
</style>

<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex ">
  <div id="contenedor-segundario "class="contenedor-segundario d-flex ">
        <div class="tabla container-fluid d-flex justify-content-center bg-danger p-2">
            <h4 class="text-white me-3">R E G I S T R O</h4>
            <h4 class="text-white me-3">D E</h4>
            <h4 class="text-white">E S T A T U S</h4>
        </div>
      <div class="formulario ">
        <!-- Formulario -->
        <form action="" method="POST" class="ps-5 pe-5 pb-2 me-2 text-center">
          <!-- Nombre -->
          <div class=" input-group  ">
            <label class="mt-3" for="">Estatus</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/grupo1.png" alt=""></span>
            <input class="form-control" id="input" placeholder="Estatus" type="text" autocomplete="off" name="estatus" onkeypress="return soloLetras(event);" ><br>
            
          </div>
           <!-- BOTON -->
          <div class="mt-3 d-flex justify-content-center">
            <input class="boton" type="submit" name="boton-aceptar" value="Crear estatus"><br>
          </div>
            <section class="d-flex justify-content-center mt-3">
              <div class="mt-2 ">
                <a class="boton-alerts-rojo" target="_blank" rel="noopener" href="php/reportes/reporte-tabla-estatus.php"><img src="icons/pdf.png" alt="" class="">PDF</a>
              </div>
             </section>
          </form>
      </div>
      <div id="tabla-content" class=" container-fluid tabla-content mt-2 ">
          <table class="table table-striped table-bordered" id="myTable">
					  <thead class="thead-dark">
						  <tr>
                <th>#</th>
                <th class="pe-5" >ESTATUS</th>
							  <th>ACCIONES</th>
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
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
<!-- BootsTrap -->
<script src="js/libreriasJS/bootstrap.bundle.min.js"></script>
<!-- JQuery -->
<script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
<!-- Llamado de DataTable -->
<script src="js/datatable/datatables.min.js"></script>
<!-- DataTable js DataTAble bootstrap -->
<script src="js/datatable/dataTables.bootstrap5.min.js"></script>
<!-- DataTable js DataTAble bootstrap -->
<script src="js/datatable/siver-side/data-table-tipos.js"></script>
<?php include "modal/modal-tipo.php";?>
<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
<!-- Todos los eventos para los input-->
<script src="js/todo.js"></script>
<!-- JS de registro de tipo-->
<script src="js/registro-tipo.js"></script>

</body>
</html>

<?php
            if(isset($_POST['boton-aceptar'])){
              if(!empty($_POST)){
                if (empty($_POST['estatus']) ) {
                  ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'VERIFICAR !',
                          text:'Coloque un nombre para crear el estatus ',
                          icon: 'warning',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        })  
                    </script>
                  <?php
                }else{
                  include("php/conexion.php");
                  $nombre = $_POST['estatus'];
                  $fecha = date("Y/m/d");
                  $hora = date("h:i:s:A");
                  $identificador_usuario = $id;
                  $estado_activo = 1;
                  $consulta ="INSERT INTO estatus (estatus , estatus_fecha, estatus_hora, iden_usuario, estado_estatus) VALUES ('$nombre', '$fecha', '$hora', '$identificador_usuario', '$estado_activo') ";

                  $verificar_personal= mysqli_query($conexion, "SELECT * FROM estatus WHERE estatus='$nombre' ");
                  if(mysqli_num_rows($verificar_personal) > 0){
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'ERROR!',
                          text:'Este estatus ya existe en nuestra base de datos',
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
                  $conexion->query("UPDATE estatus SET idestatus = (@autoid := @autoid + 1)");
                  $conexion->query("ALTER TABLE estatus AUTO_INCREMENT = 1");
                  $resultado = mysqli_query($conexion, $consulta);

                  if($resultado ){
                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                          title: 'Creado!',
                          text: 'El estatus fue creado exitosamente',
                          icon: 'success',
                          confirmButton: false,
                          confirmButtonText: false,
                          allowOutsideClick: false,
                          allowEnterKey: false,
                          confirmButtonColor: false,
                          showConfirmButton: false,
                          footer:'<a class="boton-alerts-verde" href="registro-tipo.php">ACEPTAR</a>'
                          
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