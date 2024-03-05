
<?php
    if (isset($_POST['boton-generar'])) {
        if (empty($_POST['cedula']) || empty($_POST['nombre']) 
          || empty($_POST['apellido']) || empty($_POST['sede'])
          || empty($_POST['estatus'])) {
            echo "tiene datos sin rellenar";
            }else{
              $cedula= $_POST['cedula'];
              $nombre2= $_POST['nombre'];
              $apellido= $_POST['apellido'];
              $sede= $_POST['sede'];
              $estatus= $_POST['estatus'];
              $comida= $_POST['comida'];
                        
              $consulta ="INSERT INTO ticket( cedula, nombre, apellido, sede, estatus, comida) VALUES ('$cedula','$nombre2','$apellido','$sede','$estatus', '$comida')";
              $verificar_personal= mysqli_query($conexion, "SELECT * FROM ticket WHERE cedula='$cedula'");
              if(mysqli_num_rows($verificar_personal) > 10){
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
                        title: 'Esta persona ya pidio su ticket'
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
                        $rol= $cedularol;
                        $usuario_regis= $nombrerol ;
                        $fecha=date("d/m/Y");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
                                  
                        $consulta_pertickit ="INSERT INTO perticket (cedula, nombre, apellido, sede, estatus, comida, rol, idpersonal, fecha, hora, Lunes) VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2', '$comida','$rol', '$usuario_regis', '$fecha', '$hora', '$dia')";
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
                            footer:'<a class="btn btn-success" href="registro-ticket.php">ACEPTAR</a>',
                            
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
                        $rol= $cedularol;
                        $usuario_regis= $nombrerol ;
                        $fecha=date("d/m/Y");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
                                  
                        $consulta_pertickit ="INSERT INTO perticket (cedula, nombre, apellido, sede, estatus, comida, rol, idpersonal, fecha, hora, martes) VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2', '$comida','$rol', '$usuario_regis', '$fecha', '$hora', '$dia')";
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
                            footer:'<a class="btn btn-success" href="registro-ticket.php">ACEPTAR</a>',
                            
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
                        $rol= $cedularol;
                        $usuario_regis= $nombrerol ;
                        $fecha=date("d/m/Y");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
                                  
                        $consulta_pertickit ="INSERT INTO perticket (cedula, nombre, apellido, sede, estatus, comida, rol, idpersonal, fecha, hora, miercoles) VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2', '$comida','$rol', '$usuario_regis', '$fecha', '$hora', '$dia')";
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
                            footer:'<a class="btn btn-success" href="registro-ticket.php">ACEPTAR</a>',
                            
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
                        $rol= $cedularol;
                        $usuario_regis= $nombrerol ;
                        $fecha=date("d/m/Y");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
                                  
                        $consulta_pertickit ="INSERT INTO perticket (cedula, nombre, apellido, sede, estatus, comida, rol, idpersonal, fecha, hora, jueves) VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2', '$comida','$rol', '$usuario_regis', '$fecha', '$hora', '$dia')";
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
                            footer:'<a class="btn btn-success" href="registro-ticket.php">ACEPTAR</a>',
                            
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
                        $rol= $cedularol;
                        $usuario_regis= $nombrerol ;
                        $fecha=date("d/m/Y");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
                                  
                        $consulta_pertickit ="INSERT INTO perticket (cedula, nombre, apellido, sede, estatus, comida, rol, idpersonal, fecha, hora, viernes) VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2', '$comida','$rol', '$usuario_regis', '$fecha', '$hora', '$dia')";
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
                            footer:'<a class="btn btn-success" href="registro-ticket.php">ACEPTAR</a>',
                            
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
                        $rol= $cedularol;
                        $usuario_regis= $nombrerol ;
                        $fecha=date("d/m/Y");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
                                  
                        $consulta_pertickit ="INSERT INTO perticket (cedula, nombre, apellido, sede, estatus, comida, rol, idpersonal, fecha, hora, sabado) VALUES ('$cedula2','$nombre2','$apellido2','$sede2','$estatus2', '$comida','$rol', '$usuario_regis', '$fecha', '$hora', '$dia')";
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
                            footer:'<a class="btn btn-success" href="registro-ticket.php">ACEPTAR</a>',
                            
                            })  
                        </script>
                        
                        <?php
                      }
                  

                     
                  }
                        
              }
     }
?>
