
<?php
    if (isset($_POST['boton-generar'])) {
        if (empty($_POST['cedula']) || empty($_POST['nombre']) 
          || empty($_POST['apellido']) || empty($_POST['sede'])
          || empty($_POST['estatus'])) {
            
            }else{
              $identificador= $_POST['identificador'];
              $cedula222= $_POST['cedula'];
              $fecha = date("d/m/y");
              $hora = date("h:i:s:A");
              $comida= $_POST['comida'];
              $pd_ticket = 0;          
              $consulta ="INSERT INTO ticket( idpersonal, fecha, hora, comida, estatus_ticket) VALUES ('$identificador','$fecha','$hora', '$comida', '$pd_ticket')";
              
              $verificar_habilitado= mysqli_query($conexion, "SELECT * FROM personal_eliminado WHERE  idpersonal='$identificador'");
                  if(mysqli_num_rows($verificar_habilitado) > 0){
                      ?>
                      <script type="text/javascript">
                        Swal.fire({
                          title: 'ALERTA !!',
                          text:'Esta persona esta deshabilitada del sistema Siscomara',
                          icon: 'info',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 4000
                        }) ;
                           $('#nombre').value('');
                           $('#apellido').value('');
                            $('#cedula').value('');
                            $('#correo').value('');
                           $('#sede').value('');
                            $('#estatus').value('');
                       </script>
                      <?php
                  exit();
              }
              $verificar_permiso= mysqli_query($conexion, "SELECT * FROM ausencia_justificada WHERE idpersonal='$identificador'");
              if(mysqli_num_rows($verificar_permiso) > 0){
               
                ?>
                  <script type="text/javascript">
                       Swal.fire({
                          title: 'ALERTA !!',
                          html:'<h4>Esta persona esta de permiso no se puede realizar su pedido <?php ?></h4>',
                          icon: 'warning',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 5000
                        })  
                    
                  </script>
                <?php
                exit();
                }     
              
                $verificar_comida= mysqli_query($conexion, "SELECT * FROM pedir_comida WHERE idpersonal = '$identificador' AND pd_ticket = '0' ");
                if($verificar_comida){
                ?>
                  <script type="text/javascript">
                       Swal.fire({
                          title: 'ALERTA !!',
                          text:'Esta  persona no tiene autorización de comer',
                          icon: 'warning',
                          confirmButtonText: false,
                          showConfirmButton: false,
                          timer: 5000
                        })  
                    
                  </script>
                <?php
                
                              $verificar_personal= mysqli_query($conexion, "SELECT * FROM ticket WHERE idpersonal='$identificador'");
                              if(mysqli_num_rows($verificar_personal) > 0){
                                ?>
                                  <script type="text/javascript">
                                      Swal.fire({
                                          title: 'ALERTA !!',
                                          text:'Esta persona ya pidio su ticket',
                                          icon: 'error',
                                          confirmButtonText: false,
                                          showConfirmButton: false,
                                          timer: 5000
                                        })
                                    
                                  </script>
                                <?php
                                exit();
                                }     
                              $resultado = mysqli_query($conexion, $consulta);
                
                                  if($resultado ){
                                    //LUNES 
                                    if(fecha_espanol_larga() == 'Lunes'){
                                      $cedula2= $_POST['cedula'];
                                      $nombre2= $_POST['nombre'];
                                      $apellido2= $_POST['apellido'];
                                      $sede2= $_POST['sede'];
                                      $estatus2= $_POST['estatus'];
                                      $comida2= $_POST['comida'];
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
                                      $cedula2= $_POST['cedula'];
                                      $nombre2= $_POST['nombre'];
                                      $apellido2= $_POST['apellido'];
                                      $sede2= $_POST['sede'];
                                      $estatus2= $_POST['estatus'];
                                      $comida2= $_POST['comida'];
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
                                      $cedula2= $_POST['cedula'];
                                      $nombre2= $_POST['nombre'];
                                      $apellido2= $_POST['apellido'];
                                      $sede2= $_POST['sede'];
                                      $estatus2= $_POST['estatus'];
                                      $comida2= $_POST['comida'];
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
                                      $cedula2= $_POST['cedula'];
                                      $nombre2= $_POST['nombre'];
                                      $apellido2= $_POST['apellido'];
                                      $sede2= $_POST['sede'];
                                      $estatus2= $_POST['estatus'];
                                      $comida2= $_POST['comida'];
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
                                      $cedula2= $_POST['cedula'];
                                      $nombre2= $_POST['nombre'];
                                      $apellido2= $_POST['apellido'];
                                      $sede2= $_POST['sede'];
                                      $estatus2= $_POST['estatus'];
                                      $comida2= $_POST['comida'];
                                      $rol_usurario=  $cedula_usuario;
                                      $usuario_regis=  $usuario;
                                      $fecha=date("Y-m-d");
                                      $hora = date("h:i:s:A");
                                      $dia = Fecha_espanol_larga();
                                                
                                      $consulta_pertickit ="INSERT INTO perticket( cedula, nombre, apellido, sede, estatus, comida, fecha, hora, viernes, iden_usuario, iden_cedula)
                                       VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2','$comida2','$fecha','$hora','$dia', '$usuario_regis', '$rol_usurario')";
                                      $resultado2 = mysqli_query($conexion, $consulta_pertickit);
                                      ?>
                                      <script type="text/javascript">
                                        Swal.fire({
                                          title: '!Ticket generado',
                                          icon: 'success',
                                          html:'Esta persona ya tiene permitido comer su ticket ya fue procesado de manera totalmente correcta, dale click al boton<b>Aceptar</b> para cerrar esta alerta ',
                                          showCancelButton: false,
                                          confirmButtonColor: '#28a745',
                                          confirmButtonText: 'Aceptar!'
                                          })  
                                      </script>
                                      
                                      <?php
                                    }
                
                                    //Jueves
                                    if (fecha_espanol_larga() == 'Sabado') {
                                      $cedula2= $_POST['cedula'];
                                      $nombre2= $_POST['nombre'];
                                      $apellido2= $_POST['apellido'];
                                      $sede2= $_POST['sede'];
                                      $estatus2= $_POST['estatus'];
                                      $comida2= $_POST['comida'];
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
                                     //Jueves
                                     if (fecha_espanol_larga() == 'Domingo') {
                                      ?>
                                      <script type="text/javascript">
                                        Swal.fire({
                                          title: 'LO SENTIMOS!',
                                          text:'lamentamos comentarle que por cuestines de seguridad no es permitido generar tickets los días domingo',
                                          icon: 'success',
                                          confirmButtonText: false,
                                          showConfirmButton: false,
                                           timer: 5000
                                          
                                          })  
                                      </script>
                                      <?php
                                      exit();
                                    }
                                  
                                  
                                }
                                        
                              }
                exit();
                }     
              
     }
     if (isset($_POST['btn_cerrar'])) {
          ?>
          <script type="text/javascript">
              Swal.fire({
                title: 'Estas seguro de hacer el cierre de los tickets?',
                text: "Por favor seleccione la opcion deseada!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'SI, Cerrar!'
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    {
                    icon:'success',
                    title: 'Listo!',
                    text:'Presione el boton cerrar para culminar',
                    confirmButtonText: false,
                    showConfirmButton: false,
                    footer:'<form method="POST" action="php/formatear-ticket.php"><input type="submit" name="cerrar" class="boton-alerts-rojo" value="CERRAR !"></form>',
                  }
                    
                  )
                }
              })
             
          </script>
          
           
          <?php

           
     }
     require 'modal/modal_ticket_nuevo.php';
      require 'modal/modal-invitados.php';
?>
