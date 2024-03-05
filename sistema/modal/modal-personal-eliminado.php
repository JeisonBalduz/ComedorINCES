<!-- MODAL DE EDITAR -->

<!-- Modal -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-white">
        <h5 class="modal-title" id="exampleModalLabel">Habilitar personal </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div class="input-group " id="identificador-eliminar">
                <label class="mt-3" for="">Identificador</label>
                <span class="input-group-text" id="basic-addon1"><img src="icons/carpeta.png" alt=""></span>
                <input class="modal-input form-control" id="idper" type="text" name="idper" value="<?php echo  $row['idpersonal']?>" readonly><br>
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

            
            
        </div>
        <p class="ms-3 me-3" style="font-size: 15px; color: #555;">
            Esta persona está deshabilitada, si se desea habilitar dele click 
            al boton <b>Habilitar</b>, esto hara que esta persona sea eliminada de esta tabla 
            para habilitarla en registro de personal.
        </p>
        <div class="modal-footer">
            <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
            <button class="boton-actualizar" type="button" data-bs-toggle="modal" data-bs-target="#editarModal<?php echo$row['idpersonal'];?>">Actualizar</button>
            <input type="submit" id="eliminar" class="boton-verde" name="habilitar" value="Habilitar">
            
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
      <?php
      if(isset($_POST['habilitar'])){
        if (!empty($_POST)) {
          
            include("php/conexion.php");
            $id=$_POST['idper'];
            $activo= 1;
            $consulta1 ="UPDATE personal SET activo='$activo' WHERE idpersonal = '$id'";
            $resultadoeditar1 = mysqli_query($conexion, $consulta1);

            $consulta2 ="DELETE FROM personal_eliminado WHERE idpersonal = '$id' ";
            $resultadoeditar2 = mysqli_query($conexion, $consulta2);

            if($resultadoeditar2){
              ?>
              <script type="text/javascript">
                  Swal.fire({
                    title: 'Actualización Exitosa',
                        icon: 'success',
                        allowOutsideClick: false,
                        allowEnterKey: false,
                        confirmButtonText: false,
                        showConfirmButton: false,
                        html:'Esta persona se habilito de manera exitosa, para cerrar la alerta dele click al boton <b>Aceptar</b> ',
                        footer:'<a class="boton-alerts-verde" href="tabla-eliminados-registros.php">ACEPTAR</a>',
                        
                  })
              </script>
              <?php
            }
          }
        }
      
      ?>