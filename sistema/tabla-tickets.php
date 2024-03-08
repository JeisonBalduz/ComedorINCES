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
    <link rel="stylesheet" href="css/tabla-tickets.css">
    <!--Icono De La Pagina -->
    <link rel="icon" href="include/inces.png">
    
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
<?php include("include/header.php");?>
<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex  ">
  <div id="contenedor-segundario "class=" contenedor-segundario justify-content-center ">
      <div id="contenedor-tercero" class="formulario">
        <table class="table table-striped table-bordered display responsive nowrap" id="myTable">
					<thead class="thead-dark">
						<tr>	
							
							<th class="">NOMBRE</th>
							<th class="">APELLIDO</th>
              <th>CÉDULA</th>
              <th>DEPENDENCIA</th>
              <th>ESTATUS</th>
              <th>COMIDA</th>
              <th class="">FECHA</th>
              <th class="">HORA</th>
              
						
							
						</tr>
					</thead>
				</table>
          <section class="d-flex">
            
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
<script src="./js/datatable/siver-side/data-table-tickets-generados.js"></script>
<!-- JS de Tabla de registro-->
<script src=""></script>
<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
<!-- Modal para Elliminar-->
<script type="text/javascript">


</script>

</body>
</html>