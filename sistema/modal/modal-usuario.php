<!-- MODAL DE EDITAR -->

<!-- Modal -->
<div class="modal fade" id="editarModal<?php echo$row['idusuario'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header   bg-danger">
        <h5 class="modal-title text-white" id="exampleModalLabel">Actualizar datos </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <form class="" action="" method="post">
                  <div class=" mt-2 input-group " id="identificador-actualizar">
                      <label class="" for="">Identificador</label>
                      <span class="input-group-text" ><img src="icons/carpeta.png" alt=""></span>
                      <input readonly  class="modal-input  form-control" style="color: #858796;" id="" type="text" name="idusuario" placeholder="Sede" value="<?php echo $row['idusuario']?>"><br>
                  </div>                
            <!-- EDITAR NOMBRE -->
                  <div class=" input-group  mt-3 ">
                      <label class="" for="">Usuario</label>
                      <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                      <input class="form-control" type="text" name="editar-usuarios" placeholder="usuario" value="<?php echo $row['usuario']?>" ><br>
                    </div>       
                <!-- EDITAR USUARIO -->
                    <div class=" input-group  mt-3 ">
                      <label class="" for="">Nombre</label>
                      <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                      <input class="form-control" type="text" name="editar-nombre" placeholder="Contraseña" value="<?php echo $row['nombre']?>" ><br>
                    </div>       
                <!-- EDITAR CONTRASEÑA -->
                    <div class=" input-group  mt-3 ">
                      <label class="" for="">Contraseña</label>
                      <span class="input-group-text" ><img src="icons/candado.png"  id="contraseña" alt=""></span>
                      <input class="form-control" type="text" id="input-contraseña"name="editar-contraseña" placeholder="Nombre" value="<?php echo $row['contraseña']?>"><br>
                    </div>       
                <!-- EDITAR ROL-->
                    <div class=" input-group  mt-3 ">
                      <label class="" for="">Rol</label>
                      <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                      <select class="form-control" name="editar-rol" value="<?php echo $row['idrol']?>"><br>
                      <option style="color: #858796;" value="<?php echo $row['idrol'] ?>"><?php echo $row['rol'] ?></option>
                       <?php
                        $rol = "SELECT * FROM rol";
                        $resultado = mysqli_query($conexion, $rol);
                        while ($esta = mysqli_fetch_array($resultado)) {
                          $rol = $esta['rol'];
                          $idrol = $esta['idrol'];

                          ?>
                            <option value="<?php echo $idrol?>"><?php echo $rol?></option>
                          <?php
                        }
                       ?>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
                <button class="boton-eliminar" type="button" data-bs-toggle="modal" data-bs-target="#eliminarModal2<?php echo$row['idusuario'];?>">Eliminar</button>
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
          if (empty($_POST['editar-nombre'] ) || empty($_POST['editar-usuarios'] ) 
          || empty($_POST['editar-contraseña'] )  ) {
            ?>
            <script type="text/javascript">
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      })

                      Toast.fire({
                        icon: 'error',
                        title: 'Compos vacios'
                      })
            </script>
           
          <?php
         
          
          }else{
            include("php/conexion.php");
            $id=$_POST['idusuario'];
            $editarnombre = $_POST['editar-nombre'];
            $editarusuario = $_POST['editar-usuarios'];
            $editarcontraseña = $_POST['editar-contraseña'];
            $editarrol = $_POST['editar-rol'];
            $consulta2 ="UPDATE usuario SET  usuario='$editarusuario', contraseña='$editarcontraseña', nombre='$editarnombre', idrol='$editarrol' WHERE idusuario='$id'";
            $resultadoeditar = mysqli_query($conexion, $consulta2);

            if($resultadoeditar){
              ?>
              <script type="text/javascript">
                  Swal.fire({
                    title: 'Actualizacion Exitosa',
                        icon: 'success',
                        allowOutsideClick: false,
                        allowEnterKey: false,
                        confirmButtonText: false,
                        showConfirmButton: false,
                        html:'El usuario se actualizó correctamente, para cerrar la alerta dele click al boton <b>Aceptar</b> ',
                        footer:'<a class="boton-alerts-verde" href="tabla-usuario.php">ACEPTAR</a>',
                        
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

<div class="modal fade" id="eliminarModal2<?php echo$row['idusuario'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header  bg-danger">
        <h5 class="modal-title text-white" id="exampleModalLabel">¿ Estas seguro de eliminar estos datos?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="eliminar/eliminar-usuario.php" method="GET">
        <div class=" input-group  " id="identificador-eliminar">
            <label class="" for="">Identificador</label>
            <span class="input-group-text" ><img src="icons/carpeta.png" alt=""></span>
            <input readonly  class="modal-input form-control"  name="id" type="text" value="<?php echo  $row['idusuario']?>">
        </div>
            <!-- EDITAR NOMBRE -->
            <div class=" input-group mt-3 ">
                <label class="" for="">Nombre</label>
                <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                <input readonly class="modal-input form-control" type="text" name="editar-nombre" placeholder="Nombre" value="<?php echo $row['nombre']?>"><br>
            </div>       
            <!-- EDITAR USUARIO -->
            <div class=" input-group mt-3 ">
                <label class="" for="">Usuario</label>
                <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                <input readonly class="modal-input form-control" type="text" name="editar-usuarios" placeholder="Usuario" value="<?php echo $row['usuario']?>"><br>
            </div>       
            <!-- EDITAR CONTRASEÑA -->
            <div class=" input-group mt-3 ">
                <label class="" for="">Contraseña</label>
                <span class="input-group-text" ><img src="icons/candado.png" alt=""></span>
                <input readonly class="modal-input form-control" id="input-contrase" type="text" name="editar-contraseña" placeholder="Contraseña" value="<?php echo $row['contraseña']?>"><br>
            </div>     
            <!-- EDITAR ROL -->
            <div class=" input-group mt-3 ">
                <label class="" for="">Rol</label>
                <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                <input readonly class="modal-input form-control" type="text" name="editar-contraseña" placeholder="Contraseña" value="<?php echo $row['rol']?>"><br>
            </div>    
        </div>
        <div class="modal-footer">
          <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
          <button class="boton-actualizar" type="button" data-bs-toggle="modal" data-bs-target="#editarModal<?php echo$row['idusuario'];?>">Actualizar</button>
          <input type="submit" id="eliminar" name ="eliminar" class="boton-eliminar" value="Eliminar">
        </div>
      </form>
      </div>
    </div>
  </div>
</div>