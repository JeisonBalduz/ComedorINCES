
$(document).on("click", ".cambiar", function(){

    fila = $(this).closest("tr");// Capturar table row de la tabla
    id_editar = parseInt(fila.find('td:eq(0)').text());//Capturar el id del primer sector 0
    //Evento swal de SweetAlerts 
    Swal.fire({
      title: 'Estas seguro de configurar este ticket?',
      icon: 'question',
      allowOutsideClick: true,
      allowEnterKey: true,
      confirmButtonText: false,
      showConfirmButton: false,
      html:'Presione la opción que usted requiera',
      footer:'<button class="boton-alerts-azul me-2" id="boton-envio">Actualizar</button> <button class="boton-alerts-gris" id="cancelar-boton">Cancelar</button>'
      
                        
    });
    
    // ACTUALIZAR
     //Redireccionar con el id del input a la pagina actualizar
    var botonAlerta = document.getElementById("boton-envio");
    botonAlerta.addEventListener('click', function(){
      window.location.href = "actualizar-soliticket.php?tabla="+id_editar;
    });
    
    
    ////// CANCELAR LA ALERTA
    
    // Cerrar la alerta de sweetalerts
    var BotonCancelar = document.getElementById("cancelar-boton");
    BotonCancelar.addEventListener('click', function(){
      Swal.close();
    });
    
});
      
