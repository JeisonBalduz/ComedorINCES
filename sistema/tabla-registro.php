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
    <title>Tabla de personal</title>
    <!--CSS De Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--CSS Del Tabla-Registo-->
    <link rel="stylesheet" href="css/tabla-registro-personal.css">
    <!--Icono De La Pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
  <!-- Menú-->
<?php include("include/header.php");?>
<div class="contenedor-primario container-fluid d-flex">
  <div class="contenedor-segundario  ">
    <div class="nombre_tabla d-flex justify-content-center bg-danger">
    <h4 class="text-white me-3">T A B L A </h4><h4 class="text-white  me-3">D E</h4>
    <h4 class="text-white  me-3">R E G R I S T R O</h4><h4 class="text-white"> P E R S O N A L</h4>
    </div>
    <div class="contenedor-tercero">
        <div class="row">
        <table class="table table-striped table-bordered" id="myTable">
					<thead class="thead-dark">
						<tr>
            <th class="identificador_identificador">id</th>	
							<th class="">NOMBRE</th>
							<th class="">APELLIDO</th>
							<th class="">CEDULA</th>
              <th class="">CORREO</th>
              <th>DEPENDENCIA</th>
              <th class="">ESTATUS</th>
							<th class="pe-3">ACCIONES</th>	
						</tr>
					</thead>
				</table>
        </div>
        <section class="d-flex">
          <div class="mt-2 me-3">
            <button class="boton-alerts-rojo" id="repor-personal"><img src="icons/pdf.png" alt="" class="me-3">PDF</button>
          </div>
          <div class="mt-2">
            <a href="registro-personal.php"><button class="boton-alerts-azul" ><img src="icons/administracion.png" alt="" class="me-3">Registro Personal</button></a>
          </div>
        </section>
      </div>      
  </div>
  <footer class="contenedor-upta d-flex">
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
<script src="./js/datatable/siver-side/data-table-personal.js"></script>
<!-- JS de Tabla de registro-->
<?php include "modal/modal-registro.php";?>
<script src="js/tabla-registro.js"></script>
<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
<!-- Modal para Elliminar-->
<script type="text/javascript">

</script>
</body>
</html>
