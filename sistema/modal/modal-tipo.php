<!-- MODAL DE EDITAR -->

<!-- Modal -->
<div class="modal fade" id="editarModal<?php echo$row['idestatus'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar datos </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <form class="" action="" method="post">
                <div class="mt-2 input-group  " id="identificador-actualiza">
                  <label class="" for="">Identificador</label>
                  <span class="input-group-text" ><img src="icons/carpeta.png" alt=""></span>
                  <input readonly id="input" class="modal-input form-control" name="idesta" type="text" value="<?php echo  $row['idestatus']?>" readonly>
                </div>
            <!-- EDITAR SEDE -->
                <div class="mt-3 input-group  ">
                  <label class="" for="">Estatus</label>
                  <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                  <input class="form-control" type="text" id="" name="editar-estatus2" placeholder="Estatus" value="<?php echo $row['estatus']?>" onkeypress="return soloLetras(event);" autocomplete="off"  onkeyup="convertirTexto()"><br>
                </div>       
            </div>
            <div class="modal-footer">
                <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
                <button class="boton-eliminar" type="button" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo$row['idestatus'];?>">Eliminar</button>
                <input type="submit" name="boton-guardar" class="boton-actualizar" value="Actualizar">
                
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
      <?php
      if(isset($_POST['boton-guardar'])){
        if (!empty($_POST)) {
          if (empty($_POST['editar-estatus2'] )) {
            ?>
            <script type="text/javascript">
                Swal.fire({
                  
                  title: 'Error!',
                  text: 'El campo estatus no contiene ninguna información',
                  icon: 'error',
                  allowOutsideClick: false,
                  allowEnterKey: false,
                  showConfirmButton: false,
                  footer:'<a class="btn btn-danger" href="registro-tipo.php">ACEPTAR</a>',
                });
            </script>
           
          <?php
          exit();
          
          }else{
            include("php/conexion.php");
            $id=$_POST['idesta'];
            $editarestatus = $_POST['editar-estatus2'];
           
            $consulta_estatus ="UPDATE estatus SET estatus='$editarestatus' WHERE idestatus='$id' " ;
            $resultadoeditar = mysqli_query($conexion, $consulta_estatus);

            if($resultadoeditar){
              ?>
              <script type="text/javascript">
                  Swal.fire({
                    title: 'Actualización Exitosa',
                        text: 'La actualización se realizo de manera correcta y exitosa',
                        icon: 'success',
                        allowOutsideClick: false,
                        allowEnterKey: false,
                        confirmButtonText: false,
                        showConfirmButton: false,
                         html:'El estatus se actualizó de manera exitosa, para cerrar la alerta dele click al boton <b>Aceptar</b> ',
                        footer:'<a class="boton-alerts-verde" href="registro-tipo.php">ACEPTAR</a>',
                        
                  })
              </script>
              <?php
            }
          }
        }
      }
      
      ?>
   
<!------------------------------------------------------------------------------------------------------>


<!------------------------------------------------------------------------------------------------------>


<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header  bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">¿ Estas seguro de eliminar estos datos?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="eliminar/eliminar-tipo.php" method="GET">
        <div class="mt-2 input-group  " id="identificador-eliminar">
            <label class="" for="">Identificador</label>
            <span class="input-group-text" ><img src="icons/carpeta.png" alt=""></span>
            <input readonly id="estatus_id" class="modal-input form-control" name="idestatus"  readonly>
        </div>

        <div class=" mt-3 input-group  ">
            <label class="" for="">Estatus</label>
            <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
            <input readonly id="estatus" class="modal-input form-control" type="text" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
        
        <input type="submit" id="eliminar" class="boton-eliminar" value="Eliminar">
      </div>
      </form>
    </div>
  </div>
</div>


