$(document).on("click", "#boton-permisos", function () {
  var table = document.getElementById("myTableModalPermisos"); // capturar id de la tabla
  var fila;

  fila = $(this).closest("tr"); // Capturar table row de la tabla
  id = parseInt(fila.find("td:eq(0)").text());
  console.log(id);
  console.log(fila);

  window.open("./eliminar/eliminar-permiso.php?permisos=" + id);
});

const limpiar = document.getElemetById("limpiar");
limpiar.addEventListener("click", function(){
 console.log("hola");
});