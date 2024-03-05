<?php
session_start();

include("php/rol.php");
date_default_timezone_set("America/Caracas");
date("d");
include "php/conexion.php";

$cuenta_personal1 = current($conexion ->query("SELECT COUNT(idticket) FROM ticket WHERE comida='desayuno' ")->fetch_assoc() );
$cuenta_personal2 = current($conexion ->query("SELECT COUNT(idticket) FROM ticket WHERE comida='almuerzo'")->fetch_assoc() );
$cuenta_personal3 = current($conexion ->query("SELECT COUNT(idticket) FROM ticket WHERE comida='cena'")->fetch_assoc() );

function fecha_espanol_larga(){
  $fecha_dia=date("d");
  $dia_semana=[
      "Monday"=>"Lunes",
      "Tuesday"=>"Martes",
      "Wednesday"=>"Miercoles",
      "Thursday"=>"Jueves",
      "Friday"=>"Viernes",
      "Saturday"=>"Sabado",
      "Sunday"=>"Domingo"
  ];
  $fecha_final=$dia_semana[date("l")];
  return $fecha_final;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro De Ticket</title>
    <!--Link de vinculacion-->
    <link rel="stylesheet" href="css/menus.css">

    <link rel="stylesheet" href="css/registro-ticket.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="js/datatable/datatables.min.css"/>

    <link rel="stylesheet" href="css/botones.css">

    <link rel="stylesheet" href="css/scrollbar.css">
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body class="">
<?php include("include/header.php");?>

<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex">
  <div id="contenedor-segundario "class="contenedor-segundario d-flex  ">
          <div class="tabla d-flex justify-content-center bg-danger p-2">
              <h4 class="text-white me-3">  R E G I S T R O</h4>
              <h4 class="text-white me-3">D E</h4>
              <h4 class="text-white">T I C K E T</h4>
          </div>
      <div class="contenedor-central  d-flex justify-content-center ">
        <div class="formulario " id="form">
          <!-- Formulario -->
          <form  autocomplete="off" action="" method="post" class="contenedor-formulario container-fluid">
            <div id="formulario" class="formulario_contenedor">
                <!-- Cedula --> 
                <div class=" input-group ">
                  <label class="mt-3 " for="">Cédula</label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/cedula2.png" alt=""></span>
                  <input list="browsers" minlength="6" maxlength="11" type="text" name="cedula" class="form-control" id="cedula" placeholder="Cédula"onkeypress="buscar_datos_teclado()" onkeypress="return SoloNumeros(event);"><br>
                  <datalist id="browsers">
                    <?php
                    $getclientes1 = "SELECT * FROM pedir_comida INNER JOIN personal ON 
                    pedir_comida.idpersonal = personal.idpersonal ORDER BY idcomer";
                    $resultado = mysqli_query($conexion, $getclientes1);
                        while($row = mysqli_fetch_array($resultado))
                    { 
                        $nombre_personal= $row['nombre'];
                        $nombre_apellido= $row['apellido'];
                        $cedula_personal = $row['cedula'];
                    ?>
                        <option  onclick="buscar_datos();" id="buscar" name="cedula" value="<?php echo $cedula_personal?> "> <?php echo $cedula_personal = $row['cedula']; echo " "; echo $nombre_personal; echo " ";echo $nombre_apellido;?></option>


                    <?php
                    }
                    ?>
                  </datalist>
                </div>
                <!-- identificador de la persona --> 
               <div class=" input-group" id="contenedor_identificador">
                  <label class="mt-3 " for="">Identificador </label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/cedula2.png" alt=""></span>
                  <input type="text" name="identificador" class="form-control" id="identificador" placeholder="identificador" autocomplete="off" ><br>
                </div>
                <!-- Nombre -->
                <div class="col input-group  ">
                  <label class="mt-3" for="">Nombre</label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/usuario-usuario.png" alt=""></span>
                  <input readonly id="nombre" class="form-control input-color" type="text" name="nombre" placeholder="Nombre" ><br>
                </div>
                <!-- Apellido -->
                <div class="col input-group ">
                  <label class="mt-3" for="">Apellido</label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/usuario-usuario.png" alt=""></span>
                  <input readonly id="apellido" class="form-control input-color" type="text" name="apellido" placeholder="Apellido" require="" ><br>
                </div>           
                <!-- Sede -->
                <div class="col input-group ">
                    <label class="mt-3" for="">Dependencia</label>
                    <span class="input-group-text" id="basic-addon1"><img src="icons/sede-sede.png" alt=""></span>
                    <input readonly id="sede" class="form-control input-color" type="text" name="sede" placeholder="Dependencia" ><br>
                </div>                          
                <!-- Estatus -->
                <div class="col input-group ">
                  <label class="mt-3" for="">Estatus</label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/grupo1.png" alt=""></span>
                  <input readonly id="estatus" class="form-control input-color" type="text" name="estatus" placeholder="Estatus" require="" ><br>
                </div>
                <!-- COMIDA -->
                <div class="col input-group ">
                  <label class="mt-3" for="">Comida</label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/grupo1.png" alt=""></span>
                  <select class="form-control" name="comida" id="comida">
                    <option value="Desayuno">Desayuno</option>
                    <option value="Almuerzo">Almuerzo</option>
                    <option value="Cena">Cena</option>
                  </select><br>
                </div>
            </div>
                <!-- BOTON -->
                <div class="mt-3 d-flex justify-content-center align-items-center" id="conten_boton">
                  <input type="button" value="BUSCAR" class="boton-verde me-2" id="buscar" name="btn_enviar" onclick="buscar_datos();">
                  <input type="submit" value="CERRAR" class="boton-salir me-2" id="cerrrar" name="btn_cerrar" >
                  <input type="button" value="LIMPIAR" class="boton-actualizar me-2" id="limpiar" name="btn_enviar" onclick="limpiar();">
                  <input  type="submit" id="agregar" name="boton-generar" class="boton-amarillo" value="GENERAR"> 
                </div> 
            </form>   
          </div>
                  <div class=" contenedor_tabla mt-4  " id="productos">
                        <section class="sesion_cantidad d-flex mb-3">
                         <div class="comida p-2 pe-3 ps-3">
                           Desayuno: <span class=""><?php echo $cuenta_personal1?></span>
                         </div>

                         <div class="comida  p-2 pe-3 ps-3">
                           Almuerzo:<span class=""><?php echo $cuenta_personal2?></span>
                         </div>

                         <div class="comida p-2 pe-3 ps-3">
                           Cena:<span class=""><?php echo $cuenta_personal3?></span>
                         </div>
                          <?php if ($idrol ==  1 ) { 
                            ?>
                            <button class="boton-alerts-azul button" id="tabla-ticket">Tickets Generados</button>
                            <?php
                          }
                          ?>

                          <button class="boton-alerts-rojo button" id="genen_cerrar">Generar Cierre</button>
                          <button class="boton-alerts-rojo button" id="genen_cerrar2">Eliminar Cierre</button>
                        </section>
                    <div class="contenedor-tabla">
                     
                    <table class="table table-striped" id="myTable2">
                      <thead>
                        <tr>
                          <td>NOMBRE</td>
                          <td>APELLIDO</td>
                          <td>CEDULA</td>
                          <td>DEPENDENCIA</td>
                          <td>ESTATUS</td>
                          <td>COMIDA</td>
                        </tr>
                      </thead>
                    </table>    
                    </div>
                  </div>     
      </div>
  </div>
  <footer class="contenedor-upta d-flex ">
    <div>
      <p>&copy Universidad Politécnica Territorial de Aragua Federico Brito Figuero(UPTA).</p>
      <p>&copy INCES la Romana</p>
    </div>
  </footer>
</div>

<!-- BootsTrap -->
<script src="js/libreriasJS/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="js/libreriasJS/sweetalert2.all.min.js"></script>
<!-- JQuery -->
<script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
<!-- Llamado de DataTable -->
<script src="js/datatable/datatables.min.js"></script>
<!-- DataTable js DataTAble bootstrap -->
<script src="js/datatable/dataTables.bootstrap5.min.js"></script>
<!-- Llamado a la estructura de DataTable -->
<script src="./js/datatable/siver-side/data-ticket-pedir.js"></script>
<!-- JS de Tabla de registro ticket -->
<script src="js/registro-ticket.js"></script>
<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
<!-- Todo el js para validar los datos de busqueda -->
<script src="js/todo.js"></script>
<!-- Reloj del menu -->
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
<?php if ($idrol ==  1 ) { 
  ?>
 <script type="text/javascript">
  
      const ticket = document.getElementById('tabla-ticket');
      ticket.addEventListener('click', function(){
        window.open('tabla-tickets.php');
      })
      </script>
  <?php
}
?>

</body>
</html>

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
                  
                  //Domingo
                  if (fecha_espanol_larga() == 'Domingo') {
                    ?>
                    <script type="text/javascript">
                      Swal.fire({
                        title: 'LO SENTIMOS!',
                        text:'lamentamos comentarle que por cuestines de seguridad no es permitido generar tickets los días domingo',
                        icon: 'info',
                        confirmButtonText: false,
                        showConfirmButton: false,
                         timer: 5000
                        
                        })  
                    </script>
                    <?php
                    exit();
                  }
            
                  // Verificar si existe el registro en la tabla pedir_comida
                  $verificar_comida = mysqli_query($conexion, "SELECT * FROM pedir_comida WHERE idpersonal = '$identificador'");

                  if(mysqli_num_rows($verificar_comida) <= 0) {
                      // El registro en pedir_comida no existe, muestra la alerta
                      ?>
                      <script type="text/javascript">
                          Swal.fire({
                              title: 'ALERTA !!',
                              text:'Esta persona no tiene autorización de comer',
                              icon: 'warning',
                              confirmButtonText: false,
                              showConfirmButton: false,
                              timer: 5000
                          });
                      </script>
                      <?php
                      exit();
                  }
                  $conexion->query("SET @autoid := 0");
                  $conexion->query("UPDATE perticket SET idticket = (@autoid := @autoid + 1)");
                  $conexion->query("ALTER TABLE perticket  AUTO_INCREMENT = 1");  
                $resultado = mysqli_query($conexion, $consulta);
  
                    if($resultado ){
                      
                      //LUNES 
                      if(fecha_espanol_larga() == 'Lunes'){
                        $idpersonal= $_POST['identificador'];
                        $comida2= $_POST['comida'];
                        $identificador_usuario=  $id;
                        $fecha=date("Y-m-d");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
  
                          $consulta_pertickit ="INSERT INTO perticket( idpersonal, comida, fecha, hora, lunes, iden_usuario)
                         VALUES ('$idpersonal','$comida2','$fecha','$hora','$dia', '$identificador_usuario')";
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
                        $idpersonal= $_POST['identificador'];
                        $comida2= $_POST['comida'];
                        $identificador_usuario=  $id;
                        $fecha=date("Y-m-d");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
  
                          $consulta_pertickit ="INSERT INTO perticket( idpersonal, comida, fecha, hora, martes, iden_usuario)
                         VALUES ('$idpersonal','$comida2','$fecha','$hora','$dia', '$identificador_usuario')";
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
                        $idpersonal= $_POST['identificador'];
                        $comida2= $_POST['comida'];
                        $identificador_usuario=  $id;
                        $fecha=date("Y-m-d");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
  
                          $consulta_pertickit ="INSERT INTO perticket( idpersonal, comida, fecha, hora, miercoles, iden_usuario)
                         VALUES ('$idpersonal','$comida2','$fecha','$hora','$dia', '$identificador_usuario')";
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
                        $idpersonal= $_POST['identificador'];
                        $comida2= $_POST['comida'];
                        $identificador_usuario=  $id;
                        $fecha=date("Y-m-d");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
  
                          $consulta_pertickit ="INSERT INTO perticket( idpersonal, comida, fecha, hora, jueves, iden_usuario)
                         VALUES ('$idpersonal','$comida2','$fecha','$hora','$dia', '$identificador_usuario')";
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
                        $idpersonal= $_POST['identificador'];
                        $comida2= $_POST['comida'];
                        $identificador_usuario=  $id;
                        $fecha=date("Y-m-d");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
  
                          $consulta_pertickit ="INSERT INTO perticket( idpersonal, comida, fecha, hora, viernes, iden_usuario)
                         VALUES ('$idpersonal','$comida2','$fecha','$hora','$dia', '$identificador_usuario')";
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
  
                      //sabado
                      if (fecha_espanol_larga() == 'Sabado') {
                        $idpersonal= $_POST['identificador'];
                        $comida2= $_POST['comida'];
                        $identificador_usuario=  $id;
                        $fecha=date("Y-m-d");
                        $hora = date("h:i:s:A");
                        $dia = Fecha_espanol_larga();
  
                          $consulta_pertickit ="INSERT INTO perticket( idpersonal, comida, fecha, hora, sabado, iden_usuario)
                         VALUES ('$idpersonal','$comida2','$fecha','$hora','$dia', '$identificador_usuario')";
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
     
?>

        