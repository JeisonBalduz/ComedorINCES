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
    <title>Tabla Usuario</title>
    <!--CSS De Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--CSS Del Tabla-Registo-->
    <link rel="stylesheet" href="css/tabla-usuario.css">
    <!--Icono De La Pagina -->
    <link rel="icon" href="include/inces.png">

</head>
<body>
<?php include("include/header.php");?>

<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex ">
  <div id="contenedor-segundario "class="contenedor-segundario d-flex  ">
    <div class="tabla d-flex justify-content-center bg-danger">
      <h4 class="text-white me-3">T A B L A </h4><h4 class="text-white  me-3">D E</h4>
      <h4 class="text-white ">U S U A R I O S</h4>
      </div>
    <div id="contenedor-tercero" class="formulario ">
        <div id="botonN" class="botoncito d-flex justify-content-end mb-2">
            <a class="boton-eliminar me-2" href="registro-usuario.php">
               Crear Usuario
            </a>
            <a class="boton-verde" href="registro-personal.php">
              Crear Personal 
            </a>
        </div>
        <table class="table table-striped table-bordered" id="myTable">
					<thead class="thead-dark">
						<tr>	
              <th >#</th>
							<th >USUARIO</th>
							<th >CONTRASEÑA</th>
              <th>NOMBRE</th>
              <th>CEDULA</th>
              <th>ROL</th>
              <th>AD</th>
							<th>ACCIONES</th>	
						</tr>
					</thead>
				</table>
          <section class="d-flex">
            <div class="mt-2 me-3">
              <a href="php/reportes/reporte-tabla-usuario.php" target="_blank" rel="noopener"><button class="boton-alerts-rojo"><img src="icons/pdf.png" alt="" class="me-3">PDF</button></a>
            </div>
          </section>
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
<!-- SweetAlert2 -->
<script src="js/libreriasJS/sweetalert2.all.min.js"></script>
<!-- JQuery -->
<script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
<!-- Llamado de DataTable -->
<script src="js/datatable/datatables.min.js"></script>
<!-- DataTable js DataTAble bootstrap -->
<script src="js/datatable/dataTables.bootstrap5.min.js"></script>
<!-- Llamado a la estructura de DataTable -->
<script src="./js/datatable/siver-side/data-table-usuario.js"></script>
<!-- JS de Tabla de usuario-->
<script src="js/tabla-usuario.js"></script>
<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
</body>
</html>
<?php
include("./php/conexion.php");
if(isset($_GET['boton-habilitar'])){

        $id=$_GET['tabla'];
        $activo= "activado";
        echo $id;
        
        $consulta1 ="UPDATE usuario SET activo_us='$activo' WHERE idusuario = '$id'";
        $resultahabilitar = mysqli_query($conexion, $consulta1);
    if($resultahabilitar){
        ?>
        <script type="text/javascript">
            Swal.fire({
                    title: 'Usuario activado con exito!',
                    icon: 'success',
                    allowOutsideClick: true,
                    allowEnterKey: true,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#28a745',
                    showConfirmButton: true,
                    html:'Para cerrar esta alerta presione el boton <b>Aceptar</b>',          
                    timer: 4000
                  });
        </script>
            
        <?php
    }
}

if(isset($_GET['boton-desabilitar'])){

  $id=$_GET['tabla'];
  $activo= "desactivado";
  echo $id;
  
  $consulta1 ="UPDATE usuario SET activo_us='$activo' WHERE idusuario = '$id'";
  $resultadesabilitar = mysqli_query($conexion, $consulta1);
if($resultadesabilitar){
  ?>
  <script type="text/javascript">
      Swal.fire({
        title: 'Usuario desabilitado con exito!',
        icon: 'success',
        allowOutsideClick: true,
        allowEnterKey: true,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#28a745',
        showConfirmButton: true,
        html:'Para cerrar esta alerta presione el boton <b>Aceptar</b>',          
        timer: 4000
    });
  </script>
      
  <?php
  }
}
?>