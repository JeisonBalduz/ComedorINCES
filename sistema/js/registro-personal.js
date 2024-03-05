  //document.getElementById('nombre').disabled = false;
  function convertirTexto() {
    var inputNombre = document.getElementById("nombre");
    var textoNombre = inputNombre.value;
    textoNombre = textoNombre.charAt(0).toUpperCase() + textoNombre.slice(1).toLowerCase();
    inputNombre.value = textoNombre;

    var inputApellido = document.getElementById("apellido");
    var textoApellido = inputApellido.value;
    textoApellido = textoApellido.charAt(0).toUpperCase() + textoApellido.slice(1).toLowerCase();
    inputApellido.value = textoApellido;
  }   

// Obtener los elementos del DOM
const inputNombre = document.getElementById('nombre');
const inputApellido = document.getElementById('apellido');
const inputCedula = document.getElementById('cedula');
const inputCorreo = document.getElementById('correo');

const selectorDependencia = document.getElementById('sede');
const selectorEstatus = document.getElementById('estatus');

// Agregar un evento de escucha de entrada al input de 4 números
inputNombre.addEventListener('input', () => {
  // Verificar si se han ingresado 6 números
  if (inputNombre.value.length === 3) {
    // Activar el input que deseas activar
    inputApellido.disabled = false;
    //inputNombre.classList.add('input-aceptar');
  }
  if(inputNombre.value.length < 3){
    inputApellido.disabled = true;
    //inputNombre.classList.remove('input-aceptar');
  }

});

// Agregar un evento de escucha de entrada al input de 4 números
inputApellido.addEventListener('input', () => {
  // Verificar si se han ingresado 6 números
  if (inputApellido.value.length === 4) {
    // Activar el input que deseas activar
    inputCedula.disabled = false;
    //inputApellido.classList.add('input-aceptar');
  }
  if(inputApellido.value.length < 4){
    inputCedula.disabled = true;
    //inputApellido.classList.remove('input-aceptar');
  }

});

// Agregar un evento de escucha de entrada al input de 6 números
inputCedula.addEventListener('input', () => {
  // Verificar si se han ingresado 6 números
  if (inputCedula.value.length === 6) {
    // Activar el input que deseas activar
    inputCorreo.disabled = false;
    //inputCedula.classList.add('input-aceptar');
  }
  if(inputCedula.value.length < 6){
    inputCorreo.disabled = true;
    //inputCedula.classList.remove('input-aceptar');
  }

});

// Agregar un evento de escucha de entrada al input de 4 números
inputCorreo.addEventListener('input', () => {
  // Verificar si se han ingresado 6 números
  if (inputCorreo.value.includes('@')) {
    // Activar el input que deseas activar
    selectorDependencia.disabled = false;
    selectorEstatus.disabled = false;
    
  }else{
    selectorDependencia.disabled = true;
    selectorEstatus.disabled = true;
    
  }

});
/*
/// Obtener la hora actual
const now = new Date();
// Obtener la hora actual como número
const currentHour = now.getHours();

// Verificar si la hora actual está en el rango permitido
if (currentHour >= 22 && currentHour < 23) {
  // Permitir el acceso al sistema
  console.log('Acceso permitido.');
} else {
  // Denegar el acceso al sistema y redireccionar a la página principal.php
  window.location.href = 'principal.php';
}*/