<?php
session_start();
include("php/conexion.php");
include("php/rol.php");

$idPersonalRegistro = $_GET['tabla'];

$idPersonalRegistro = $_GET['tabla'];
  $consulta_registro_personal = "SELECT * FROM ausencia_justificada INNER JOIN personal ON ausencia_justificada.idpersonal = personal.idpersonal
  INNER JOIN sedes ON personal.idsede = sedes.idsede 
  INNER JOIN permisos ON ausencia_justificada.id_permiso = permisos.idpermisos_aj WHERE idpermiso='".$idPersonalRegistro."' ";
$resultado_registro_personal = $conexion->query($consulta_registro_personal);

while ($rowAusencia=$resultado_registro_personal->fetch_assoc()){
  $idper = $rowAusencia['idpermiso'];
  $nombreAusencia= $rowAusencia['nombre'];
  $apellidoAusencia = $rowAusencia['apellido'];
  $cedulaAusencia = $rowAusencia['cedula'];
  $fecha_inicio = $rowAusencia['fecha_inicio'];
  $fecha_fin = $rowAusencia['fecha_fin'];
  $permiso = $rowAusencia['permisos'];
  $idpermiso = $rowAusencia['idpermisos_aj'];
  $color = $rowAusencia['color'];
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Personal Ausente</title>
   <!--CSS De Bootstrap-->
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
    <style>
      body{
        background: #e7e7e7;
      }
      .contenedor-primario{
        padding: 90px 50px 0px 250px;
        height: 94.3vh;
        flex-direction: column;
        align-items: center;
        
      }
      .nombre-tabla{
        padding: 15px 0 10px 0px;
        margin-bottom: 10px;
      }
      .nombre-tabla h4{
        font-size: 20px;
        margin-bottom: 10px;
      }
      .contenedor-segundario{
        box-shadow: 0px 0px 50px #5555;
        width: 100%;
        background: white;
        
      }
      .formulario{
        width: 100%;
        
      }
      .formulario form{
        padding: 20px 80px 0px 80px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5px;
      }
      .boton-color{
        width: 30%;
        height: 40px;
      }
      #identificador-actualizar{   
        display: none;
      }
      .bloquear{
        background-color: #edede9;
      }
      .input-edit{
        text-align: center;
      }
      .input-edit label{
        color: black;
      }
      /** footer universidad y creadores y ayudante */
      .contenedor-upta{
        text-align: center;
        flex-direction: column;
        padding: 5px 0 0 150px;
        background: white;
      }
      .contenedor-upta p{
        margin-bottom: 0;
        color: #9597a8;
        font-size: 15px;
      }
      .contenedor-botones{
        width: 200%;
        
      }
      @media only screen and (max-width: 1024px), handheld and (orientation: landscape){
        .contenedor-primario{
          padding: 90px 0px 0px 0px;
        }
        .contenedor-upta{
          padding: 12px 0 0 0;
        }
      }
      @media only screen and (max-width: 768px), handheld and (orientation: landscape){
        .contenedor-segundario{
          width: 95%;
        }
        .formulario form{
          padding: 20px 10px 0px 10px;
        }
        .nombre-tabla h4{
            font-size: 13px;
        }
        .contenedor-upta{
          position: relative;
          top: 300px;
         
        }
      }
      @media only screen and (max-width: 500px), handheld and (orientation: landscape){
        .formulario form{
          display: flex;
          flex-direction: column;
        }
        .contenedor-botones{
            width: 100%;
        }
      }
    </style>
