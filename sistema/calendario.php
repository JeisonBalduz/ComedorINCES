
<?php
session_start();
include("php/rol.php");
include 'php/conexion.php';


date_default_timezone_set("America/Caracas");
date("d");
if($idrol > 1){
  header("location: ./principal.php");
}



$slq= "SELECT * FROM ausencia_justificada aj INNER JOIN personal p ON aj.idpersonal = p.idpersonal";
$respuesta = mysqli_query($conexion, $slq);



$slq2= "SELECT *
FROM ausencia_justificada
ORDER BY fecha_fin ASC LIMIT 1";
$respuesta = mysqli_query($conexion, $slq);

$respuesta2 = ['2023-12-01'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!--CSS De Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
<style>
  .fc-scrollgrid-section a{
    color: black;
    text-decoration: none;
  }
  .container-principal{
    width: 100%;
    height: 100vh;
    flex-direction: column;
  }
  .contenedor-segundario{
    padding-left: 20%;
    margin-top: 500px !important;
    padding-right: 3%;
    
    width: 100%;
  }
  .contenedor-boton a{
    text-decoration: none;
  }
  .fc-today-button{
    display:none !important; 
  }
/** footer universidad y creadores y ayudante */
.contenedor-upta {
  flex-direction: column;
  display: flex;
  justify-content: end;
  height: 100vh;

}

.contenedor-upta div {
  background-color: white;
  text-align: center;
  padding: 0 0 0 174px;
}

.contenedor-upta p {
  margin-bottom: 0;
  color: #9597a8;
  font-size: 15px;
}
  @media only screen and (max-width: 768px), handheld and (orientation: landscape){

    .contenedor-segundario{
    padding-left: 0%;
    margin-top: 100px;
    padding-right: 0%;
    
    width: 100%;
    
  }
  .contenedor-upta div {
  background-color: white;
  text-align: center;
  padding: 0;
}

  #calendar{
    height: 700px;
    
  }


}
@media only screen and (max-height: 768px), handheld and (orientation: landscape){
  .contenedor-segundario{
    
    margin-top: 375px; 
  }
}
</style>
</head>
<body>
  
  <?php include("include/header.php");?>
<div class="container-principal d-flex justify-content-center ">
  <div class="contenedor-segundario">
    <div id='calendar'></div>
    <div class="contenedor-boton d-flex justify-content-center mt-2 ml-2">
      <a href="./registro-ausencia.php" class="boton-actualizar">Regresar</a>
    </div>
  </div>
  <footer class="contenedor-upta d-flex">
    <div>
      <p>&copy Universidad Politécnica Territorial de Aragua Federico Brito Figuero(UPTA).</p>
      <p>&copy INCES la Romana</p>
    </div>
  </footer>
</div>


    <!-- JQuery -->
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/libreriasJS/bootstrap.bundle.min.js"></script>
        <!--Link de vinculacion-->
<script src="js/libreriasJS/fullcalendar/dist/index.global.min.jS"></script>

<script src="js/menu_2.0.js"></script>
  </body>
  </html>
  <!-- -->
  <script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'es',
    
    events: [
      <?php
       while($dataEvento = mysqli_fetch_array($respuesta)){ ?>
          {
          _id: '<?php echo $dataEvento['idpermiso']; ?>',
          title: '<?php echo $dataEvento['nombre']; ?>',
          start: '<?php echo $dataEvento['fecha_inicio']; ?>',
          end:   '<?php echo $dataEvento['fecha_fin']; ?>',
          color: '<?php echo $dataEvento['color']; ?>'
          },
        <?php } ?>
    ]
  });
  calendar.render();
});

</script>