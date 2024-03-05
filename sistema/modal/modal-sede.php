<!-- MODAL DE EDITAR -->

<!-- Modal -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger ">
        <h5 class="modal-title text-white" id="exampleModalLabel">Actualizar datos </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <form class="" action="" method="post">
                  <div class=" mt-2 input-group  "id="identificador-actualiza">
                    <label class="" for="">Identificador</label>
                    <span class="input-group-text" ><img src="icons/carpeta.png" alt=""></span>
                    <input readonly  class="modal-input  form-control" name="idsede" type="text">
                  </div>
                  <!-- EDITAR SEDE -->
                    <div class=" mt-3 input-group  ">
                      <label class="" for="">Dependencia</label>
                      <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                      <input class="form-control" type="text" name="editar-sede" placeholder="Sede"  onkeypress="return soloLetras(event);" autocomplete="off"><br>
                    </div>
                  <!-- MODAL DE ESTADO -->
                    <div class=" input-group mb-3">
                      <label class="mt-3" for="">Estados</label>
                      <span class="input-group-text" ><img src="icons/sede-sede.png" alt=""></span>
                      <select class="form-control" name="editar-estado"><br>
                      <option value="<?php echo $row['idestado'] ?>"><?php echo $row['estado'] ?></option>
                       <?php
                        $estados = "SELECT * FROM estados";
                        $resultado = mysqli_query($conexion, $estados);
                        while ($esta = mysqli_fetch_array($resultado)) {
                          $estado = $esta['estado'];
                          $idestado = $esta['idestado'];

                          ?>
                            <option value="<?php echo $idestado?>"><?php echo $estado?></option>
                          <?php
                        }
                       ?>
                    </select>
                 </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
                <button class="boton-eliminar" type="button" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo$row['idsede'];?>">Eliminar</button>
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
          if (empty($_POST['editar-sede'] )) {
            ?>
            <script type="text/javascript">
                Swal.fire({
                  title: 'Error!',
                  text: 'El campo sede no contiene ninguna información',
                  icon: 'error',
                  allowOutsideClick: false,
                  allowEnterKey: false,
                  showConfirmButton: false,
                  timer: 4000
                });
            </script>
           
          <?php
          exit();
          
          }else{
            include("php/conexion.php");
            $id=$_POST['idsede'];
            $editarsedes = $_POST['editar-sede'];
            $editarestado = $_POST['editar-estado'];
            $consulta2 ="UPDATE sedes SET sede='$editarsedes',idestados='$editarestado' WHERE idsede='$id'";
            $resultadoeditar = mysqli_query($conexion, $consulta2);

            if($resultadoeditar){
              ?>
                  <script type="text/javascript">
                         Swal.fire({
                          title: 'Actualización Exitosa',
                          text:'La actualización se realizo de manera correcta  ',
                          icon: 'success',
                          allowOutsideClick: false,
                          allowEnterKey: false,
                          confirmButtonText: false,
                          showConfirmButton: false,
                          html:'La dependenica se actualizó de manera exitosa, para cerra dele click al boton <b>Aceptar</b> ',
                          footer:'<a class="boton-alerts-verde" href="registo-sede.php">ACEPTAR</a>'
                        })  
              </script>
              <?php
            }
          }
        }
      }
      
      ?>
<!------------------------------------------------------------------------------------------------------>
<!-- MODAL DE ELIMINAR -->
<div class="Desvanecimiento modal" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h1 class="modal-title  text-white fs-5" id="exampleModalLabel">¿ Estas seguro de eliminar estos datos?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="eliminar/eliminar-sede.php" method="GET">
        <div class=" mt-2 input-group  " id="identificador-eliminar">
            <label class="" for="">Identificador</label>
            <span class="input-group-text" ><img src="icons/carpeta.png" alt=""></span>
            <input readonly  class="" id="idper" name="idsede" type="text" >
        </div>

        <div class="mt-3 input-group  ">
            <label class="" for="">Sede</label>
            <span class="input-group-text" ><img src="icons/sede-sede.png" alt=""></span>
            <input readonly  class="modal-input form-control" id="sede_sede" type="text">
        </div>

        <div class="mt-3 input-group  ">
            <label class="" for="">Estado</label>
            <span class="input-group-text" ><img src="icons/estado-venezuela.png" alt=""></span>
            <input readonly  class="modal-input  form-control " id="estado" type="text">

        </div>
         

         
      </div>
      <div class="modal-footer">
        <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
        <button class="boton-actualizar" type="button" id="actualizar_eliminar" >Actualizar</button>
        <input type="submit" id="eliminar" class="boton-eliminar" value="Eliminar">
        
      </div>
      </form>
      
    </div>
  </div>
</div>

<!------------------------------------------------------------------------------------------------------>