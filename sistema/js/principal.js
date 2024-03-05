

//escondeer id para actualizar datos

$('#identificardor-usuario').hide();

/////////// cambiar imagen del input de la contraseña del usuario
var contraseña = document.getElementById('contraseña');
var input_2 = document.getElementById('input');
contraseña.addEventListener("click", function(){
  
        if (input_2.type == "password") {
            input_2.type = "text";
          
        }else{
            input_2.type = "password";
           
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


/////////// cambiar imagen del input de la contraseña actual del usuario 
var contraseña2 = document.getElementById('contraseña2');
var inputContraseña = document.getElementById('contraseña-actual');
contraseña2.addEventListener("click", function(){
  
        if (inputContraseña.type == "password") {
            inputContraseña.type = "text";
          
        }else{
            inputContraseña.type = "password";
           
        }
});

//cambiar la imagen principal de ojo a ojo no visible 
var fotomostrada2= "ojo"
function cambiarimagen2(){
    var imagen = document.getElementById("contraseña2");
    
    if (fotomostrada2 == "ojo") {
        imagen.src = "icons/candado-abierto2.png";
        fotomostrada2 = "visible";
        
    }
    else if (fotomostrada2 == "visible"){
        imagen.src = "icons/candado.png";
        fotomostrada = "ojo";
    }
}


///////////////////////////////////////
/////////// cambiar imagen del input de la contraseña a cambiar  
var contraseña3 = document.getElementById('contraseña3');
var inputContraseñaNueva = document.getElementById('nueva-contraseña');
contraseña3.addEventListener("click", function(){
  
        if (inputContraseñaNueva.type == "password") {
            inputContraseñaNueva.type = "text";
          
        }else{
            inputContraseñaNueva.type = "password";
           
        }
});

//cambiar la imagen principal de ojo a ojo no visible 
var fotomostrada3= "ojo"
function cambiarimagen3(){
    var imagen = document.getElementById("contraseña3");
    
    if (fotomostrada3 == "ojo") {
        imagen.src = "icons/candado-abierto2.png";
        fotomostrada3 = "visible";
        
    }
    else if (fotomostrada3 == "visible"){
        imagen.src = "icons/candado.png";
        fotomostrada = "ojo";
    }
}

/// boton para la confirmacion de los datos de la base de datos

var botonBase = document.getElementById("botonbd");
botonBase.addEventListener("click",  function(){
    Swal.fire({
        title: 'Quieres descargar la base de datos del sistema?',
        icon: 'question',
        allowOutsideClick: true,
        allowEnterKey: true,
        confirmButtonText: false,
        showConfirmButton: false,
        html:'Para descargar la base de datos de todos los registros en el sistema dale click en el boton <b>Descargar</b> ',
        footer:'<button class="boton-alerts-verde me-2" id="Descargar">Descargar</button><button class="boton-alerts-gris" id="cancelar-boton">Cancelar</button>',
        timer: 10000
                          
      });
    //Redireccionar con el id del input a la pagina actualizar
    var BotonDescargarBD = document.getElementById("Descargar");
    var Datos = "Administrador"; 
    BotonDescargarBD.addEventListener('click', function(){
      window.location.href = "../sistema/php/validarDescarga.php?datos="+Datos;
    });

    // Cerrar la alerta de sweetalerts
    var BotonCancelar = document.getElementById("cancelar-boton");
    BotonCancelar.addEventListener('click', function(){
      Swal.close();
    });
    // Cerrar la alerta de sweetalerts CON EL BOTON DE DESCARGAE
    var BotonDescar = document.getElementById("Descargar");
    BotonDescar.addEventListener('click', function(){
      Swal.close();
    });
});