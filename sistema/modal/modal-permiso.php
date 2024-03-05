<!-- MODAL DE EDITAR -->

<!-- Modal -->
<div class="modal fade" id="boton-permiso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Crear Permiso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <form class="" action="" method="post">
            <!-- CREAR PERMISO -->
                <div class="mt-3 input-group  ">
                  <label class="" for="">Crear permiso</label>
                  <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                  <input minlength="3" maxlength="22" class="form-control" type="text" id="" name="crear-permiso" placeholder="Nombre del permiso"  onkeypress="return soloLetras(event);" autocomplete="off"  ><br>
                </div>       
            </div>
            <div class="modal-footer">
                <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
                <input type="submit" name="boton-guardar" class="boton-verde" value="Crear Permiso">
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
      <?php
      if(isset($_POST['boton-guardar'])){
        if (!empty($_POST)) {
          if (empty($_POST['crear-permiso'] )) {
            ?>
            <script type="text/javascript">
                Swal.fire({
                  
                  title: 'Error!',
                  text: 'El campo de crear permisos no contiene ninguna información',
                  icon: 'error',
                  allowOutsideClick: true,
                  allowEnterKey: true,
                  showConfirmButton: false,
                  footer:'<a class="btn btn-danger" href="registro-ausencia.php">ACEPTAR</a>',
                });
            </script>
           
          <?php
          exit();
          
          }else{
            include("php/conexion.php");
            $crearpermisos = $_POST['crear-permiso'];
           
            $conexion->query("SET @autoid := 0");
            $conexion->query("UPDATE permisos SET idpermisos_aj = (@autoid := @autoid + 1)");
            $conexion->query("ALTER TABLE permisos AUTO_INCREMENT = 1");
            $consulta_permisos ="INSERT INTO permisos (permisos) VALUES ('$crearpermisos') " ;
            $resultadoeditar = mysqli_query($conexion, $consulta_permisos);

            if($resultadoeditar){
              ?>
              <script type="text/javascript">
                  Swal.fire({
                    title: 'Crearción Exitosa!',
                        
                        icon: 'success',
                        allowOutsideClick: false,
                        allowEnterKey: false,
                        confirmButtonText: false,
                        showConfirmButton: false,
                         html:'Se creo de manera exitosa el nuevo permiso, para cerrar la alerta dele click al boton <b>Aceptar</b> ',
                        footer:'<a class="boton-alerts-verde" href="registro-ausencia.php">ACEPTAR</a>',
                        
                  })
              </script>
              <?php
            }
          }
        }
      }
      
      ?>
   