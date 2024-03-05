<?php
session_start();
include("php/rol.php");
include ("php/conexion.php");
$idprimero = 1;
$consulta_comida = "SELECT * FROM menu WHERE  idmenu = '".$idprimero."'";
$resultado_comida = $conexion->query($consulta_comida);
while($row =$resultado_comida->fetch_assoc()){
   $lunes = $row['lunes_menu'];
   $martes = $row['martes_menu'];
   $miercoles = $row['miercoles_menu'];
   $jueves = $row['jueves_menu'];
   $viernes = $row['viernes_menu'];
   $sabado = $row['sabado_menu'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú del día</title>
     <!--CSS De Bootstrap-->
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!-- CSS del nostros  -->
    <link rel="stylesheet" href="css/menu_comer.css">
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
  <!-- Menú-->
<?php include("include/header.php");?>
<main class="contenedor-primario d-flex conteiner-fluid">
    <div class="contendor-segundario conteiner-fluid">
        <div class="contendor-tercero">
          <form method="POST">
            <!-- MENU DE COMIDA -->
            <figure class=" container-fluid d-flex justify-content-center">
              <img class="img-menu menu-menu" src="./menu/menu2.jpeg" alt="menu del día">
            </figure>
            <div class="contenedor__figure">
              <!-- COMIDA DEL DIA LUNES -->
              <figure class="contenedor-comida">
                <img class="img-menu" src="./menu/lunes2.jpeg" alt="menu del día">
                <div class="div__comida">
                  <textarea  class="text-comida" id="texto1" name="lunes" rows="5" cols="80" disabled><?php echo $lunes?></textarea>
                  <div class="div-text-menuComida" id="div">
                  <?php echo $lunes?>
                  </div>
                </div>
              </figure>
              <!-- COMIDA DEL DIA MARTES -->
              <figure class="contenedor-comida">
                <img class="img-menu" src="./menu/martes2.jpeg" alt="menu del día">
                <div>
                  <textarea  class="text-comida" id="texto2" name="martes" rows="5" cols="45" disabled><?php echo $martes?></textarea>
                  <div class="div-text-menuComida">
                  <?php echo $martes?>
                  </div>
                </div>
              </figure>
              <!-- COMIDA DEL DIA MIERCOLES -->
              <figure class="contenedor-comida">
                <img  class="img-menu" src="./menu/miercoles2.jpeg" alt="menu del día">
                <div>
                  <textarea  class="text-comida" id="texto3" name="miercoles" rows="5" cols="45" disabled><?php echo $miercoles?></textarea>
                  <div class="div-text-menuComida">
                  <?php echo $miercoles?>
                  </div>
                </div>
              </figure>
              <!-- COMIDA DEL DIA JUEVES -->
              <figure class="contenedor-comida">
                <img  class="img-menu" src="./menu/jueves2.jpeg" alt="menu del día">
                <div>
                  <textarea  class="text-comida" id="texto4" name="jueves" rows="5" cols="45" disabled><?php echo $jueves?></textarea>
                  <div class="div-text-menuComida">
                  <?php echo $jueves?>
                  </div>
                </div>
              </figure>
              <!-- COMIDA DEL DIA VIERNES -->
              <figure class="contenedor-comida">
                <img  class="img-menu" src="./menu/viernes2.jpeg" alt="menu del día">
                <div>
                  <textarea disabled class="text-comida" id="texto5" name="viernes" rows="5" cols="45" disabled><?php echo $viernes?></textarea>  
                  <div class="div-text-menuComida">
                  <?php echo $viernes?>
                  </div>
                </div>
              </figure>
              <!-- COMIDA DEL DIA SABADO -->
              <figure class="contenedor-comida">
                <img  class="img-menu" src="./menu/sabado2.jpeg" alt="menu del día">
                <div>
                  <textarea  class="text-comida" id="texto6" name="sabado" rows="5" cols="45" disabled><?php echo $sabado?></textarea>
                  <div class="div-text-menuComida">
                  <?php echo $sabado?>
                  </div>
                </div>
              </figure>
            </div>
            <?php
              if($idrol == 1 || $idrol == 4){
                ?>
                  <div class="contenedor-botones">
                    <input class="boton-alerts-verde" name="boton-aceptar" type="submit" id="actualizar_menu" value="Actualizar">
                    <button class="boton-alerts-amarillo butonhabi" id="butonMenu" type="button" >Cambiar Menu</button>
                  </div>
                <?php
              }
            ?>
            
          </form>
        </div>
    </div>
  <footer class="contenedor-upta d-flex ">
    <div>
      <p>&copy Universidad Politécnica Territorial de Aragua Federico Brito Figuero(UPTA).</p>
      <p>&copy INCES la Romana</p>
    </div>
  </footer>
</main>

<!-- BootsTrap -->
<script src="js/libreriasJS/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="js/libreriasJS/sweetalert2.all.min.js"></script>
<!-- JQuery -->
<script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
<!-- Llamado de DataTable -->
<script src="./js/menu_comer.js"></script>
<script src="js/menu_2.0.js"></script>
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
</body>
</html>

<?php

if(isset($_POST['boton-aceptar'])){

    $lunes = $_POST['lunes'];
    $martes = $_POST['martes'];
    $miercoles = $_POST['miercoles'];
    $jueves = $_POST['jueves'];
    $viernes = $_POST['viernes'];
    $sabado = $_POST['sabado'];
    
    $identificador_usaurio = $id;
    $consulta_dias = "UPDATE menu SET 
    lunes_menu = '$lunes', 
    martes_menu = '$martes', 
    miercoles_menu = '$miercoles', 
    jueves_menu = '$jueves', 
    viernes_menu = '$viernes', 
    sabado_menu = '$sabado',
    iden_usuario = '$identificador_usaurio' ";

    $resultado_menu = mysqli_query($conexion, $consulta_dias);

  if($resultado_menu){
    ?>
      <script type="text/javascript">
        Swal.fire({
        title: 'Cambio de menú exitoso !!!',
        icon: 'success',
        allowOutsideClick: false,
        allowEnterKey: false,
        confirmButtonText: false,
        showConfirmButton: false,
        html:'Para notar los cambios es encesario refrescar la pantalla dele click al boton<b> Aceptar</b> para que los cambios ya sean visibles ',
        footer:'<a class="boton-alerts-verde" href="menu_comer.php">ACEPTAR</a>',
                        
        })
      </script>
    <?php

  }
}

?>