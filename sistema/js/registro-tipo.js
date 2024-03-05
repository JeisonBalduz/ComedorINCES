
//datos de datatable

//capturar la fila  de la table para el editar o borrar 
var table = document.getElementById('myTable'); // capturar id de la tabla
var fila; //capturar la fila para editar o borrar el registro  
//Botón ELIMINAR   
$(document).on("click", ".button-eliminar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    estatus = fila.find('td:eq(1)').text();
    $("#estatus_id").val(id);
    $("#estatus").val(estatus);
    console.log(estatus);
});
var boton_actualziar = document.getElementById("actualizar-editar");
$(document).on("click", ".button-actualizar", function(){
    fila = $(this).closest("tr");// Capturar table row de la tabla
    id_editar = parseInt(fila.find('td:eq(0)').text());//Capturar el id del primer sector 0
    //Evento swal de SweetAlerts 
    Swal.fire({
      title: 'Estas seguro de actualizar esta dependencia?',
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
      window.location.href = "actualizar-tipo.php?tabla="+id_editar;
    });

    // Cerrar la alerta de sweetalerts
    var BotonCancelar = document.getElementById("cancelar-boton");
    BotonCancelar.addEventListener('click', function(){
      Swal.close();
    });

});

 // Cerrar la alerta de sweetalerts
 var BotonActualizarModal = document.getElementById("actualizar_eliminar");
    BotonActualizarModal.addEventListener('click', function(){
      window.location.href = "actualizar-sede.php?tabla="+id;
    });
 