<?php
session_start();
include("php/conexion.php");
include("php/rol.php");

$idPersonalRegistro = $_GET['tabla'];
  $consulta_registro_personal = "SELECT * FROM personal 
  INNER JOIN sedes ON personal.idsede = sedes.idsede 
  INNER JOIN estatus ON personal.idestatus = estatus.idestatus 
  WHERE idpersonal='".$idPersonalRegistro."' ";
$resultado_registro_personal = $conexion->query($consulta_registro_personal);

while ($rowPersonal=$resultado_registro_personal->fetch_assoc()){
  $idper = $rowPersonal['idpersonal'];
  $nombrePersonal= $rowPersonal['nombre'];
  $apellidoPersonal = $rowPersonal['apellido'];
  $cedulaPersonal = $rowPersonal['cedula'];
  $correoPersonal = $rowPersonal['correo'];
  $sedePersonal = $rowPersonal['sede'];
  $idsedePersonal = $rowPersonal['idsede'];
  $estatusPersonal = $rowPersonal['estatus'];
  $idestatusPersonal = $rowPersonal['idestatus'];

  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Personal</title>
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
      .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    --bs-gutter-x: 0rem;
    --bs-gutter-y: 0;
    } 
      .contenedor-primario{
        
        height: 100vh;
        flex-direction: column;
        align-items: center;
        
      }
      .nombre-tabla{
        padding: 15px 0 10px 0px;
        margin-bottom: 10px;
        margin-top: 80px;
        flex-wrap: wrap;
      }
      .nombre-tabla h4{
        font-size: 20px;
        margin-bottom: 10px;
      }
      .contenedor-segundario{
        
        padding: 0 30px 0 250px;
      }
      .formulario{
        width: 100%;
        box-shadow: 0px 0px 50px #5555;
        width: 100%;
        background: white;
        margin-bottom: 24px;
      }
      .formulario form{
        padding: 20px 80px 0px 80px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5px;
      }
      #identificador-actualizar{
        display: none;
      }
      .input-edit{
        text-align: center;
      }
      .input-edit label{
        color: black;
      }
            
      /** footer universidad y creadores y ayudante */
      .contenedor-upta{
          flex-direction: column;
          display: flex;
          justify-content: end;
          height: 100vh;
          width: 100%;
        
        }
        .contenedor-upta div{
          background-color: white;
          text-align: center;
          padding: 0 0 0 174px;
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
        .contenedor-segundario{
          padding: 0 30px 0 30px;
        }
        .contenedor-upta div{
          padding: 0 0 0 0;
        }
      }
      @media only screen and (max-width: 768px), handheld and (orientation: landscape){
        .formulario form{
          display: flex;
          flex-direction: column;
        }
        .contenedor-botones{
          width: 100%;
        }

      }
      @media only screen and (max-width: 560px), handheld and (orientation: landscape){
        .contenedor-segundario{
          padding: 0 5px 0 5px;
        }
        .formulario form{
          padding: 15px;
        }
      }
    </style>
