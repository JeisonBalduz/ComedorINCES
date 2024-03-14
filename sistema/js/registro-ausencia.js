$(document).on("click", "#boton-permisos", function () {
  var table = document.getElementById("myTableModalPermisos"); // capturar id de la tabla
  var fila;

  fila = $(this).closest("tr"); // Capturar table row de la tabla
  id = parseInt(fila.find("td:eq(0)").text());
  console.log(id);
  console.log(fila);

  //
  
    fila = $(this).closest("tr");// Capturar table row de la tabla
    id_editar = parseInt(fila.find('td:eq(0)').text());//Capturar el id del primer sector 0
    //Evento swal de SweetAlerts 
    Swal.fire({
      title: 'Estas seguro de eliminar este Permiso?',
      icon: 'question',
      allowOutsideClick: true,
      allowEnterKey: true,
      confirmButtonText: false,
      showConfirmButton: false,
      html:'Para aceptar eliminar este permiso presione el boton <b>Aceptar</b> ',
      footer:'<button class="boton-alerts-verde me-2" id="boton-envio">Aceptar</button><button class="boton-alerts-gris" id="cancelar-boton">Cancelar</button>',
      timer: 10000
                        
    });
     //Redireccionar con el id del input a la pagina actualizar
    var botonAlerta = document.getElementById("boton-envio");
    botonAlerta.addEventListener('click', function(){
      window.open("./eliminar/eliminar-permiso.php?permisos=" + id);
    });
  
    // Cerrar la alerta de sweetalerts
    var BotonCancelar = document.getElementById("cancelar-boton");
    BotonCancelar.addEventListener('click', function(){
      Swal.close();
    });
  
 
});


// actualizar permisos
$(document).on("click", "#actualizar-editar-permiso", function () {
  var table = document.getElementById("myTableModalPermisos"); // capturar id de la tabla
  var fila;

  fila = $(this).closest("tr"); // Capturar table row de la tabla
  id = parseInt(fila.find("td:eq(0)").text());
  console.log(id);
  console.log(fila);

  //
  
    fila = $(this).closest("tr");// Capturar table row de la tabla
    id_editar = parseInt(fila.find('td:eq(0)').text());//Capturar el id del primer sector 0
    //Evento swal de SweetAlerts 
    Swal.fire({
      title: 'Estas seguro de actualizar este Permiso?',
      icon: 'question',
      allowOutsideClick: true,
      allowEnterKey: true,
      confirmButtonText: false,
      showConfirmButton: false,
      html:'Para aceptar actualizar este permiso presione el boton <b>Aceptar</b> ',
      footer:'<button class="boton-alerts-verde me-2" id="boton-envio2">Aceptar</button><button class="boton-alerts-gris" id="cancelar-boton">Cancelar</button>',
      timer: 10000
                        
    });
     //Redireccionar con el id del input a la pagina actualizar
    var botonAlerta = document.getElementById("boton-envio2");
    botonAlerta.addEventListener('click', function(){
      window.open("./actualizarpermisos.php?permisos=" + id);
    });
  
    // Cerrar la alerta de sweetalerts
    var BotonCancelar = document.getElementById("cancelar-boton");
    BotonCancelar.addEventListener('click', function(){
      Swal.close();
    });
  
 
});




const fechaHoyISO = new Date().toISOString().slice(0, 10);
const fechaHoyLocal = new Date(fechaHoyISO).toLocaleDateString("es-VE");
var limpiar_datos = document.getElementById("limpiar");
  limpiar_datos.addEventListener("click", function(){
    $("#cedula").val("");
    $("#nombre").val("");
    $("#apellido").val("");
    $("#sede").val("");
    $("#estatus").val("");
    $("#fecha-f").val("");
    $("#permiso").val("");
  
  });

