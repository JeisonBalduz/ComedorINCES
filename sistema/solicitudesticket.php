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
    <title>Tabla De ausencia Justificada</title>
    <!--CSS De Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--CSS Del Tabla-Registo-->
    <link rel="stylesheet" href="css/tabla-ausencia.css">
    <!--Icono De La Pagina -->
    <link rel="icon" href="include/inces.png">
   

    
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
<?php include("include/header.php");?>
<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex  ">
  <div id="contenedor-segundario "class="contenedor-segundario d-flex  ">
        <div class="tabla container-fluid d-flex justify-content-center bg-danger ">
            <h4 class="text-white me-3">T A B L A</h4>
            <h4 class="text-white me-3">D E</h4>
            <h4 class="text-white me-3">S O L I C I T U D E S</h4>
            <h4 class="text-white me-3">D E</h4>
            <h4 class="text-white ">T I C K E T</h4>
        </div>
    <div id="contenedor-tercero" class="formulario ">
      <!--
        <div id="botonN" class="d-flex justify-content-end mb-2">
            <a class="btn btn-danger" href="registro-personal.php">
               Nuevo 
            </a>
        </div>
        -->
        <div class="">
        <table class="table table-striped table-bordered" id="myTable">
					<thead class="thead-dark">
						<tr>
                      <th>#</th>	
					  <th class="">NOMBRE</th>
					  <th class="">APELLIDO</th>
					  <th class="">CEDULA</th>
				      <th class="">FECHA_INI</th>
				      <th class="">FECHA_FIN</th>
				      <th class="">PERMISO</th>
				      <th class="">FECHA_HORA</th>
							<th class="">ACCIONES</th>
						</tr>
					</thead>
				</table>
        </div>
            
    </div>
  </div>
  <footer class="contenedor-upta d-flex">
    <div>
      <p>&copy Universidad Politécnica Territorial de Aragua Federico Brito Figuero(UPTA).</p>
      <p>&copy INCES la Romana</p>
    </div>
  </footer>
</div>

<?php include "modal/modal-ausencia.php";?>

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
<script src="./js/datatable/siver-side/data-table-ausencia.js"></script>
<!-- JS de Tabla de registro-->
<?php include "modal/modal-registro.php";?>

<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
<!-- Modal para Elliminar-->
<script type="text/javascript">


//capturar la fila  de la table para el editar o borrar 
var table = document.getElementById('myTable'); // capturar id de la tabla
var fila; //capturar la fila para editar o borrar el registro  
//Botón EDITAR 
$(document).on("click", ".boton-habilitar", function(){

fila = $(this).closest("tr");// Capturar table row de la tabla
id_editar = parseInt(fila.find('td:eq(0)').text());//Capturar el id del primer sector 0
//Evento swal de SweetAlerts 
Swal.fire({
  title: '¿Estás seguro de habilitar a esta persona?',
  icon: 'question',
  allowOutsideClick: true,
  allowEnterKey: true,
  confirmButtonText: false,
  showConfirmButton: false,
  html:'Para aceptar habilitar estos datos presione el boton <b>Aceptar</b> ',
  footer:'<button class="boton-alerts-verde me-2" id="boton-envio">Aceptar</button><button class="boton-alerts-gris" id="cancelar-boton">Cancelar</button>',
  
                    
});
 //Redireccionar con el id del input a la pagina actualizar
var botonAlerta = document.getElementById("boton-envio");
botonAlerta.addEventListener('click', function(){
  window.location.href = "./eliminar/eliminar-ausencia.php?tabla="+id_editar;
});

// Cerrar la alerta de sweetalerts
var BotonCancelar = document.getElementById("cancelar-boton");
BotonCancelar.addEventListener('click', function(){
  Swal.close();
});

});

$(document).on("click", ".boton-actualizar", function(){

fila = $(this).closest("tr");// Capturar table row de la tabla
id_editar = parseInt(fila.find('td:eq(0)').text());//Capturar el id del primer sector 0
//Evento swal de SweetAlerts 
Swal.fire({
  title: '¿Estás seguro de actualizar estos datos?',
  icon: 'question',
  allowOutsideClick: true,
  allowEnterKey: true,
  confirmButtonText: false,
  showConfirmButton: false,
  html:'Para aceptar actualizar estos datos presione el boton <b>Aceptar</b> ',
  footer:'<button class="boton-alerts-verde me-2" id="boton-actualizar2">Aceptar</button><button class="boton-alerts-gris" id="cancelar-boton">Cancelar</button>',
  timer: 10000
                    
});
 //Redireccionar con el id del input a la pagina actualizar
var botonAlerta = document.getElementById("boton-actualizar2");
botonAlerta.addEventListener('click', function(){
  window.location.href = "actualizar-ausencia.php?tabla="+id_editar;
});

// Cerrar la alerta de sweetalerts
var BotonCancelar = document.getElementById("cancelar-boton");
BotonCancelar.addEventListener('click', function(){
  Swal.close();
});

});




// realizar el reporte
/*
const reportepersonal = document.getElementById("repor-personal");
reportepersonal.addEventListener("click", function(){
  window.open('php/reportes/reporte-tabla-personal.php');
});*/

</script>


</body>
</html>
