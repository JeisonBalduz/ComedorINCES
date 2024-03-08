<?php
//ADMINISTRADOR
if($idrol == 1){
    ?>
      <div class="contenedor-basedb">
          <!--boton de descarga de la base de datos-->
          <button class="boton-actualizar basedb me-2" id="botonbd">
          Descargar Base de datos 
          </button>
          <!--boton de descarga del manual de usuario-->
          <a download href="./manual/manual_usuario_administrador.pdf" class="boton-eliminar basedb me-2">
            Descargar Manual
          </a>
      </div> 
    <?php
  }
  //COMEDOR
  if($idrol == 2){
    ?>
       <div class="contenedor-basedb">
          <!--boton de descarga del manual de usuario-->
          <a download href="./manual/manual_usuario_comedor.pdf" class="boton-eliminar basedb me-2">
            Descargar Manual
          </a>
      </div> 
    <?php
  }
  //BIENESTAR SOCIAL
  if($idrol == 3){
    ?>
       <div class="contenedor-basedb">
          <!--boton de descarga del manual de usuario-->
          <a download href="./manual/manual_usuario_Bienestar_Social.pdf" class="boton-eliminar basedb me-2">
            Descargar Manual
          </a>
      </div> 
    <?php
  }
  //ADMIN RRHH
  if($idrol == 4){
    ?>
       <div class="contenedor-basedb">
          <!--boton de descarga del manual de usuario-->
          <a download href="./manual/manual_usuario_adminRRHH.pdf" class="boton-eliminar basedb me-2">
            Descargar Manual
          </a>
      </div> 
    <?php
  }
  //SOLICITADOR DCAD
  if($idrol == 5){
    ?>
       <div class="contenedor-basedb">
          <!--boton de descarga del manual de usuario-->
          <a download href="./manual/manual_usuario_solicitadorDCDA.pdf" class="boton-eliminar basedb me-2">
            Descargar Manual
          </a>
      </div> 
    <?php
  }
?>