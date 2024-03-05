
// Capturar el evento del Botón para cargar la pagina del reporte 
const reportepersonal = document.getElementById("repor-personal");
reportepersonal.addEventListener("click", function(){
  window.open('php/reportes/reporte-tabla-personal.php');
});


//capturar la fila  de la table para el editar o borrar 
var table = document.getElementById('myTable'); // capturar id de la tabla
var fila; //capturar la fila para editar o borrar el registro  
//Botón ELIMINAR   
$(document).on("click", ".button-eliminar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    apellido = fila.find('td:eq(2)').text();
    cedula = parseInt(fila.find('td:eq(3)').text());
    dependencia = fila.find('td:eq(5)').text();
    estatus = fila.find('td:eq(6)').text();
    $("#idper").val(id); 
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#cedula_per").val(cedula);
    $("#dependencia_eliminar").val(dependencia);  
    $("#estatus_eliminar").val(estatus);    
});
/*
//INterceptar el boton de eliminar para aparecer la alerta de swetalerts
var BotonEliminarModal = document.getElementById("eliminar-registro");
BotonEliminarModal.addEventListener("click", function(){
  Swal.fire({
    title: 'Estas seguro de eliminar a esta persona?',
    icon: 'question',
    allowOutsideClick: true,
    allowEnterKey: true,
    confirmButtonText: false,
    showConfirmButton: false,
    html:'Para aceptar la eliminacion de estos datos presione el boton <b>Eliminar</b> ',
    footer:'<button class="boton-alerts-verde me-2" id="boton-envio">Eliminar</button><button class="boton-alerts-gris" id="cancelar-boton-eliminar">Cancelar</button>',
    timer: 10000
                      
  });

  var BoronCancelarEliminar = document.getElementById("cancelar-boton-eliminar");
  BoronCancelarEliminar.addEventListener("click", function(){
    Swal.close();
  })

});
*/
//Botón EDITAR 
$(document).on("click", ".button-actualizar", function(){

    fila = $(this).closest("tr");// Capturar table row de la tabla
    id_editar = parseInt(fila.find('td:eq(0)').text());//Capturar el id del primer sector 0
    //Evento swal de SweetAlerts 
    Swal.fire({
      title: 'Estas seguro de actualizar estos datos?',
      icon: 'question',
      allowOutsideClick: true,
      allowEnterKey: true,
      confirmButtonText: false,
      showConfirmButton: false,
      html:'Para aceptar actualizar estos datos presione el boton <b>Aceptar</b> ',
      footer:'<button class="boton-alerts-verde me-2" id="boton-envio">Aceptar</button><button class="boton-alerts-gris" id="cancelar-boton">Cancelar</button>',
      timer: 10000
                        
    });
     //Redireccionar con el id del input a la pagina actualizar
    var botonAlerta = document.getElementById("boton-envio");
    botonAlerta.addEventListener('click', function(){
      window.location.href = "actualizar-personal.php?tabla="+id_editar;
    });

    // Cerrar la alerta de sweetalerts
    var BotonCancelar = document.getElementById("cancelar-boton");
    BotonCancelar.addEventListener('click', function(){
      Swal.close();
    });

});
// Botond e actualizar en el modal
var BotonCambio2 = document.getElementById("boton-actualizar");
BotonCambio2.addEventListener('click',function(){
  var inputId = document.getElementById("idper").value;
  window.location.href = "actualizar-personal.php?tabla="+inputId;
})