</head>
<?php include("include/header.php");?>
<div id="contenedor-primario"class="contenedor-primario container-fluid aling-items-center d-flex ">
    <div class="nombre-tabla container-fluid d-flex justify-content-center bg-danger">
      <h4 class="text-white me-3">A C T U A L I Z A R </h4><h4 class="text-white"> A U S E N C I A</h4>
    </div>
    <div id="contenedor-segundario"class="contenedor-segundario  ">
      <div class="formulario ">
        <form class="" action="" method="POST">
                <div class="input-group mb-3 " id="identificador-actualizar">
                  <label class="input-edit" for="">Identificador</label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/carpeta.png" alt=""></span>
                  <input class="modal-input form-control bloquear" id="idper_editar" type="text" name="idper" value="<?php echo $idper;?>" readonly ><br>
               </div>
                <!-- EDITAR NOMBRE -->
                <div class="input-edit input-group mb-3 ">
                    <label class="" for="">Nombre</label>
                    <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                    <input class="form-control bloquear" type="text" id="editar-nombre" name="editar-nombre" autocomplete="off" value="<?php echo $nombreAusencia;?>" placeholder="Nombre" readonly><br>
                </div>
                <!-- EDITAR APELLIDO -->
                <div class="input-edit input-group  mb-3">
                    <label class="" for="">Apellido</label>
                    <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                    <input class="form-control bloquear" type="text" id="editar-apellido" name="editar-apellido" autocomplete="off" value="<?php echo $apellidoAusencia;?>" placeholder="Apellido" readonly><br>
                </div>
                 <!-- EDITAR CEDULA -->
                 <div class="input-edit input-group  mb-3">
                    <label class="" for="">Cédula</label>
                    <span class="input-group-text" ><img src="icons/cedula2.png" alt=""></span>
                    <input  minlength="6" maxlength="10"class="form-control bloquear" id="editar-cedula" type="text" name="editar-cedula" autocomplete="off" value="<?php echo $cedulaAusencia;?>" placeholder="Cedula" readonly><br>
                </div>
                <!-- EDITAR Fecha Inicio -->
                <div class="input-edit input-group  mb-3">
                    <label class="" for="">Fecha Inicio</label>
                    <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                    <input class="form-control" type="date" id="editar-fecha_inicio" name="editar-fecha-ini" autocomplete="off" value="<?php echo $fecha_inicio;?>" placeholder="fecha inicio"><br>
                </div>

                <!-- EDITAR Fecha fin -->
                <div class="input-edit input-group  mb-3">
                    <label class="" for="">Fecha fin</label>
                    <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                    <input class="form-control" type="date" id="editar-fecha_fin" name="editar-fecha-fin" autocomplete="off" value="<?php echo $fecha_fin;?>" placeholder="fecha fin"><br>
                </div>
               
                <!-- MODAL ROL -->
                <div class="input-edit input-group mb-3">
                    <label class="" for="">Permiso</label>
                    <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                    <select class="form-control"   name="editar-permiso"><br>
                    <option value="<?php echo $idpermiso;?>"><?php echo $permiso;?></option>
                      <?php
                        $estados = "SELECT * FROM permisos";
                        $resultado = mysqli_query($conexion, $estados);
                        while ($per = mysqli_fetch_array($resultado)) {
                          $permiso = $per['permisos'];
                          $idpermiso_per = $per['idpermisos_aj'];
                          ?>
                            <option value="<?php echo $idpermiso_per?>"><?php echo $permiso?></option>
                          <?php
                        }
                      ?>
                    </select>
                
                </div>
                <div>
                  <input type="color" name="color" id="" class="boton-color" value="<?php echo $color;?>">
                </div>
                <div></div>
                
                <div class="contenedor-botones container-fluid d-flex justify-content-center mt-3 mb-4 ">
                  <button type="button" class="boton-alerts-gris me-3" id="boton-cancelar">Cancelar</button>
                  <input type="submit" class="boton-alerts-verde" name="boton-guardar" value="Actualizar">
                </div>        
            </div>
          </form>
      </div>
  </div>
  
</div>

<footer class="contenedor-upta d-flex justify-content-center ">
  <p>&copy Universidad Politécnica Territorial de Aragua Federico Brito Figuero(UPTA).</p>
  <p>&copy INCES la Romana</p>
</footer>

<!-- BootsTrap -->
<script src="js/libreriasJS/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="js/libreriasJS/sweetalert2.all.min.js"></script>
<!-- JQuery -->
<script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
<!-- Reloj del menu lateral contador -->
<script src="js/reloj.js"></script>
<!-- Cambiar menu  -->
<script src="js/menu_2.0.js"></script>
<!-- Contenedor de todos los js de inteccion -->
<script src="js/todo.js"></script>
<!-- JS adicional  -->
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
<script type="text/javascript">
  var botonCancelar = document.getElementById("boton-cancelar");
  botonCancelar.addEventListener("click", function(){
    window.location.href = "tabla-ausencia.php";
  })
</script>

</body>
</html>
<!-- PHP Para la actualizacion de los datos -->
<?php
      if(isset($_POST['boton-guardar'])){
        if ( empty($_POST['editar-fecha-ini']) 
        ||  empty($_POST['editar-fecha-fin']) ) {
          ?>
            <script type="text/javascript">
                    Swal.fire({
                      title: 'Verificar!',
                          text: 'Verifique si cada campo esta lleno',
                          icon: 'warning',
                          allowOutsideClick: true,
                          allowEnterKey: true,
                          confirmButtonText: false,
                          showConfirmButton: false,                          
                    })
            </script>
          <?php

        }else{
            $id=$_POST['idper'];
            $editarfechaini = $_POST['editar-fecha-ini'];
            $editarfechafin = $_POST['editar-fecha-fin'];
            $editarpermiso = $_POST['editar-permiso'];
            $color = $_POST['color'];
            $consulta2 ="UPDATE ausencia_justificada SET  fecha_inicio='$editarfechaini', fecha_fin='$editarfechafin', id_permiso='$editarpermiso', color='$color' WHERE idpermiso='$id'";
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
                        html:'El permiso actualizado correctamente, para cerrar la alerta dele click al boton <b>Aceptar</b> ',
                        footer:'<a class="boton-alerts-verde" href="tabla-ausencia.php">ACEPTAR</a>',
                        
                  })
              </script>
              <?php
            }

        }
 
      }
      
?>