


  $("#cerrrar").hide();
  $("#genen_cerrar2").hide();

  //APARECER CIERRE DE TICKETS
  const aparecer_cerrar = document.getElementById('genen_cerrar');
  aparecer_cerrar.addEventListener('click', function(){
    $("#cerrrar").show();
    $("#genen_cerrar2").show();
    $("#genen_cerrar").hide();
  })
  
  //CERRAR CIERRE DE TICKETS
  const aparecer_cerrar2 = document.getElementById('genen_cerrar2');
  aparecer_cerrar2.addEventListener('click', function(){
    $("#cerrrar").hide();
    $("#genen_cerrar2").hide();
    $("#genen_cerrar").show();
  })
  
  //////
  
  var limpiar_datos = document.getElementById("limpiar");
  limpiar_datos.addEventListener("click", function(){
    $("#cedula").val("");
    $("#nombre").val("");
    $("#apellido").val("");
    $("#sede").val("");
    $("#estatus").val("");
    $("#fecha-f").val("");
  
  })
  
    //datos de datatable
  const DataTableOption = {
      lengthMenu: [5, 10, 15],
      language: {
              url: 'js/datatable/es-ES.json'
          }
  }
  $(document).ready(function() {
      $('#myTable').DataTable(DataTableOption)({
          
      });
  });