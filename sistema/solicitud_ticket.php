<?php
session_start();
include("php/rol.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de comida</title>
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
      <h4 class="text-white me-3">T A B L A </h4>
      <h4 class="text-white  me-3">D E</h4>
      <h4 class="text-white me-3">S O L I C I T U D </h4>
      <h4 class="text-white me-3">D E </h4>
      <h4 class="text-white ">T I C K E T </h4>
      </div>
    <div id="contenedor-tercero" class="formulario ">
        <!--
        <div id="botonN" class="botoncito d-flex justify-content-end mb-2">
            <a class="boton-eliminar me-2" href="registro-usuario.php">
               Solicitar Ticket
            </a>
            <a class="boton-verde" href="registro-personal.php">
              Crear Personal 
            </a>
        </div>
        -->
        <table class="table table-striped table-bordered" id="myTable">
					<thead class="thead-dark">
						<tr>	
                            <th>#</th>
							<th>NOMBRE</th>
							<th>APELLIDO</th>
                            <th>CEDULA</th>
                            <th>DEPENDENCIA</th>
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
<!-- SweetAlert2 -->
<script src="js/libreriasJS/sweetalert2.all.min.js"></script>
<!-- JQuery -->
<script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
<!-- Llamado de DataTable -->
<script src="js/datatable/datatables.min.js"></script>
<!-- DataTable js DataTAble bootstrap -->
<script src="js/datatable/dataTables.bootstrap5.min.js"></script>
<!-- Llamado a la estructura de DataTable -->
<script src="./js/datatable/siver-side/data-soli-ticket.js"></script>
<!-- accioens de solicitud de ticket -->
<script src="js/tablasoli-ticket.js"></script>
<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
</body>
</html>