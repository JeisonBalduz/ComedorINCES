<?php
session_start();
include("php/conexion.php");
include("php/rol.php");

$idsede = $_GET['tabla'];

  $consulta_registro_sede = "SELECT * FROM sedes INNER JOIN estados ON 
  sedes.idestados = estados.idestado INNER JOIN sedes_codigo ON
  sedes.codigo = sedes_codigo.idcs
  WHERE idsede='".$idsede."' ";
$resultado_registro_sede = $conexion->query($consulta_registro_sede);

while ($rowUsuario=$resultado_registro_sede->fetch_assoc()){
  $idper = $rowUsuario['idsede'];
  $nombreSede= $rowUsuario['sede'];
  $estado = $rowUsuario['estado'];
  $idestado = $rowUsuario['idestado'];
  $codigo = $rowUsuario['codigo_sede'];
  $idcodigo = $rowUsuario['idcs'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Sede</title>
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
      .input-edit{
        text-align: center;
      }
      .input-edit label{
        color: black;
      }
      .contenedor-botones{
        width: 200%;
        
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

      #identificador-actualizar{
        display: none;
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
      <h4 class="text-white me-3">A C T U A L I Z A R </h4><h4 class="text-white"> S E D E</h4>
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
                    <label class="" for="">Dependencia</label>
                    <span class="input-group-text" ><img src="icons/sede-sede.png" alt=""></span>
                    <input class="form-control" type="text" id="editar-sede" name="editar-sede" autocomplete="off" value="<?php echo $nombreSede;?>" placeholder="Dependencia" onkeypress="return soloLetras(event);"><br>
                </div>
                 <!-- MODAL ROL -->
                 <div class="input-edit input-group mb-3">
                    <label class="" for="">Estado</label>
                    <span class="input-group-text" ><img src="icons/estado-venezuela.png" alt=""></span>
                    <select class="form-control"   name="editar-estado"><br>
                    <option value="<?php echo $idestado;?>"><?php echo $estado;?></option>
                       <?php
                        $estados = "SELECT * FROM estados";
                        $resultado = mysqli_query($conexion, $estados);
                        while ($esta = mysqli_fetch_array($resultado)) {
                          $estado = $esta['estado'];
                          $idestado = $esta['idestado'];

                          ?>
                            <option value="<?php echo $idestado?>"><?php echo $estado?></option>
                          <?php
                        }
                       ?>
                    </select>
                
                </div>
                 
                <!-- MODAL ROL -->
                <div class="input-edit input-group mb-3">
                    <label class="" for="">Código</label>
                    <span class="input-group-text" ><img src="icons/codigo-codigo.png" alt=""></span>
                    <select class="form-control"   name="editar-codigo"><br>
                    <option value="<?php echo $idcodigo;?>"><?php echo $codigo;?></option>
                       <?php
                        $codigo = "SELECT * FROM sedes_codigo";
                        $resultado = mysqli_query($conexion, $codigo);
                        while ($esta = mysqli_fetch_array($resultado)) {
                          $codigo = $esta['codigo_sede'];
                          $idcodigo = $esta['idcs'];

                          ?>
                            <option value="<?php echo $idcodigo?>"><?php echo $codigo?></option>
                          <?php
                        }
                       ?>
                    </select>
                
                </div>
                <div>

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
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
<!-- Cambiar menu  -->
<script src="js/menu_2.0.js"></script>
<!-- Contenedor de todos los js de inteccion -->
<script src="js/todo.js"></script>
<!-- JS adicional  -->
<script type="text/javascript">
  var botonCancelar = document.getElementById("boton-cancelar");
  botonCancelar.addEventListener("click", function(){
    window.location.href = "registo-sede.php";
  })
</script>

</body>
</html>
<!-- PHP Para la actualizacion de los datos -->
<?php
      if(isset($_POST['boton-guardar'])){
        if ( empty($_POST['editar-sede'])) {
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
            $sedes_editar = $_POST['editar-sede'];
            $estado_editar = $_POST['editar-estado'];
            $codigo_editar = $_POST['editar-codigo'];
            $consulta2 ="UPDATE sedes SET  sede='$sedes_editar', idestados='$estado_editar', codigo='$codigo_editar' WHERE idsede='$id'";
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
                        html:'La dependencia se actualizó correctamente, para cerrar la alerta dele click al boton <b>Aceptar</b> ',
                        footer:'<a class="boton-alerts-verde" href="registo-sede.php">ACEPTAR</a>',
                        
                  })
              </script>
              <?php
            }

        }
 
      }
      
      ?>