<?php
session_start();
include("php/conexion.php");
include("php/rol.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
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
      #identificador-actualizar{
        display: none;
      }
      #contraseña{
        cursor: pointer;
      }
      .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        --bs-gutter-x: 0rem !important;
        --bs-gutter-y: 0;
        width: 100%;
        padding-right: calc(var(--bs-gutter-x) * .5);
        padding-left: calc(var(--bs-gutter-x) * .5);
        margin-right: auto;
        margin-left: auto;
      }
      .contenedor-primario{
        width: 100%;
        height: 100vh;
        
        flex-direction: column;
        align-items: center;
        
      }
      .contenedor-segundario{
        padding: 0px 30px 0px 250px;
      }
      .nombre-tabla{
        padding: 15px 0 10px 0px;
        margin-bottom: 10px;
        margin-top: 80px;
      }
      .nombre-tabla h4{
        font-size: 20px;
        margin-bottom: 10px;
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
      
      .input{
        background:#edede9;
      }
      .input-edit{
        text-align: center;
      }
      .input-edit label{
        color: black;
      }
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
        padding: 0 0 0 170px;
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
          padding: 0 40px 0 40px;
        }
        .contenedor-upta div{
          padding: 0 0 0 0;
          
        }
      }
      @media only screen and (max-width: 768px), handheld and (orientation: landscape){
      
   
        .nombre-tabla h4{
            font-size: 13px;
        }
       
      }
      @media only screen and (max-width: 668px), handheld and (orientation: landscape){
        .formulario form{
          display: flex;
          flex-direction: column;
        }
        .contenedor-botones{
          width: 100%;
        }
      }
      @media only screen and (max-width: 428px), handheld and (orientation: landscape){
        .contenedor-segundario{
          padding: 0 0px 0 0px;
        }
        .formulario form{
          padding: 15px;
          box-sizing: border-box;
        }
      }
</style>
</head>
<?php include("include/header.php");


$idPersonalRegistro = $_GET['tabla'];

  $consulta_registro_personal = "SELECT * FROM usuario INNER JOIN rol ON 
  usuario.idrol = rol.idrol
  WHERE idusuario='".$idPersonalRegistro."' ";
$resultado_registro_personal = $conexion->query($consulta_registro_personal);

while ($rowUsuario=$resultado_registro_personal->fetch_assoc()){
  $idper = $rowUsuario['idusuario'];
  $nombreUsuario= $rowUsuario['nombre'];
  $usuarioidoUsuario = $rowUsuario['usuario'];
  $cedulaUsuario = $rowUsuario['cedula_usuario'];
  $contraseñaUsuario = $rowUsuario['contraseña'];
  $rolUsuario = $rowUsuario['rol'];
  $idrol= $rowUsuario['idrol'];

}

?>
<div id="contenedor-primario"class="contenedor-primario container-fluid aling-items-center d-flex ">
    
    <div id="contenedor-segundario"class="contenedor-segundario  ">
    <div class="nombre-tabla container-fluid d-flex justify-content-center bg-danger">
      <h4 class="text-white me-3">A C T U A L I Z A R </h4><h4 class="text-white"> U S U A R I O</h4>
    </div>
      <div class="formulario ">
        <form class="" action="" method="POST">
                <div class="input-group mb-3" id="identificador-actualizar">
                  <label class="input-edit" for="">Identificador</label>
                  <span class="input-group-text" id="basic-addon1"><img src="icons/carpeta.png" alt=""></span>
                  <input class="modal-input form-control" id="idper_editar" type="text" name="idper" value="<?php echo $idper;?>" ><br>
               </div>
                <!-- EDITAR NOMBRE -->
                <div class="input-edit input-group mb-3 ">
                    <label class="" for="">Nombre</label>
                    <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                    <input class="form-control input" type="text" id="editar-nombre" name="editar-nombre" autocomplete="off" value="<?php echo $nombreUsuario;?>" placeholder="Nombre" readonly><br>
                </div>
                 <!-- EDITAR CEDULA -->
                 <div class="input-edit input-group  mb-3">
                    <label class="" for="">Cédula</label>
                    <span class="input-group-text" ><img src="icons/cedula2.png" alt=""></span>
                    <input  minlength="6" maxlength="10"class="form-control input" id="editar-cedula" type="text" name="editar-cedula" autocomplete="off" value="<?php echo $cedulaUsuario;?>" placeholder="Cedula" readonly><br>
                </div>
                <!-- EDITAR usuario -->
                <div class="input-edit input-group  mb-3">
                    <label class="" for="">Usuario</label>
                    <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
                    <input class="form-control" type="text" id="editar-apellido" name="editar-usuario" autocomplete="off" value="<?php echo $usuarioidoUsuario;?>" placeholder="Usuario" ><br>
                </div>
                
                <!-- EDITAR Contraseña -->
                <div class="input-edit input-group  mb-3">
                    <label class="" for="">Contraseña</label>
                    <span class="input-group-text" ><img onclick="cambiarimagen();" id="contraseña" src="icons/candado.png" alt=""></span>
                    <input class="form-control" type="password" id="input" name="editar-contraseña" autocomplete="off" value="<?php echo $contraseñaUsuario;?>" placeholder="Contraseña"><br>
                </div>
               
                <!-- MODAL ROL -->
                <div class="input-edit input-group mb-3">
                    <label class="" for="">Rol</label>
                    <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
                    <select class="form-control"   name="editar-rol"><br>
                    <option value="<?php echo $idrol;?>"><?php echo $rolUsuario;?></option>
                       <?php
                        $estados = "SELECT * FROM rol";
                        $resultado = mysqli_query($conexion, $estados);
                        while ($esta = mysqli_fetch_array($resultado)) {
                          $estatus = $esta['rol'];
                          $idestatus = $esta['idrol'];

                          ?>
                            <option value="<?php echo $idestatus?>"><?php echo $estatus?></option>
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
            
          </form>
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
<!-- Cambiar menu  -->
<script src="js/menu_2.0.js"></script>
<!-- Contenedor de todos los js de inteccion -->
<script src="js/todo.js"></script>
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
<!-- JS adicional  -->
<script type="text/javascript">
  var botonCancelar = document.getElementById("boton-cancelar");
  botonCancelar.addEventListener("click", function(){
    window.location.href = "tabla-registro.php";
  });

  //cambiar el input de password a text
var contra = document.getElementById('contra');
var input = document.getElementById('input');
contra.addEventListener("click", function(){
        if (input.type == "password") {
            input.type = "text";
          
        }else{
            input.type = "password";
           
        }
});
//cambiar la imagen principal de ojo a ojo no visible 
var fotomostrada= "ojo"
function cambiarimagen(){
    var imagen = document.getElementById("contraseña");
    
    if (fotomostrada == "ojo") {
        imagen.src = "icons/candado-abierto2.png";
        fotomostrada = "visible";
        
    }
    else if (fotomostrada == "visible"){
        imagen.src = "icons/candado.png";
        fotomostrada = "ojo";
    }
}
</script>

</body>
</html>
<!-- PHP Para la actualizacion de los datos -->
<?php
      if(isset($_POST['boton-guardar'])){
        if ( empty($_POST['editar-usuario']) 
        ||  empty($_POST['editar-contraseña']) ) {
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
            $editarusuario = $_POST['editar-usuario'];
            $editarcontraseña = $_POST['editar-contraseña'];
            $editarrol = $_POST['editar-rol'];
            $consulta2 ="UPDATE usuario SET  usuario='$editarusuario', contraseña='$editarcontraseña', idrol='$editarrol' WHERE idusuario='$id'";
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
      
      ?>