
const currentPageUrl = window.location.href;

if (currentPageUrl === 'https://www.ejemplo.com/pagina-especifica') {
  // Ejecutar el código
  const xhr = new XMLHttpRequest();
  let contadorSolicitudes = 0;
  
  function obtenerFechaActual() {
    const fecha = new Date();
    const dia = fecha.getDate().toString().padStart(2, '0');
    const mes = (fecha.getMonth() + 1).toString().padStart(2, '0');
    const año = fecha.getFullYear();
  
    return `${año}-${mes}-${dia}`;
  }
  
  // Enviar la fecha actual
  const intervalo = setInterval(() => {
  
    if (contadorSolicitudes < 5) {
      contadorSolicitudes++;
  
      const fecha = obtenerFechaActual();
  
      xhr.open('POST', './sistema/php/formatearAusencia.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send(`fecha=${fecha}`);
  
      xhr.onload = function() {
        // ...
      };
    } else {
      // Deshabilitar el envío de más solicitudes
      clearInterval(intervalo);
      console.log('Se ha alcanzado el límite de solicitudes. Se han enviado ' + contadorSolicitudes + ' solicitudes.');
    }
  
  }, 1000); // Enviar la fecha cada segundo
}

// tabla de ausencias justificadas
const currentPageUrlTablaAusencia = window.location.href;

if (currentPageUrlTablaAusencia === 'http://localhost/comedor/sistema/tabla-ausencia.php') {
  
  //ESTA ES PARA LA TABLA DE AUSENCIA 
  const xhr2 = new XMLHttpRequest();
  let contadorSolicitudes2 = 0;
  
  function obtenerFechaActual() {
    const fecha = new Date();
    const dia = fecha.getDate().toString().padStart(2, '0');
    const mes = (fecha.getMonth() + 1).toString().padStart(2, '0');
    const año = fecha.getFullYear();
  
    return `${año}-${mes}-${dia}`;
  }
  
  // Enviar la fecha actual
  const intervalo2 = setInterval(() => {
  
    if (contadorSolicitudes2 < 5) {
      contadorSolicitudes2++;
  
      const fecha = obtenerFechaActual();
  
      xhr2.open('POST', './php/formatearAusencia.php');
      xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr2.send(`fecha=${fecha}`);
  
      xhr2.onload = function() {
        // ...
      };
    } else {
      // Deshabilitar el envío de más solicitudes
      clearInterval(intervalo2);
      console.log('Se ha alcanzado el límite de solicitudes. Se han enviado ' + contadorSolicitudes2 + ' solicitudes.');
    }
  
  }, 1000); // Enviar la fecha cada segundo
}


// registro de ausencias jsutificadas
const currentPageUrlTablaAusencia2 = window.location.href;

if (currentPageUrlTablaAusencia2 === 'http://localhost/comedor/sistema/registro-ausencia.php') {
  
  //ESTA ES PARA LA TABLA DE AUSENCIA 
  const xhr2 = new XMLHttpRequest();
  let contadorSolicitudes2 = 0;
  
  function obtenerFechaActual() {
    const fecha = new Date();
    const dia = fecha.getDate().toString().padStart(2, '0');
    const mes = (fecha.getMonth() + 1).toString().padStart(2, '0');
    const año = fecha.getFullYear();
  
    return `${año}-${mes}-${dia}`;
  }
  
  // Enviar la fecha actual
  const intervalo2 = setInterval(() => {
  
    if (contadorSolicitudes2 < 5) {
      contadorSolicitudes2++;
  
      const fecha = obtenerFechaActual();
  
      xhr2.open('POST', './php/formatearAusencia.php');
      xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr2.send(`fecha=${fecha}`);
  
      xhr2.onload = function() {
        // ...
      };
    } else {
      // Deshabilitar el envío de más solicitudes
      clearInterval(intervalo2);
      console.log('Se ha alcanzado el límite de solicitudes. Se han enviado ' + contadorSolicitudes2 + ' solicitudes.');
    }
  
  }, 1000); // Enviar la fecha cada segundo
}




// actualizar ausencia desde el local login
const currentPageUrlTablaAusencia3 = window.location.href;

if (currentPageUrlTablaAusencia3 === 'http://localhost/comedor/index.php') {
  
  //ESTA ES PARA LA TABLA DE AUSENCIA 
  const xhr2 = new XMLHttpRequest();
  let contadorSolicitudes2 = 0;
  
  function obtenerFechaActual() {
    const fecha = new Date();
    const dia = fecha.getDate().toString().padStart(2, '0');
    const mes = (fecha.getMonth() + 1).toString().padStart(2, '0');
    const año = fecha.getFullYear();
  
    return `${año}-${mes}-${dia}`;
  }
  
  // Enviar la fecha actual
  const intervalo2 = setInterval(() => {
  
    if (contadorSolicitudes2 < 5) {
      contadorSolicitudes2++;
  
      const fecha = obtenerFechaActual();
  
      xhr2.open('POST', './sistema/php/formatearAusencia.php');
      xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr2.send(`fecha=${fecha}`);
  
      xhr2.onload = function() {
        // ...
      };
    } else {
      // Deshabilitar el envío de más solicitudes
      clearInterval(intervalo2);
      console.log('Se ha alcanzado el límite de solicitudes. Se han enviado ' + contadorSolicitudes2 + ' solicitudes.');
    }
  
  }, 1000); // Enviar la fecha cada segundo
}








// actualizar peticion de tickets  desde login
const currentPageUrlTablaAusencia4 = window.location.href;

if (currentPageUrlTablaAusencia4 === 'http://localhost/comedor/index.php') {
  
  //ESTA ES PARA LA TABLA DE AUSENCIA 
  const xhr2 = new XMLHttpRequest();
  let contadorSolicitudes2 = 0;
  
  function obtenerFechaActual() {
    const fecha = new Date();
    const dia = fecha.getDate().toString().padStart(2, '0');
    const mes = (fecha.getMonth() + 1).toString().padStart(2, '0');
    const año = fecha.getFullYear();
  
    return `${año}-${mes}-${dia}`;
  }
  
  // Enviar la fecha actual
  const intervalo2 = setInterval(() => {
  
    if (contadorSolicitudes2 < 5) {
      contadorSolicitudes2++;
  
      const fecha = obtenerFechaActual();
  
      xhr2.open('POST', './sistema/php/formateartickets.php');
      xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr2.send(`fecha=${fecha}`);
  
      xhr2.onload = function() {
        // ...
      };
    } else {
      // Deshabilitar el envío de más solicitudes
      clearInterval(intervalo2);
      console.log('Se ha alcanzado el límite de solicitudes. Se han enviado ' + contadorSolicitudes2 + ' solicitudes.');
    }
  
  }, 1000); // Enviar la fecha cada segundo
}


