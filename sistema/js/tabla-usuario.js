
$(document).on("click", ".boton-configuracion", function(){

    fila = $(this).closest("tr");// Capturar table row de la tabla
    id_editar = parseInt(fila.find('td:eq(0)').text());//Capturar el id del primer sector 0
    //Evento swal de SweetAlerts 
    Swal.fire({
      title: 'Estas seguro de configurar estos datos?',
      icon: 'question',
      allowOutsideClick: true,
      allowEnterKey: true,
      confirmButtonText: false,
      showConfirmButton: false,
      html:'Presione la opción que usted requiera <br><b>Habilitar:</b> esta opción permite que el usuario se mantenga activo en la aplicación.<br> <b>Desactivar:</b> desabilita completamente al usuario de la aplicación.<br> <b>Actualiazar:</b> permite cambiar los datos del usuario registrado.',
      footer:'<button class="boton-alerts-azul me-2" id="boton-envio">Actualizar</button><button class="boton-alerts-verde me-2" id="boton-habilitar">Habilitar</button><button class="boton-alerts-roja me-2" id="boton-desabilitar">Desabilitar</button> <button class="boton-alerts-gris" id="cancelar-boton">Cancelar</button>'
      
                        
    });
    
    // ACTUALIZAR
     //Redireccionar con el id del input a la pagina actualizar
    var botonAlerta = document.getElementById("boton-envio");
    botonAlerta.addEventListener('click', function(){
      window.location.href = "actualizar-usuario.php?tabla="+id_editar;
    });
    
    //////// habilitar
    var botonAlerta = document.getElementById("boton-habilitar");
    botonAlerta.addEventListener('click', function(){
      
        Swal.fire({
        title: 'Estas seguro de habilitar este usuario?',
        icon: 'question',
        allowOutsideClick: true,
        allowEnterKey: true,
        confirmButtonText: false,
        showConfirmButton: false,
        html:'Para culminar de habilitar al usuario presione el boton <b>si</b>',
        footer:'<button class="boton-alerts-verde me-2" id="campo">Si !</button><button class="boton-alerts-gris" id="cancelar-boton-habilitar">Cancelar</button>'                
      });
    
    // Cerrar la alerta de sweetalerts del boton habilittar
    var BotonCancelar = document.getElementById("cancelar-boton-habilitar");
    BotonCancelar.addEventListener('click', function(){
      Swal.close();
    });
    // Cerrar la alerta de sweetalerts del boton habilittar
    var Botonhabilitar = document.getElementById("campo");
    Botonhabilitar.addEventListener('click', function(){
      window.location.href = "tabla-usuario.php?boton-habilitar= boton-habilitar&tabla="+id_editar;
    });
    
    
    });
    
    
    ////// DESABILITAR
    
    
    //Redireccionar con el id del input a la pagina actualizar
    var botonAlerta = document.getElementById("boton-desabilitar");
    botonAlerta.addEventListener('click', function(){
    
      Swal.fire({
        title: 'Estas seguro de desabilitar este usuario?',
        icon: 'question',
        allowOutsideClick: true,
        allowEnterKey: true,
        confirmButtonText: false,
        showConfirmButton: false,
        html:'Para culminar de desabilitar al usuario presione el boton <b>si</b>',
        footer:'<button class="boton-alerts-verde me-2" id="campo-desabilitar">Si !</button><button class="boton-alerts-gris" id="cancelar-boton-desabilitar">Cancelar</button>'                
      });
    
    
    // Cerrar la alerta de sweetalerts del boton habilittar
    var BotonCancelar = document.getElementById("cancelar-boton-desabilitar");
    BotonCancelar.addEventListener('click', function(){
      Swal.close();
    });
    // Cerrar la alertadesabilitar de sweetalerts del boton habilittar
    var Botondesabilitar = document.getElementById("campo-desabilitar");
    Botondesabilitar.addEventListener('click', function(){
      window.location.href = "tabla-usuario.php?boton-desabilitar= boton-desabilitar&tabla="+id_editar;
    });
    
    });
    
    
    ////// CANCELAR LA ALERTA
    
    // Cerrar la alerta de sweetalerts
    var BotonCancelar = document.getElementById("cancelar-boton");
    BotonCancelar.addEventListener('click', function(){
      Swal.close();
    });
    
    });
      
    var contraseña = document.getElementById('contraseña');
    var input = document.getElementById('input-contraseña');
    contraseña.addEventListener("click", function(){
            if (input.type == "password") {
                input.type = "text";
              
            }else{
                input.type = "password";
               
            }
    });