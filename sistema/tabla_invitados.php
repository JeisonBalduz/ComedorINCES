<?php
session_start();
include("php/rol.php");
include ("php/conexion.php");
date_default_timezone_set("America/Caracas");
$fechaActual = date("Y-m-d");
$cuenta_invitado= current($conexion ->query(
  "SELECT   COUNT(idinvitados) FROM invitados WHERE comida_invitado='desayuno'  ")
->fetch_assoc() );
$cuenta_invitado2 = current($conexion ->query(
  "SELECT COUNT(idinvitados) FROM invitados WHERE comida_invitado='almuerzo' ")->fetch_assoc() );
$cuenta_invitado3 = current($conexion ->query("SELECT COUNT(idinvitados) FROM invitados WHERE comida_invitado='cena'")->fetch_assoc() );


$cuenta_invitado_dia= current($conexion ->query(
  "SELECT   COUNT(idinvitados) FROM invitados WHERE comida_invitado='desayuno' AND fecha_inv = '$fechaActual' ")
->fetch_assoc() );
$cuenta_invitado2_dia = current($conexion ->query(
  "SELECT COUNT(idinvitados) FROM invitados WHERE comida_invitado='almuerzo' AND fecha_inv = '$fechaActual' ")->fetch_assoc() );
$cuenta_invitado3_dia = current($conexion ->query("SELECT COUNT(idinvitados) FROM invitados WHERE comida_invitado='cena' AND fecha_inv = '$fechaActual'")->fetch_assoc() );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de invitados</title>
    <!--CSS De Bootstrap-->
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--CSS Del Tabla-Registo-->
    <link rel="stylesheet" href="">
    <!--Icono De La Pagina -->
    <link rel="icon" href="include/inces.png">
    
</head>
<body>
<?php include("include/header.php");?>
<style>
    body{
      background-color: #e7e7e7;
  }
  .row > * {
  flex-shrink: 0;
  width: 100%;
  max-width: 100%;
  padding-right: calc(var(--bs-gutter-x) * .5);
  padding-left: 0 !important;
  margin-top: var(--bs-gutter-y);
  }
  .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
      --bs-gutter-x: 0rem !important;
      --bs-gutter-y: 0;
      width: 100%;
      padding-right: calc(var(--bs-gutter-x) * .5);
      padding-left: calc(var(--bs-gutter-x) * .5);
      margin-right: auto;
      margin-left: auto;
  }
  .contenedor-primario {
      height: 100vh;
      width: 100%;
      flex-direction: column;
  }
  .contenedor-segundario{
      padding: 0 30px 0 230px;
      flex-direction: column;
  }
  .reporte1{
  display: none;
  box-shadow: 0px 0px 10px #5555;
}
.contenedor-boton{
  width: 100%;
  border: none;
  background: #f02020;
  color: #fff;
  border-radius: 3px;
  font-size: .9rem;
  justify-content: center;
  align-items: center;
  padding: .3rem .8rem;
  overflow: hidden;
  margin-bottom: 22px;
  max-width: 1200px;
}
.formulario__dia{
  margin-top: 120px;
}
  .formulario{
      background: white;
      padding: 15px;
      margin-bottom: 24px;
    
   
  }
  a{
      text-decoration: none;
  }
  table{
      width: 100% !important;
      font-size: 15px;
  }
    thead{
      color: #fff;
      background-color: #5a5c69;
      border-color: #6c6e7e;
      font-size: 18px;
      height: 40px;
    }
    .table tbody tr:nth-of-type(odd) {
      background-color: rgba(0,0,0,.05);
    }
    
    label{
      color: black;
      border: green;
    
    }
    .boton-alerts-verde{
      border-radius: .25em;
      color: #fff;
      font-size: 1em;
      text-decoration: none;
      background-color:#28a745;
      align-items: center;
      display: flex;
      flex-direction: row;
      font-size: 1rem;
      justify-content: center;
      padding: .6rem .8rem;
      border: none;
      text-decoration: none;
    }.boton-alerts-verde:hover{
      color: #fff;
    }
    /*//////// BOTONES DE ACCION ////////////*/
    button{
      border: none;
    }
    .form-control:focus{
      box-shadow: none; 
    }
    .button-eliminar{
      background: #84b6f4;
    }.button-eliminar:hover{
      background: #63A5F7;
    }
    
    .button-actualizar{
      background: #fa5f49;
    }.button-actualizar:hover{
      background: #FB462C;
    }
    
    .modal-input{
      color: #a6a5a5;
    }
    .modal-title{
      color: #666666;
    }
    /** footer universidad y creadores y ayudante */
  .contenedor-upta{
      flex-direction: column;
      display: flex;
      justify-content: end;
      height: 100vh;
    
    }
    .contenedor-upta div{
      background-color: white;
      text-align: center;
      padding: 0 0 0 174px;
    }
    .contenedor-upta p{
      margin-bottom: 0;
      color: #9597a8;
      font-size: 15px;
    }
    @media only screen and (max-width: 1180px), handheld and (orientation: landscape){
     .formulario{
      width: 1050px;
     }
    }
    @media only screen and (max-width: 1024px), handheld and (orientation: landscape){
      .contenedor-segundario{
          padding: 0 0 0 0px;
        
      }
      .formulario{
          width: 1100px;
      }
      .contenedor-upta{
          flex-direction: column;
          display: flex;
          justify-content: end;
          height: 100vh;
          width: 1110px;
        
      }
      .contenedor-upta div{
        padding: 0 0 0 0 ;
      }
    
    }


    
    
    /*//////////////////////////////////*/
    
    /*/////////////// DATOS DE DISEÑO DEDATATABLE ///////////////////////*/
    
    
    .dataTables_wrapper .dataTables_filter input{
        margin-bottom: 10px;
    }
    .modal-input{
      color: #a6a5a5;
    }
    .modal-title{
      color: #666666;
    }
    /*//////////////////////////////////*/
    
    

