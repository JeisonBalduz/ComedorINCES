/*let html = "hola como estas, que tal todo amigo";
let div = document.getElementById("html");
let boton = document.getElementById("boton");
var contador = 0;
boton.addEventListener("click", function () {
  div.innerHTML = html;
  boton.style.color = "red";
  boton.style.animation = "";

  contador++;
  console.log(contador);

  if (contador === 2) {
    div.innerHTML = "";
    contador = 0;
  }
});
import {} from "module";
//cambiar a modo oscuro
let saludo = document.getElementById("growing");
console.log(saludo);
saludo.addEventListener("click", function () {
  div.innerHTML = "hola mi amor";
});
*/ // Variables de configuración
var horaApertura = 1; // Hora de apertura del sistema (configurable)
var minutoApertura = 9; // Minuto de apertura del sistema (configurable)
var segundoApertura = 0; // Segundo de apertura del sistema (configurable)

var horaCierre = 18; // Hora de cierre del sistema (configurable)
var minutoCierre = 0; // Minuto de cierre del sistema (configurable)
var segundoCierre = 0; // Segundo de cierre del sistema (configurable)

// Función para actualizar el contador
function actualizarContador() {
  var fechaActual = new Date();
  var horasActuales = fechaActual.getHours();
  var minutosActuales = fechaActual.getMinutes();
  var segundosActuales = fechaActual.getSeconds();

  var horasRestantes = 0;
  var minutosRestantes = 0;
  var segundosRestantes = 0;

  if (
    (horasActuales > horaApertura && horasActuales < horaCierre) ||
    (horasActuales === horaApertura &&
      minutosActuales >= minutoApertura &&
      segundosActuales >= segundoApertura) ||
    (horasActuales === horaCierre && minutosActuales < minutoCierre) ||
    (horasActuales === horaCierre &&
      minutosActuales === minutoCierre &&
      segundosActuales < segundoCierre)
  ) {
    document.getElementById("login").style.display = "block";
    document.getElementById("contador").style.display = "none";
  } else if (
    horasActuales < horaApertura ||
    (horasActuales === horaApertura && minutosActuales < minutoApertura) ||
    (horasActuales === horaApertura &&
      minutosActuales === minutoApertura &&
      segundosActuales < segundoApertura)
  ) {
    horasRestantes = horaApertura - horasActuales;
    minutosRestantes = minutoApertura - minutosActuales;
    segundosRestantes = segundoApertura - segundosActuales;
    if (segundosRestantes < 0) {
      segundosRestantes += 60;
      minutosRestantes -= 1;
    }
    if (minutosRestantes < 0) {
      minutosRestantes += 60;
      horasRestantes -= 1;
    }

    document.getElementById("contador").innerHTML =
      horasRestantes +
      "h " +
      minutosRestantes +
      "m " +
      segundosRestantes +
      "s restantes para la apertura del sistema.";
    document.getElementById("contador").style.display = "block";
    document.getElementById("login").style.display = "none";
  } else {
    horasRestantes = 24 - horasActuales + horaApertura;
    minutosRestantes = 59 - minutosActuales;
    segundosRestantes = 59 - segundosActuales;

    document.getElementById("contador").innerHTML =
      horasRestantes +
      "h " +
      minutosRestantes +
      "m " +
      segundosRestantes +
      "s restantes para la próxima apertura del sistema.";
    document.getElementById("contador").style.display = "block";
    document.getElementById("login").style.display = "none";
  }
}

// Actualizar el contador cada segundo
setInterval(actualizarContador, 1000);
