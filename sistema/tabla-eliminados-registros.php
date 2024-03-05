<?php
session_start();
include("php/rol.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de personal Eliminado</title>
    <!--Link de vinculacion-->
    <link rel="stylesheet" href="css/menus.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/botones.css">
    <link rel="stylesheet" href="css/datatable.css">
    <link rel="stylesheet" href="css/tabla-eliminados.css">
    <link rel="stylesheet" href="js/datatable/datatables.min.css"/>
<!-- BootsTrap -->
<script src="js/libreriasJS/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="js/libreriasJS/sweetalert2.all.min.js"></script>
<!-- BootsTrap -->
<script src="js/libreriasJS/bootstrap.bundle.min.js"></script>
<!-- JQuery -->
<script src="js/libreriasJS/jquery-3.6.3.min.js"></script>
<!-- Llamado de DataTable -->
<script src="js/datatable/datatables.min.js"></script>
<!-- DataTable js DataTAble bootstrap -->
<script src="js/datatable/dataTables.bootstrap5.min.js"></script>

    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
<?php include("include/header.php");?>

<div id="contenedor-primario"class="contenedor-primario container-fluid d-flex  ">
  <div id="contenedor-segundario "class="contenedor-segundario  d-flex  ">
    <div class="tabla container-fluid d-flex justify-content-center bg-danger ">
      <h4 class="text-white me-3">T A B L A</h4>
      <h4 class="text-white me-3">D E</h4>
      <h4 class="text-white">E L I M I N A D O S</h4>
    </div>
  <div id="contenedor-tercero" class="formulario ">
        <div class="">
        <table class="table table-striped table-bordered" id="myTable">
					<thead class="thead-dark">
						<tr>	
            <th class="identificador_identificador">id</th>	
							<th class="">NOMBRE</th>
							<th class="">APELLIDO</th>
							<th class="">CEDULA</th>
				      <th class="">DEPENDENCIA</th>
				      <th>ESTATUS</th>
							<th class="">FECHA</th>
              <th class="">HORA</th>
              <th class="">USUARIO</th>
              <th class="">CEDULA</th>
              <th>ACCION</th>	
						</tr>
					</thead>
				</table>
        </div>
        <section class="d-flex">
          <div class="mt-2 me-3">
            <button class="boton-alerts-rojo" id="repor-personal"><img src="icons/pdf.png" alt="" class="me-3">PDF</button>
          </div>
          <div class="mt-2 me-3">
            <a href="registro-personal.php"><button class="boton-alerts-azul" ><img src="icons/administracion.png" alt="" class="me-3">Registro Personal</button></a>
          </div>
          <div class="mt-2 ">
            <a href="tabla-registro.php"><button class="boton-alerts-verde" ><img src="icons/administracion.png" alt="" class="me-3">Modificar Personal</button></a>
          </div>
        </section>
    </div>
  </div>
  <footer class="contenedor-upta d-flex ">
    <div>
      <p>&copy Universidad Politécnica Territorial de Aragua Federico Brito Figuero(UPTA).</p>
      <p>&copy INCES la Romana</p>
    </div>
  </footer>
</div>
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
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
<script src="./js/datatable/siver-side/data-table-peliminados.js"></script>
<?php include("modal/modal-personal-eliminado.php")?>

<!-- Mover menú para telefonos movíles-->
<script src="js/menu_2.0.js"></script>
<!-- Modal para Elliminar-->
<script type="text/javascript">

//capturar la fila  de la table para el editar o borrar 
var table = document.getElementById('myTable'); // capturar id de la tabla
var fila;

$(document).on("click", ".boton-habilita", function(){

    fila = $(this).closest("tr");// Capturar table row de la tabla
    id = parseInt(fila.find('td:eq(0)').text());//Capturar el id del primer sector 0
    //Evento swal de SweetAlerts 
    Swal.fire({
        title: 'Estas seguro de habilitar este personal?',
        icon: 'question',
        allowOutsideClick: true,
        allowEnterKey: true,
        confirmButtonText: false,
        showConfirmButton: false,
        html:'Para culminar de habilitar al personal presione el boton <b>si</b>',
        footer:'<button class="boton-alerts-verde me-2" id="campo2">Si !</button><button class="boton-alerts-gris" id="cancelar-boton-habilitar">Cancelar</button>'                
      });
    
    // Cerrar la alerta de sweetalerts del boton habilittar
    var BotonCancelar = document.getElementById("cancelar-boton-habilitar");
    BotonCancelar.addEventListener('click', function(){
      Swal.close();
    });
    // Cerrar la alerta de sweetalerts del boton habilittar
    var Boton_habilitar = document.getElementById("campo2");
    Boton_habilitar.addEventListener('click', function(){
      window.location.href = "tabla-eliminados-registros.php?boton-habilitar= boton-habilitar&tabla="+id;
    });

});


const reportepersonal = document.getElementById("repor-personal");
reportepersonal.addEventListener("click", function(){
  window.open('php/reportes/tabla-registros-eliminados.php');
});

</script>
</body>
</html>
<?php
if(isset($_GET['boton-habilitar'])){
      include("../php/conexion.php");
      $id=$_GET['tabla'];
      $activo= 1;
      echo $id;
      
      $consulta1 ="UPDATE personal SET activo='$activo' WHERE idpersonal = '$id'";
      $resultadoeditar1 = mysqli_query($conexion, $consulta1);

      $consulta2 ="DELETE FROM personal_eliminado WHERE idpersonal = '$id' ";
      $resultadoeditar2 = mysqli_query($conexion, $consulta2);
    if($resultadoeditar1){
          if($resultadoeditar2){
            ?>
              <script type="text/javascript">
                  Swal.fire({
                          title: 'persona activada con exito!',
                          icon: 'success',
                          allowOutsideClick: true,
                          allowEnterKey: true,
                          confirmButtonText: 'Aceptar',
                          confirmButtonColor: '#28a745',
                          showConfirmButton: true,
                          html:'Para cerrar esta alerta presione el boton <b>Aceptar</b>',          
                          timer: 4000
                        });
              </script>
                  
              <?php
          }else{
          echo '
          TUVIMOS PROBLEMAS PARA ELIMINAR A ESTE USUARIO 
          DE ESTA TABLA PERO YA SE HABILITO EN LA TABLA 
          DE PERSONAL
          ';
          }

    }else{
    echo 'TUVIMOS PROBELMAS PARA HABILITAR 
    A ESTA PERSONAL ';
    }
}

?>