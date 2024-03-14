

function obtenerHoraActual() {
  const fechaActual = new Date();
  return fechaActual.getHours() + ":" + fechaActual.getMinutes();
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

const rangosAcceso = [
    {
      horaApertura: "06:00",
      horaCierre: "08:00",
    },
    {
      horaApertura: "09:00",
      horaCierre: "11:00",
    },
    {
      horaApertura: "18:00",
      horaCierre: "19:00",
    },
  ];
  
  function comprobarAcceso() {
    const horaActual = obtenerHoraActual();
    
  
    for (const rango of rangosAcceso) {
      if (horaActual >= rango.horaApertura && horaActual <= rango.horaCierre) {
       
        return;
      }
    }
       
    
  }
  comprobarAcceso();