</head>
<?php include("include/header.php");?>
<div id="contenedor-primario"class="contenedor-primario container-fluid aling-items-center d-flex ">
    <div id="contenedor-segundario"class="contenedor-segundario  ">
      <div class="nombre-tabla container-fluid d-flex justify-content-center bg-danger">
        <h4 class="text-white me-3">A C T U A L I Z A R </h4><h4 class="text-white"> P E R S O N A L</h4>
      </div>
      <div class="formulario ">
        <form class="" action="" method="POST">
                <div class="input-group mb-3 " id="identificador-actualizar">
                  <label class="input-edit" for="">Identificador</label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/carpeta.png" alt=""></span>
                  <input class="modal-input form-control" id="idper_editar" type="text" name="idper" value="<?php echo $idper;?>" ><br>
               </div>
                <!-- EDITAR NOMBRE -->
                <div class="input-edit input-group mb-3 ">
                    <label class="" for="">Nombre</label>
                    <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                    <input class="form-control" type="text" id="editar-nombre" name="editar-nombre" autocomplete="off" value="<?php echo $nombrePersonal;?>" placeholder="Nombre" onkeypress="return soloLetras(event);"><br>
                </div>
                <!-- EDITAR APELLIDO -->
                <div class="input-edit input-group  mb-3">
                    <label class="" for="">Apellido</label>
                    <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                    <input class="form-control" type="text" id="editar-apellido" name="editar-apellido" autocomplete="off"  value="<?php echo $apellidoPersonal;?>" placeholder="Apellido" onkeypress="return soloLetras(event);"><br>
                </div>
                <!-- EDITAR CEDULA -->
                <div class="input-edit input-group  mb-3">
                    <label class="" for="">Cedula</label>
                    <span class="input-group-text" ><img src="icons/cedula2.png" alt=""></span>
                    <input  minlength="6" maxlength="10"class="form-control" id="editar-cedula" autocomplete="off" type="text" name="editar-cedula" value="<?php echo $cedulaPersonal;?>" placeholder="Cedula" onkeypress="return SoloNumeros(event);"><br>
                </div>
                <!-- EDITAR CORREO -->
                <div class="input-edit input-group mb-3">
                    <label class="" for="">Correo</label>
                    <span class="input-group-text" ><img src="icons/email.png" alt=""></span>
                    <input class="form-control" id="editar-correo" type="text" name="editar-correo" autocomplete="off" value="<?php echo $correoPersonal;?>" placeholder="Correo" ><br>
                </div>
                <!-- EDITAR SEDE -->
                <div class="input-edit input-group mb-3">
                    <label class="" for="">Dependencia</label>
                    <span class="input-group-text" ><img src="icons/sede-sede.png" alt=""></span>
                    <select class="form-control" id="editar-dependencia" name="editar-sede" ><br>
                     <option value="<?php echo $idsedePersonal;?>"><?php echo $sedePersonal;?></option>
                       <?php
                        $sedes = "SELECT * FROM sedes";
                        $resultado = mysqli_query($conexion, $sedes);
                        while ($sede = mysqli_fetch_array($resultado)) {
                          $holasede = $sede['sede'];
                          $idsedes = $sede['idsede'];

                          ?>
                            <option value="<?php echo $idsedes?>"><?php echo $holasede?></option>
                          <?php
                        }
                       ?>
                    </select>
                    <br>
                </div>
                <!-- MODAL DE ESTATUS -->
                <div class="input-edit input-group mb-3">
                    <label class="" for="">Estatus</label>
                    <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                    <select class="form-control"   name="editar-estatus"><br>
                    <option value="<?php echo $idestatusPersonal;?>"><?php echo $estatusPersonal;?></option>
                       <?php
                        $estados = "SELECT * FROM estatus";
                        $resultado = mysqli_query($conexion, $estados);
                        while ($esta = mysqli_fetch_array($resultado)) {
                          $estatus = $esta['estatus'];
                          $idestatus = $esta['idestatus'];

                          ?>
                            <option value="<?php echo $idestatus?>"><?php echo $estatus?></option>
                          <?php
                        }
                       ?>
                    </select>
                </div>
                <div class="contenedor-botones container-fluid d-flex justify-content-center mt-3 mb-4 ">
                  <button type="button" class="boton-alerts-gris me-3" id="boton-cancelar">Cancelar</button>
                  <input type="submit" class="boton-alerts-verde" name="boton-guardar" value="Actualizar">
                </div>        
            </div>
          </form>
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
<!-- Reloj del menu lateral contador -->
<script src="js/reloj.js"></script>
<!-- Cambiar menu  -->
<script src="js/menu_2.0.js"></script>
<!-- Contenedor de todos los js de inteccion -->
<script src="js/todo.js"></script>
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
<!-- JS adicional  -->
<script type="text/javascript">

function convertirTexto() {
    var inputNombre = document.getElementById("editar-nombre");
    var textoNombre = inputNombre.value;
    textoNombre = textoNombre.charAt(0).toUpperCase() + textoNombre.slice(1).toLowerCase();
    inputNombre.value = textoNombre;

    var inputApellido = document.getElementById("editar-apellido");
    var textoApellido = inputApellido.value;
    textoApellido = textoApellido.charAt(0).toUpperCase() + textoApellido.slice(1).toLowerCase();
    inputApellido.value = textoApellido;
  }    
  var botonCancelar = document.getElementById("boton-cancelar");
  botonCancelar.addEventListener("click", function(){
    window.location.href = "tabla-registro.php";
  })
</script>

</body>
</html>
<!-- PHP Para la actualizacion de los datos -->
<?php
      if(isset($_POST['boton-guardar'])){
        if (empty($_POST['editar-nombre']) || empty($_POST['editar-apellido']) 
        || empty($_POST['editar-cedula']) || empty($_POST['editar-correo']) ) {
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
              $idper_actualizar=$_POST['idper'];
              $editarnombre = $_POST['editar-nombre'];
              $editarapellido = $_POST['editar-apellido'];
              $editarcedula = $_POST['editar-cedula'];
              $editarecorreo= $_POST['editar-correo'];
              $editarsedes = $_POST['editar-sede'];
              $editarestado = $_POST['editar-estatus'];
            


              $consulta2 ="UPDATE personal SET 
              nombre='$editarnombre',
              apellido='$editarapellido',
              cedula=' $editarcedula',
              correo=' $editarecorreo',
              idsede='$editarsedes ',
              idestatus=' $editarestado' WHERE idpersonal = '$idper_actualizar' ";
              
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
                          html:'Esta persona se actualizó de manera exitosa, para cerrar la alerta dele click al boton <b>Aceptar</b> ',
                          footer:'<a class="boton-alerts-verde" href="tabla-registro.php">ACEPTAR</a>',
                          
                    })
                </script>
                <?php
          }

        }
 
      }
      
      ?>