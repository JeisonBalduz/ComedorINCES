<?php
session_start();
include("php/rol.php");
include("php/conexion.php");
date_default_timezone_set("America/Caracas");
function fecha_espanol_larga(){

  $fecha_dia=date("d");
  $dia_semana=[
      "Monday"=>"Lunes",
      "Tuesday"=>"Martes",
      "Wednesday"=>"Miercoles",
      "Thursday"=>"Jueves",
      "Friday"=>"Viernes",
      "Saturday"=>"Sabado",
      "Sunday"=>"Domingo"
  ];


  $fecha_final=$dia_semana[date("l")];

  return $fecha_final;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedir Reporte</title>
    <!--Link de vinculacion-->
   <!--CSS De Bootstrap-->
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--CSS Del Tabla-Registo-->
    <link rel="stylesheet" href="css/reportes.css">
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
<?php include("include/header.php");?>

<style>
  
    
</style>

<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex ">
  <div id="contenedor-segundario"class="contenedor-segundario container-fluid  d-flex">
      <div class="tabla container-fluid d-flex justify-content-center bg-danger ">
          <h4 class="text-white me-3">R E P O R T E S</h4>
          <h4 class="text-white me-3">D E L</h4>
          <h4 class="text-white">C O M E D O R</h4>
      </div>  
    <div class="formulario ">
        <!-- REPORTE GENERAL -->
        <button id="reporte" class="contenedor-boton d-flex mt-3  p-3 " onclick="cambiarimagen()">
          <img src="icons/anadir.png" alt="" class="me-3" id="flecha1">
          <h3 class="">General</h3>
        </button>
          <div id="general-reporte" class="reporte1 container mt-2 mb-2 p-2 ">
            <div class="container d-flex justify-content-center">
              <div class="reporte1_conten" id="reportes">
                <label class="label_reporte mt-2" for="desde">Fecha Inicio</label>
                <input min="2023-02-01" class="form-control  me-3" type="date" name="desde" id="desde" >
                <label class="label_reporte mt-2" for="hasta">Fecha Fin</label>
                <input min="2023-02-01" class="form-control  "type="date" name="hasta" id="hasta" value="<?php echo date("Y"); echo'-'; echo date("m"); echo'-'; echo date("d");?>">
                <button onclick="generarPDF()" class="boton-pdf mt-3">Generar reporte</button>
              </div>
            </div>
          </div>
        <!-- REPORTE DEPENDENCIA -->  
        <button id="reporte2" class="contenedor-boton d-flex mt-3  p-3 " onclick="cambiarimagen2()">
          <img src="icons/anadir.png" alt="" class="me-3" id="flecha2">
          <h3 class="">Consolidado</h3>
        </button>
          <div id="general-reporte" class="reporte1 container mt-2 mb-2 p-2">
            <div class="container d-flex justify-content-center">
              <div class="reporte1_conten_dependencia " id="reportes">
                  <label class="label_reporte mt-2" for="desde2">Fecha Inicio</label>
                  <input min="2023-02-01" class="form-control  me-3" type="date" name="desde" id="desde2" >
                  <label class="label_reporte mt-2" for="hasta2">Fecha Fin</label>
                  <input min="2023-02-01" class="form-control "type="date" name="hasta" id="hasta2" value="<?php echo date("Y"); echo'-'; echo date("m"); echo'-'; echo date("d");?>">
                    <div class="dia_de_semana" id="">
                        <input class="form-control mt-2 "type="text" name="lunes" id="lunes" value="Lunes">
                        <input class="form-control mt-2 "type="text" name="martes" id="martes" value="Martes">
                        <input class="form-control mt-2 "type="text" name="miercoles" id="miercoles" value="Miercoles">
                        <input class="form-control mt-2 "type="text" name="jueves" id="jueves" value="Jueves">
                        <input class="form-control mt-2 "type="text" name="viernes" id="viernes" value="Viernes">
                        <input class="form-control mt-2 "type="text" name="sabado" id="sabado" value="Sabado">
                        <input class="form-control mt-2 "type="text" name="domingo" id="domingo" value="Domingo">
                    </div>
                    
                  <div class="div_sede" id="sede_checkbox">
                  <label class="label_reporte mt-2" for="sede" >Dependencia</label>
                  <select class="sede form-control " name="sede" id="sede" disabled>
                  <option value="">Seleccione una dependencia </option>
                    <?php
                    $consulta_sede = "SELECT * FROM sedes";
                    $resultado_sede = mysqli_query($conexion, $consulta_sede);
                    while($row = mysqli_fetch_array($resultado_sede))
                    {
                      $sede = $row['sede'];
                      ?>
                      <option value="<?php echo $sede;?>"><?php echo $sede;?></option> 
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
              <div class="d-flex justify-content-center ">
                <button onclick="generarPDF_consolidado()" class="boton-pdf mt-3 me-3">Generar reporte</button>  
                <button class="boton-dependencia mt-3" type="text" name="" id="checkbox1"  >Dependencia</button>  
                <button class="boton-dependencia mt-3" type="text" name="" id="checkbox2"  >Eliminar Dependencia</button>
              </div>
          </div>
      
        <!-- REPORTE DEPENDENCIA -->  
        <button id="reporte3" class="contenedor-boton d-flex mt-3  p-3 ">
          <img src="icons/anadir.png" alt="" class="me-3">
          <h3 class="">Dependencia</h3>
        </button>
          <div id="general-reporte" class="reporte1 container mt-2 mb-2 p-2">
            <div class="container d-flex justify-content-center">
              <div class="reporte1_conten comida" id="reportes">
                <label class="label_reporte mt-2" for="desde3">Fecha Inicio</label>
                <input min="2023-02-01" class="form-control  me-3" type="date" name="desde3" id="desde3" >
                <label class="label_reporte mt-2" for="hasta3">Fecha Fin</label>
                <input min="2023-02-01" class="form-control m "type="date" name="hasta3" id="hasta3" value="<?php echo date("Y"); echo'-'; echo date("m"); echo'-'; echo date("d");?>">
                <label class="label_reporte mt-2" for="sede2">Dependencia</label>
                <select class="form-control " name="sede2" id="sede2">
                  <option value="">Seleccione una dependencia </option>
                  <?php
                  $consulta_sede = "SELECT * FROM sedes";
                  $resultado_sede = mysqli_query($conexion, $consulta_sede);
                  while($row = mysqli_fetch_array($resultado_sede))
                  {
                    $sede = $row['sede'];
                    ?>
                     <option value="<?php echo $sede;?>"><?php echo $sede;?></option> 
                    <?php
                  }
                  ?>
                </select>
                <button onclick="generarPDF_dependencia()" class="boton-pdf mt-3">Generar reporte</button>
              </div>
            </div>
          </div>
          <!-- REPORTE AUSENCIA JUSTIFICADA -->  
        <button id="reporte4" class="contenedor-boton d-flex mt-3  p-3 ">
          <img src="icons/anadir.png" alt="" class="me-3">
          <h3 class="">Asencia justificada</h3>
        </button>
          <div id="general-reporte" class="reporte1 container mt-2 mb-2 p-2">
            <div class="container d-flex justify-content-center">
              <div class="reporte1_conten " id="reportes">
                <label class="label_reporte mt-2" for="desde4">Fecha Inicio</label>
                <input class="form-control me-3" type="date" name="desde4" id="desde4" >
                <label class="label_reporte mt-2" for="hasta4">Fecha Fin</label>
                <input min="2023-02-01" class="form-control "type="date" name="hasta4" id="hasta4" value="<?php echo date("Y"); echo'-'; echo date("m"); echo'-'; echo date("d");?>">
                <!--<select class="form-control mt-2" name="sede2" id="sede2">
                  <option value="">Seleccione una dependencia </option>
                  <?php
                  $consulta_sede = "SELECT * FROM sedes";
                  $resultado_sede = mysqli_query($conexion, $consulta_sede);
                  while($row = mysqli_fetch_array($resultado_sede))
                  {
                    $sede = $row['sede'];
                    ?>
                     <option value="<?php echo $sede;?>"><?php echo $sede;?></option> 
                    <?php
                  }
                  ?>-->
                </select>
                <button onclick="generarPDF_ausencia_justificada()" class="boton-pdf mt-3">Generar reporte</button>
              </div>
            </div>
          </div>  
                   <!-- REPORTE AUSENCIA JUSTIFICADA -->  
        <button id="reporte52" class="contenedor-boton d-flex mt-3  p-3 ">
          <img src="icons/anadir.png" alt="" class="me-3">
          <h3 class="">Solicitud de comida</h3>
        </button>
          <div id="general-reporte22" class="reporte12 container mt-2 mb-2 p-2">
            <div class="container d-flex justify-content-center text-center">
              <div class="reporte1_conten" id="reportes">
                <label for=""  class="label_reporte mt-2">Personal</label>
                <button onclick="generarPDF_comida_total()" id="total" name="total" class="boton-pdf_solicitud"  value="boton_total">Generar reporte</button>
                <?php
                  if ($idrol == 1) {
                    ?>
                      <label for=""  class="label_reporte mt-3">Personal Detallado</label>
                      <button onclick="generarPDF_comida_total_detallado()" id="total_detallado" name="total_detallado" class="boton-pdf_solicitud"  value="boton_total_detallado">Generar reporte</button>
                    <?php
                    }                
                ?>
               
                <label for=""  class="label_reporte mt-3 ">Dependencia</label>
                <button onclick="generarPDF_comida_dependencia()" class="boton-pdf_solicitud mb-3">Generar reporte</button>
              </div>
            </div>
          </div>  

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

<script src="js/menu_2.0.js"></script>
<script src="js/todo.js"></script>

<script type="text/javascript">
/*
const solicitud_comida =document.getElementById("reporte_comida");
 solicitud_comida.addEventListener('click', function(){
  window.open('php/reportes/reporte-solicitud_comida.php')
 })
  */
  $('#reporte52').click(function(){
        $(this).next('#general-reporte22').slideToggle();
        $(this).toggleClass('active');
      });
function generarPDF_comida_dependencia(){
  
  window.open('php/reportes/reporte-solicitud_comida.php');
  console.log('Se genero el reporte de la ausencia justificada de manera correctamente');
}
function generarPDF_comida_total(){
      var total_comidas = $('#total').val();
      
  window.open('php/reportes/reporte-SC-personal.php?'+total_comidas);
  console.log('Se genero el reporte de la ausencia justificada de manera correctamente');
}
function generarPDF_comida_total_detallado(){
      var detallado = $('#total_detallado').val();
      
  window.open('php/reportes/reporte-solicitud_comida.php?'+detallado);
  console.log('Se genero el reporte de la ausencia justificada de manera correctamente');
}

/*peticiones para generara y eliminar una dependencia */


$('#checkbox2').hide();
 $('#sede_checkbox').hide();
 document.getElementById("checkbox1").addEventListener("click", function(){
  document.getElementById("sede").disabled = false
  $('#checkbox1').hide();
  $('#checkbox2').show();
  $('#sede_checkbox').show();
 });

document.getElementById("checkbox2").addEventListener("click", function(){
  $('#sede').val("");
  document.getElementById("sede").disabled =  true
  $('#checkbox1').show();
  $('#checkbox2').hide();
  $('#sede_checkbox').hide();
});

</script>

       
      
</body>
</html>