
<?php
session_start();
include("php/rol.php");
include 'php/conexion.php';


date_default_timezone_set("America/Caracas");
date("d");




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!--Link de vinculacion-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>

</head>
<body>
<div class="col-ld-12">
  <div class="card">
    <div class="card-header">
    <img class="img-menu menu-menu" src="./menu/Picsart_23-04-10_11-38-18-109.jpeg" alt="menu del día">

      Featured
    </div>
    <div class="card-body">
     <div class="row">
        <div class="col-lg-2">
          <button class="btn btn-success">grafico bar</button>
          <button class="btn btn-danger">grafico bar</button>
          <button class="btn btn-warning" onclick="CodigoDeBar()">grafico bar</button>
        </div>
     </div>
    </div>
  </div>
</div>
    <!-- JQuery -->
    <script src="js/jquery-3.6.3.min.js"></script>
    
     
  </body>
  </html>
  <!-- -->
<script type="text/javascript">
  function CodigoDeBar(){
    
  }
</script>