</style>

<div id="contenedor-primario"class="contenedor-primario d-flex ">
  <div id="contenedor-segundario "class="contenedor-segundario d-flex justify-content-center ">
    <div id="contenedor-tercero" class="formulario formulario__dia">
        <table class="table table-striped table-bordered" id="myTableDia">
					<thead class="thead-dark">
						<tr>		
							<th>NOMBRE</th>
							<th>APELLIDO</th>
              <th>CÉDULA</th>
              <th>DEPENDENCIA</th>
              <th>ESTATUS</th>
              <th>COMIDA</th>
              <th>FECHA</th>
              <th>HORA</th>
						</tr>
					</thead>
				</table>
          <section class="d-flex">
            <div class="mt-2 me-3">
              <a href="php/reportes/tabla-invitados-dia.php" target="_blank" rel="noopener"><button class="boton-alerts-rojo"><img src="icons/pdf.png" alt="" class="me-3">PDF</button></a>
            </div>
            <div class=" contenedor-comida mt-2 me-3 p-2">
              Desayuno:<span class="ms-2"><?php echo $cuenta_invitado_dia?></span>
            </div>
            <div class="contenedor-comida mt-2 me-3 p-2">
              Almuerzo:<span class="ms-2"><?php echo $cuenta_invitado2_dia?></span>  
            </div>
            <div class=" contenedor-comida mt-2 me-3 p-2">
              Cena:<span class="ms-2"><?php echo $cuenta_invitado3_dia?></span>
            </div>
          </section>
      </div>

      <div id="contenedor-tercero" class="formulario ">
        <table class="table table-striped table-bordered" id="myTable">
					<thead class="thead-dark">
						<tr>		
							<th>NOMBRE</th>
							<th>APELLIDO</th>
              <th>CÉDULA</th>
              <th>DEPENDENCIA</th>
              <th>ESTATUS</th>
              <th>COMIDA</th>
              <th>FECHA</th>
              <th>HORA</th>
						</tr>
					</thead>
				</table>
          <section class="d-flex">
            <div class="mt-2 me-3">
              <button class="boton-alerts-rojo button" type="button" data-bs-toggle="modal" data-bs-target="#NuevoReporte"><img src="icons/pdf.png" alt="" class="me-3">PDF</button>
            </div>
            <div class=" contenedor-comida mt-2 me-3 p-2">
              Desayuno:<span class="ms-2"><?php echo $cuenta_invitado?></span>
            </div>
            <div class="contenedor-comida mt-2 me-3 p-2">
              Almuerzo:<span class="ms-2"><?php echo $cuenta_invitado2?></span>  
            </div>
            <div class=" contenedor-comida mt-2 me-3 p-2">
              Cena:<span class="ms-2"><?php echo $cuenta_invitado3?></span>
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
<script src="./js/datatable/siver-side/data-table-tickets-invitados.js"></script>
<!-- Llamado a la estructura de DataTable Del día -->
<script src="./js/datatable/siver-side/data-table-tickets-invitados-dia.js"></script>
<!-- JS de Tabla de registro-->
<script src=""></script>
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
<!-- Modal para Elliminar-->
<?php require './modal/modal-reporte-invitados.php'; ?>
<script type="text/javascript">
  $(function (){

  //formulario de reporte general
  $('#reporte').click(function(){
      $(this).next('#general-reporte').slideToggle();
      $(this).toggleClass('active');
      
  });
  //formulario de reporte dependencia  
  $('#reporte2').click(function(){
      $(this).next('#general-reporte').slideToggle();
      $(this).toggleClass('active');
  });
  //formulario de reporte consolidado  
  $('#reporte3').click(function(){
      $(this).next('#general-reporte').slideToggle();
      $(this).toggleClass('active');
    });
  //formulario de reporte ausencia justificada  
  
  });
   // envio de datos apra el reporte general
   function generar_estadisticoPDF(){
      var desde = $('#desde').val();
      var hasta = $('#hasta').val();
      window.open('php/reportes/reporte-estadistico-invitados.php?desde='+desde+'&hasta='+hasta);
      console.log('Se genero el reporte estadistico de los invitados correctamente');
    }

    // envio de datos apra el reporte general
   function generar_general_invitadoPDF(){
      var desde = $('#desde').val();
      var hasta = $('#hasta').val();
      window.open('php/reportes/tabla-invitados.php');
      console.log('Se genero el reporte general de los invitados correctamente');
    }



</script>
</body>
</html>