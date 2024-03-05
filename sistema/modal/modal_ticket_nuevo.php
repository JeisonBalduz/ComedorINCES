<!-- MODAL DE EDITAR -->

<!-- Modal -->
<div class="modal fade" id="NuevoTicket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header  text-white">
        <h5 class="modal-title text-black" id="exampleModalLabel">Invitados </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <form class="" action="" method="post">
                <div class="mt-2 input-group  ">
                  <label class="" for="input">Cédula</label>
                  <span class="input-group-text" ><img src="icons/cedula2.png" alt=""></span>
                  <input minlength="6" maxlength="10" id="input" class="modal-input form-control" name="cedula_visita" type="text" placeholder="Cédula" onkeypress="return SoloNumeros(event);" autocomplete="off">
                </div>
                <div class="mt-3 input-group  ">
                  <label class="" for="">Nombre</label>
                  <span class="input-group-text" ><img src="icons/carpeta.png" alt=""></span>
                  <input id="input" class="modal-input form-control" name="nombre_visita" type="text" placeholder="Nombre" onkeypress="return soloLetras(event);" autocomplete="off">
                </div>
            <!-- EDITAR SEDE -->
                <div class="mt-3 input-group  ">
                  <label class="" for="">Apellido</label>
                  <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                  <input class="form-control" type="text" name="apellido_visita" placeholder="Apellido" onkeypress="return soloLetras(event);" autocomplete="off"><br>
                </div>
                <div class="mt-3 input-group  ">
                  <label class="" for="">Dependencia</label>
                  <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                  <input minlength="3" maxlength="40" class="form-control" type="text" name="sede_visita" placeholder="Dependencia" onkeypress="return soloLetras(event);" autocomplete="off"><br>
                </div>     
                <div class="mt-3 input-group  ">
                  <label class="" for="">Estatus</label>
                  <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                  <input class="form-control input_estatus_invitado" type="text" name="visita_estatus" placeholder="Estatus" value="<?php echo "Invitado";?>" readonly><br>
                </div>
                <div class="mt-3 input-group  ">
                  <label class="" for="">Comida</label>
                  <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                    <select class="form-control" name="visita_comida"><br>
                      <option>Selecciona el tipo de comida</option>
                      <option value="Desayuno">Desayuno</option>
                      <option value="Almuerzo">Almuerzo</option>
                      <option value="Cena">Cena</option>
                    </select>
                </div>                        
            <div class="modal-footer">
                <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
                   <!-- EDITAR SEDE 
               <button class="boton-verde" type="button" data-bs-toggle="modal" data-bs-target="#tablaInvitados">
                   Tabla invitados                     
                </button>
                -->
                  <a href="tabla_invitados.php" class="boton-verde"  target="_blank" rel="noopener">Tabla de invitados</a>    
                <input type="submit" name="boton-guardar" class="boton-actualizar" value="Generar">
                    
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<?php
      if(isset($_POST['boton-guardar'])){
        if (!empty($_POST)) {
          if (empty($_POST['cedula_visita'] ) || empty($_POST['nombre_visita'] ) || empty($_POST['apellido_visita'] )) {
            ?>
            <script type="text/javascript">
                Swal.fire({
                  
                  title: 'Error!',
                  text: 'Por Favor rellene todos los campos correspondientes',
                  icon: 'error',
                  allowOutsideClick: false,
                  allowEnterKey: false,
                  showConfirmButton: false,
                  footer:'<a class="btn btn-danger" href="registro-ticket.php">ACEPTAR</a>',
                });
            </script>
           
          <?php
          exit();
          
          }else{
            include("php/conexion.php");
            $cedula2= $_POST['cedula_visita'];
            $nombre2= $_POST['nombre_visita'];
            $apellido2= $_POST['apellido_visita'];
            $sede2= $_POST['sede_visita'];
            $estatus2= $_POST['visita_estatus'];
            $comida2= $_POST['visita_comida'];

            $fecha_invi = date("Y-m-d");
            $hora_invi = date("h:i:s:A");
            $usuario_invi =  $id; 
            $estatus_invi =  1; 
            
            $consulta ="INSERT INTO invitados( nombre_invi, apellido_invi, 
            cedula_invi, sede_inivitado, estatus_invitado, comida_invitado, 
            fecha_inv, hora_inv, id_usuario_invi, estatus_invi) VALUES ( '$nombre2', 
            '$apellido2', '$cedula2', '$sede2', '$estatus2', '$comida2', '$fecha_invi ',
            ' $hora_invi', '$usuario_invi', '$estatus_invi')";
            
           $verificar_invitado_personal= mysqli_query($conexion, "SELECT * FROM personal WHERE cedula = '$cedula2' ");
            if(mysqli_num_rows($verificar_invitado_personal) > 0){
              ?>
              <script type="text/javascript">
                  Swal.fire({
                        title: 'Personal !!',
                        text: 'Esta personal no puede pedir ticket por invitación ',
                        icon: 'warning',
                        confirmButtonText: false,
                        showConfirmButton: false,
                        timer: 4000       
                  })
              </script>
              <?php
              exit();
            }

           $verificar_invitado= mysqli_query($conexion, "SELECT * FROM invitados WHERE cedula_invi = '$cedula2' AND estatus_invi = '1' ");
            if(mysqli_num_rows($verificar_invitado) > 0){
              ?>
              <script type="text/javascript">
                  Swal.fire({
                        title: 'Invitado!!',
                        text: 'Este Invitado ya pedio su ticket ',
                        icon: 'warning',
                        confirmButtonText: false,
                        showConfirmButton: false,
                        timer: 4000       
                  })
              </script>
              <?php
              exit();
            }
            $conexion->query("SET @autoid := 0");
            $conexion->query("UPDATE invitados SET idinvitados = (@autoid := @autoid + 1)");
            $conexion->query("ALTER TABLE invitados  AUTO_INCREMENT = 1");  
            $resultado2 = mysqli_query($conexion, $consulta);
            if($resultado ){
                    //LUNES 
                    if(fecha_espanol_larga() == 'Lunes'){
                      $cedula2= $_POST['cedula_visita'];
                      $nombre2= $_POST['nombre_visita'];
                      $apellido2= $_POST['apellido_visita'];
                      $sede2= $_POST['sede_visita'];
                      $estatus2= $_POST['visita_estatus'];
                      $comida2= $_POST['visita_comida'];
                      $rol_usurario=  $cedula_usuario;
                      $usuario_regis=  $usuario;
                      $fecha=date("Y-m-d");
                      $hora = date("h:i:s:A");
                      $dia = Fecha_espanol_larga();
                                
                       $consulta_pertickit ="INSERT INTO perticket( cedula, nombre, apellido, sede, estatus, comida, fecha, hora, lunes, iden_usuario, iden_cedula)
                       VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2','$comida2','$fecha','$hora','$dia', '$usuario_regis', '$rol_usurario')";
                      $resultado2 = mysqli_query($conexion, $consulta_pertickit);
                      ?>
                      <script type="text/javascript">
                        Swal.fire({
                          title: 'Ticket generado',
                          icon: 'success',
                          allowOutsideClick: false,
                          allowEnterKey: false,
                          confirmButtonText: false,
                          showConfirmButton: false,
                          footer:'<a class="boton-alerts-verde" href="registro-ticket.php">ACEPTAR</a>',
                          
                          })  
                      </script>
                      <?php
                    }                  

                    ///Martes
                    if (fecha_espanol_larga() == 'Martes') {
                      $cedula2= $_POST['cedula_visita'];
                      $nombre2= $_POST['nombre_visita'];
                      $apellido2= $_POST['apellido_visita'];
                      $sede2= $_POST['sede_visita'];
                      $estatus2= $_POST['visita_estatus'];
                      $comida2= $_POST['visita_comida'];
                      $rol_usurario=  $cedula_usuario;
                      $usuario_regis=  $usuario;
                      $fecha=date("Y-m-d");
                      $hora = date("h:i:s:A");
                      $dia = Fecha_espanol_larga();
                                

                        $consulta_pertickit ="INSERT INTO perticket( cedula, nombre, apellido, sede, estatus, comida, fecha, hora, martes, iden_usuario, iden_cedula)
                       VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2','$comida2','$fecha','$hora','$dia', '$usuario_regis', '$rol_usurario')";
                      $resultado2 = mysqli_query($conexion, $consulta_pertickit);
                      ?>
                      <script type="text/javascript">
                        Swal.fire({
                          title: 'Ticket generado',
                          icon: 'success',
                          allowOutsideClick: false,
                          allowEnterKey: false,
                          confirmButtonText: false,
                          showConfirmButton: false,
                          footer:'<a class="boton-alerts-verde" href="registro-ticket.php">ACEPTAR</a>',
                          
                          })  
                      </script>
                      
<?php
        
                    }

                    //Miercoles
                    if (fecha_espanol_larga() == 'Miercoles') {
                      $cedula2= $_POST['cedula_visita'];
                      $nombre2= $_POST['nombre_visita'];
                      $apellido2= $_POST['apellido_visita'];
                      $sede2= $_POST['sede_visita'];
                      $estatus2= $_POST['visita_estatus'];
                      $comida2= $_POST['visita_comida'];
                      $rol_usurario=  $cedula_usuario;
                      $usuario_regis=  $usuario;
                      $fecha=date("Y-m-d");
                      $hora = date("h:i:s:A");
                      $dia = Fecha_espanol_larga();
                                

                       $consulta_pertickit ="INSERT INTO perticket( cedula, nombre, apellido, sede, estatus, comida, fecha, hora, miercoles, iden_usuario, iden_cedula)
                       VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2','$comida2','$fecha','$hora','$dia', '$usuario_regis', '$rol_usurario')";
                      $resultado2 = mysqli_query($conexion, $consulta_pertickit);
                      ?>
                      <script type="text/javascript">
                        Swal.fire({
                          title: 'Ticket generado',
                          icon: 'success',
                          allowOutsideClick: false,
                          allowEnterKey: false,
                          confirmButtonText: false,
                          showConfirmButton: false,
                          footer:'<a class="boton-alerts-verde" href="registro-ticket.php">ACEPTAR</a>',
                          
                          })  
                      </script>
                      
                      <?php
                    }
                    
                    //Jueves
                    if (fecha_espanol_larga() == 'Jueves') {
                     $cedula2= $_POST['cedula_visita'];
                      $nombre2= $_POST['nombre_visita'];
                      $apellido2= $_POST['apellido_visita'];
                      $sede2= $_POST['sede_visita'];
                      $estatus2= $_POST['visita_estatus'];
                      $comida2= $_POST['visita_comida'];
                      $rol_usurario=  $cedula_usuario;
                      $usuario_regis=  $usuario;
                      $fecha=date("Y-m-d");
                      $hora = date("h:i:s:A");
                      $dia = Fecha_espanol_larga();
                                
                                
                      $consulta_pertickit ="INSERT INTO perticket( cedula, nombre, apellido, sede, estatus, comida, fecha, hora, jueves, iden_usuario, iden_cedula)
                       VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2','$comida2','$fecha','$hora','$dia', '$usuario_regis', '$rol_usurario')";
                      $resultado2 = mysqli_query($conexion, $consulta_pertickit);
                      ?>
                      <script type="text/javascript">
                        Swal.fire({
                          title: 'Ticket generado',
                          icon: 'success',
                          allowOutsideClick: false,
                          allowEnterKey: false,
                          confirmButtonText: false,
                          showConfirmButton: false,
                          footer:'<a class="boton-alerts-verde" href="registro-ticket.php">ACEPTAR</a>',
                          
                          })  
                      </script>
                      
                      <?php
                    }

                    //Viernes
                    if (fecha_espanol_larga() == 'Viernes') {
                     $cedula2= $_POST['cedula_visita'];
                      $nombre2= $_POST['nombre_visita'];
                      $apellido2= $_POST['apellido_visita'];
                      $sede2= $_POST['sede_visita'];
                      $estatus2= $_POST['visita_estatus'];
                      $comida2= $_POST['visita_comida'];
                      $rol_usurario=  $cedula_usuario;
                      $usuario_regis=  $id;
                      $fecha=date("Y-m-d");
                      $hora = date("h:i:s:A");
                      $dia = Fecha_espanol_larga();
                                
                                
                      $consulta_pertickit ="INSERT INTO perticket( idinvitados, comida, fecha, hora, viernes, iden_usuario)
                       VALUES ('$usuario_invi', '$comida2','$fecha','$hora','$dia', '$usuario_regis')";
                      $resultado2 = mysqli_query($conexion, $consulta_pertickit);
                      ?>
                      <script type="text/javascript">
                        Swal.fire({
                          title: 'Ticket generado',
                          icon: 'success',
                          allowOutsideClick: false,
                          allowEnterKey: false,
                          confirmButtonText: false,
                          showConfirmButton: false,
                          footer:'<a class="boton-alerts-verde" href="registro-ticket.php">ACEPTAR</a>',
                          
                          })  
                      </script>
                      
                      <?php
                    }

                    //Jueves
                    if (fecha_espanol_larga() == 'Sabado') {
                      $cedula2= $_POST['cedula_visita'];
                      $nombre2= $_POST['nombre_visita'];
                      $apellido2= $_POST['apellido_visita'];
                      $sede2= $_POST['sede_visita'];
                      $estatus2= $_POST['visita_estatus'];
                      $comida2= $_POST['visita_comida'];
                      $rol_usurario=  $cedula_usuario;
                      $usuario_regis=  $usuario;
                      $fecha=date("Y-m-d");
                      $hora = date("h:i:s:A");
                      $dia = Fecha_espanol_larga();
                                
                                
                      $consulta_pertickit ="INSERT INTO perticket( cedula, nombre, apellido, sede, estatus, comida, fecha, hora, sabado, iden_usuario, iden_cedula)
                       VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2','$comida2','$fecha','$hora','$dia', '$usuario_regis', '$rol_usurario')";
                      $resultado2 = mysqli_query($conexion, $consulta_pertickit);
                      ?>
                      <script type="text/javascript">
                        Swal.fire({
                          title: 'Ticket generado',
                          icon: 'success',
                          allowOutsideClick: false,
                          allowEnterKey: false,
                          confirmButtonText: false,
                          showConfirmButton: false,
                          footer:'<a class="boton-alerts-verde" href="registro-ticket.php">ACEPTAR</a>',
                          
                          })  
                      </script>
                      
                      <?php
                    }
                    
            }
            
          }
        }
      }
     
?>

<!------------------------------------------------------------------------------------------------------>
