
const horaApertura = "06:00";
const horaCierre = "24:00";


function obtenerHoraActual() {
  const fechaActual = new Date();
  return fechaActual.getHours() + ":" + fechaActual.getMinutes();
}

function comprobarAcceso() {
  const horaActual = obtenerHoraActual();
  const tiempoRestante = calcularTiempoRestante(horaActual, horaCierre);

  if (horaActual >= horaApertura && horaActual <= horaCierre) {
         
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
      }
  });
  Toast.fire({
      icon: "success",
      title: "Apertura de solicitud de comida permitida"
  });
  } else {
     // Denegar el acceso al sistema
        Swal.fire({
            title: "Acceso Denegado!!!",
            icon: "warning",
            confirmButtonText: false,
            showConfirmButton: false,
            allowOutsideClick: false, // Evita que la alerta se cierre al hacer clic fuera de ella
            allowEscapeKey: false,
            html: `
                <p>el sistema ya paso su hora de apertura en estos momentos esta cerrado la solicitud de tickets recordamos que la hora de solicitud es</p>
                <div>
                    
                    <ol>09:00 am a 11:00 am el almuerzo<ol>
                    
                </div>
                <div class="botonComida">
                <a href="./principal.php" class="boton-eliminar">Aceptar</a>
                </div>
            `,
        });

    // Puedes agregar aquí un mensaje informativo o redireccionar al usuario a otra página
  }
}

function calcularTiempoRestante(horaActual, horaCierre) {
  const [horaActualH, horaActualM] = horaActual.split(":");
  const [horaCierreH, horaCierreM] = horaCierre.split(":");

  let horasRestantes = horaCierreH - horaActualH;
  let minutosRestantes = horaCierreM - horaActualM;

  if (minutosRestantes < 0) {
    minutosRestantes += 60;
    horasRestantes--;
  }

  return `${horasRestantes} horas y ${minutosRestantes} minutos`;
}

function mostrarAlertaAccesoAutorizado(tiempoRestante) {
  alert(
    `Acceso autorizado. Queda ${tiempoRestante} para que el sistema cierre.`
  );
}

function mostrarAlertaAccesoDenegado() {
  alert(
    "Acceso denegado. El sistema está cerrado. Horario de atención: " +
      horaApertura +
      " - " +
      horaCierre +
      "."
  );
}

comprobarAcceso();





var limpiar_datos = document.getElementById("limpiar");
  limpiar_datos.addEventListener("click", function(){
    $("#identificador").val("");
    $("#cedula").val("");
    $("#nombre").val("");
    $("#apellido").val("");
    $("#sede").val("");
    $("#estatus").val("");
    
  
  })




















