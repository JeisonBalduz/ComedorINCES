
<?php
//ADMINISTRADOR
  if($idrol == 1 || $idrol == 4){
    ?>   
          
      <div class="contenedor_segundario d-flex justify-content-center ">
        <a href="tabla-registro.php">
        <figure class="d-flex align-items-center">
          <img class="ms-3" src="icons/grupo.png" alt="">
          <div class="d-flex align-items-end ps-2">
            <span lass="me-2">Personal</span>
            <h6 class="ms-2 me-2">   <?php  echo $cantidad_personal?></h6>
          </div>
        </figure>
        </a>

        <a href="tabla-usuario.php">
        <figure class="d-flex align-items-center">
          <img  class="ms-3" src="icons/usuario.png" alt="">
          <div class="d-flex align-items-end ps-2"> 
            <span class="me-2">Usuarios</span>
             <h6 class="ms-2 me-2"><?php  echo $cantidad_usuarios?></h6>
          </div>
        </figure>
        </a>

        <a href="tabla-tickets.php">
        <figure class="d-flex align-items-center">
          <img class="ms-3 " src="icons/grupo.png" alt="">
          <div class="d-flex align-items-end ps-2">
            <span lass="me-2">Tickets</span>
             <h6 class="ms-2 me-2"><?php  echo $cantidad_tickets?></h6>
          </div>
        </figure>
        </a>
      </div>
    <?php
  }
//COMEDOR
  if($idrol == 2){
    ?>   
          
      <div class="contenedor_segundario d-flex justify-content-center ">
        <a href="#">
        <figure class="d-flex align-items-center">
          <img class="ms-3" src="icons/grupo.png" alt="">
          <div class="d-flex align-items-end ps-2">
            <span lass="me-2">Personal</span>
            <h6 class="ms-2 me-2">   <?php  echo $cantidad_personal?></h6>
          </div>
        </figure>
        </a>

        <a href="./registro-ticket.php">
        <figure class="d-flex align-items-center">
          <img class="ms-3 " src="icons/grupo.png" alt="">
          <div class="d-flex align-items-end ps-2">
            <span lass="me-2">Tickets</span>
             <h6 class="ms-2 me-2"><?php  echo $cantidad_tickets?></h6>
          </div>
        </figure>
        </a>
      </div>
    <?php
  }
//BIENESTAR SOCIAL
if($idrol == 3){
    ?>   
          
      <div class="contenedor_segundario d-flex justify-content-center ">
        <a href="#">
        <figure class="d-flex align-items-center">
          <img class="ms-3" src="icons/grupo.png" alt="">
          <div class="d-flex align-items-end ps-2">
            <span lass="me-2">Personal</span>
            <h6 class="ms-2 me-2">   <?php  echo $cantidad_personal?></h6>
          </div>
        </figure>
        </a>

        <a href="./registro-ticket.php">
        <figure class="d-flex align-items-center">
          <img class="ms-3 " src="icons/grupo.png" alt="">
          <div class="d-flex align-items-end ps-2">
            <span lass="me-2">Ausencia</span>
             <h6 class="ms-2 me-2"><?php  echo $cantidad_ausencia?></h6>
          </div>
        </figure>
        </a>
      </div>
    <?php
  }

  
?>
  