<!-- MODAL DE EDITAR -->

<!-- Modal -->
<div class="modal fade" id="editarModal<?php echo$row['idpermiso'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger ">
        <h5 class="modal-title text-white" id="exampleModalLabel">Actualizar datos </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <form class="" action="" method="POST">
                <div class="input-group mb-3 mt-2" id="identificador-actualizar">
                  <label class="" for="">Identificador</label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/carpeta.png" alt=""></span>
                  <input class="modal-input form-control" id="idper" type="text" name="idper" value="<?php echo  $row['idpermiso']?>" readonly><br>
               </div>
                <!-- FECHA INICIO -->
                <div class=" input-group mb-3 ">
                    <label class="" for="">Fecha inico</label>
                    <span class="input-group-text" ><img src="icons/calendario.png" alt=""></span>
                    <input class="form-control" type="date" name="editar-fecha-inico" placeholder="Nombre" value="<?php echo $row['fecha_inicio']?>" ><br>
                </div>
                <!-- FECHA FIN -->
                <div class=" input-group  mb-3">
                    <label class="" for="">Fecha fin</label>
                    <span class="input-group-text" ><img src="icons/calendario.png" alt=""></span>
                    <input class="form-control" type="date" name="editar-fecha-fin" placeholder="Apellido" value="<?php echo $row['fecha_fin']?>" ><br>
                </div>
                <!-- PERMISO -->
                <div class=" input-group  mb-3">
                  
                    <label class="mt-3" for="">Permiso</label>
                    <span class="input-group-text" id="basic-addon1"><img src="icons/permiso.png" alt=""></span>
                    <select class="form-control" name="permiso" id="">
                      <option value="Vacaciones" >Vacaciones</option>
                      <option value="Reposo">Reposo</option>
                      <option value="Proceso Administrativo">Proceso Administrativo</option>
                      <option value="Proceso">Proceso</option>
                    </select><br>
                  
                </div>
                
            
            <div class="modal-footer">
                <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
                <button class="boton-eliminar" type="button" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo$row['idpersonal'];?>">Eliminar</button>
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
          if (empty($_POST['editar-fecha-inico'] )|| empty($_POST['editar-fecha-fin'] ) 
          || empty($_POST['permiso']  )) {
            ?>
            <script type="text/javascript">
                Swal.fire({
                  title: 'Error!',
                  text: 'Falta un campo por llenar',
                  icon: 'error',
                  allowOutsideClick: false,
                  allowEnterKey: false,
                  showConfirmButton: false,
                  footer:'<a class="btn btn-danger" href="tabla-ausencia.php">ACEPTAR</a>',
                });
            </script>
           
          <?php
          exit();
          
          }else{
            include("php/conexion.php");
            $id=$_POST['idper'];
            $editarfechainicio = $_POST['editar-fecha-inico'];
            $editarfechafin = $_POST['editar-fecha-fin'];
            $editarpermiso = $_POST['permiso'];
           
            $consulta2 ="UPDATE ausencia_justificada SET fecha_inicio='$editarfechainicio', fecha_fin='$editarfechafin', permiso='$editarpermiso' WHERE idpermiso = '$id'";
            $resultadoeditar = mysqli_query($conexion, $consulta2);

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
                        html:'La ausencia se actualizó de manera exitosa, para cerrar la alerta dele click al boton <b>Aceptar</b> ',
                        footer:'<a class="boton-alerts-verde" href="tabla-ausencia.php">ACEPTAR</a>',
                        
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
<div class="Desvanecimiento modal" id="eliminarModal<?php echo$row['idpersonal'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h1 class="modal-title text-white fs-5" id="exampleModalLabel">¿ Estas seguro de eliminar estos datos?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="eliminar/eliminar-ausencia.php" method="GET">
        <div class="input-group " id="identificador-eliminar">
            <label class="mt-3" for="">Identificador</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/carpeta.png" alt=""></span>
            <input class="modal-input form-control" id="idper" type="text" name="idpermiso" value="<?php echo  $row['idpermiso']?>" readonly><br>
        </div>

        <div class="mt-3 input-group  ">
            <label class="" for="">Nombre</label>
            <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
            <input class="modal-input form-control"  name="nombre" type="text"  value="<?php echo  $row['nombre']?>" readonly><br>
        </div>

        <div class="mt-3 input-group  ">
            <label class="" for="">Apellido</label>
            <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
            <input class="modal-input form-control"  name="apellido" type="text"  value="<?php echo  $row['apellido']?>" readonly ><br>
        </div>

        <div class="mt-3 input-group  ">
            <label class="" for="">Cedula</label>
            <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
            <input class="modal-input form-control"  name="cedula" type="text"  value="<?php echo  $row['cedula']?>" readonly ><br>
        </div>
      
        <div class=" mt-3 input-group  ">
            <label class="" for="">Dependencia</label>
            <span class="input-group-text" ><img src="icons/sede-sede.png" alt=""></span>
            <input class="modal-input form-control"  name="dependencia" type="text"  value="<?php echo  $row['sede']?>" readonly><br>
        </div>

        <div class="mt-3 input-group  ">
            <label class="" for="">Estatus</label>
            <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
            <input class="modal-input form-control" name="estatus2" type="text"  value="<?php echo  $row['estatus']?>" readonly ><br>
        </div>

        <div class="mt-3 input-group  ">
            <label class="" for="">Permiso</label>
            <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
            <input class="modal-input form-control" name="estatus2" type="text"  value="<?php echo  $row['permiso']?>" readonly ><br>
        </div>

            
      </div>
      <div class="modal-footer">
        <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
        <button class="boton-actualizar" type="button" data-bs-toggle="modal" data-bs-target="#editarModal<?php echo$row['idpermiso'];?>">Actualizar</button>
        <input type="submit" id="eliminar" class="boton-eliminar"  value="Eliminar">
        
      </div>
      </form>
      
    </div>
  </div>
</div>
<script src="js/todo.js"></script>