

    //// FUNCION DE BUSCAR DATOS 
// funcion para borrar los datos de los compos
$(function buscar_datos(){
    $('#guardar').hide();
    $('#agregar').hide();
    $('#generar').hide();
    $('#limpiar').hide();
    $('#act-soli').hide();
    $('#enviar_usuario').hide();
    $('#contenedor_usuario').hide();
    $('#contenedor_contraseña').hide();
    $('#contenedor_roles').hide();
   // $('#contenedor_identificador').hide();

  });

function buscar_datos()
  {
    // Dato de busqueda en la base de datos personal 
    cedula = $("#cedula").val();
    
    var parametros = 
    {
      "buscar": "1",
      "cedula" : cedula
    };

    ///peticion en ajaxx 
    $.ajax(
    {
      data:  parametros,
      dataType: 'json',
      url:   'buscar.php',
      type:  'post',
      beforeSend: function() 
      {
        /*
        $('.formulario').hide();
        $('#tabla').hide();
        $('#productos').hide();
        */
        
      },
      //error busqueda del personal no encontrada
      error: function()
      
      {
        
        Swal.fire({
        title: 'Persona no encontrada!',
        icon: 'error',
        confirmButtonText: false,
        showConfirmButton: false,
        timer: 1500
        
      })  
     

      },
      // al completarse las funciones sea de error a de peticion se ba a ejecutar esta funcion 
      complete: function() 
      {
        $('.formulario').show();
        $('#tabla').show();
        $('#productos').show();
        
        
      },

      // incorporar datos  buscados en php para incorporarlos en los inputs
      success:  function (valores) 
      {
        Swal.fire({
        title: 'Persona encontrada!',
        icon: 'success',
        confirmButtonText: false,
        showConfirmButton: false,
        timer: 1500
      })  
        
        
        if(valores.existe=="1") //Aqui usamos la variable que NO use en el vídeo
        {
          $("#identificador").val(valores.idpersonal);
          $("#nombre").val(valores.nombre);
          $("#apellido").val(valores.apellido);
          $("#sede").val(valores.sede);
          $("#estatus").val(valores.estatus);

          // agregar boton para generar el ticket 
          $('#agregar').show();
          $('#generar').show();
          $('#limpiar').show();

          //usuario
          $('#enviar_usuario').show();


          // aparecer los input para crear los usuarios
         
          $('#contenedor_usuario').show();
          $('#contenedor_contraseña').show();
          $('#contenedor_roles').show();
          
          //actualizar de solicitud de comida
          $('#act-soli').show();
          
        }
        // personal no encontrado en la base de datos 
        else
        {
          $("#cedula").val("");
          Swal.fire({
            title: 'Esta persona no existe en nuestra base de datos ',
            icon: 'error',
            confirmButtonText: false,
            showConfirmButton: false,
            timer: 4800
          })  
        }

      }
    }) 
  }
 

//////////////////////////////////////////


/// GENERAR LOS REPORTES Y QUE SEACTIVEN LOS FORMULARIOS DE ENVIO 
$(function (){

    //formulario de reporte general
      $('#reporte').click(function(){
        $(this).next('#general-reporte').slideToggle();
        $(this).toggleClass('active');
        
      });
    //formulario de reporte dependencia  
      $('#reporte2').click(function(){
        $(this).next('#general-reporte').slideToggle();
        $(this).toggleClass('active');
      });
    //formulario de reporte consolidado  
      $('#reporte3').click(function(){
        $(this).next('#general-reporte').slideToggle();
        $(this).toggleClass('active');
      });
    //formulario de reporte ausencia justificada  
      $('#reporte4').click(function(){
        $(this).next('#general-reporte').slideToggle();
        $(this).toggleClass('active');
      });
      
/*
      //formulario para aparecer sede del reporte consolidado
      $('#checkbox').click(function(){
      $(this).next('#sede_checkbox').slideToggle();
      $(this).toggleClass('active');

      });
        */
      $('#sede').click(function(){
       
        $(this).setAttribute('disabled','false');
      });
        
          document.getElementById("checkbox").addEventListener("click", moverinces);

          var cuadra = document.getElementById("sede");

          function moverinces(){

            document.getElementById("sede").Disabled = false
          
        }
        

    });
  
  // envio de datos apra el reporte general
  function generarPDF(){
      var desde = $('#desde').val();
      var hasta = $('#hasta').val();
      window.open('php/reportes/reporte-general.php?desde='+desde+'&hasta='+hasta);
      console.log('Se genero el reporte general correctamente');
    }
  
  // envios de datos apra el reporte consolidado
  function generarPDF_consolidado(){
      var sede = $('#sede').val();
      var desde2 = $('#desde2').val();
      var hasta2= $('#hasta2').val();
      //dia de la semana 
      var lunes = $('#lunes').val();
      var martes = $('#martes').val();
      var miercoles = $('#miercoles').val();
      var jueves = $('#jueves').val();
      var viernes = $('#viernes').val();
      var sabado = $('#sabado').val();
      var domingo = $('#domingo').val();
      
    window.open('php/reportes/reporte-consolidado.php?desde2='+desde2+'&hasta2='+hasta2+'&sede='+sede+'&lunes='+lunes+'&martes='+martes+'&miercoles='+miercoles+'&jueves='+jueves+'&viernes='+viernes+'&sabado='+sabado+'&domingo='+domingo);
    console.log('Se genero el reporte consolidado correctamente');
  }
  
  //envios de datos apra el reporte estadistico 
  function generarPDF_dependencia(){
      var sede2 = $('#sede2').val();
      var desde3 = $('#desde3').val();
      var hasta3= $('#hasta3').val();
    window.open('php/reportes/reporte-dependencia.php?desde3='+desde3+'&hasta3='+hasta3+'&sede2='+sede2);
    console.log('Se genero el reporte de la dependencia correctamente');
  }
  
  
  //envios de datos apra el reporte ausencia justificada 
  function generarPDF_ausencia_justificada(){
      var sede2 = $('#sede2').val();
      var desde4 = $('#desde4').val();
      var hasta4= $('#hasta4').val();
    window.open('php/reportes/reporte-AJ.php?desde4='+desde4+'&hasta4='+hasta4);
    console.log('Se genero el reporte de la ausencia justificada de manera correctamente');
  }

  
  //generar reporte de la comida del dia 
 

  
// confirma para eliminar dato de una tabla 
function confirmacion(e){
	if (confirm("¿Está seguro de eliminar este registro?")) {
		return true;
	}
	else{
		e.preventDefault();
	}
}

let linkDelete = document.querySelectorAll("#boto");

for (var i = 0; i < linkDelete.length; i++){
	linkDelete[i].addEventListener('click', confirmacion);
}


///// funciones de letras y numeros 
     function SoloNumeros(e){
        var x = e.which || e.keycode;
        if((x >= 48 && x <=57))
        return true;
        else
        return false;
    }

    function soloLetras(e){
      var key = e.keyCode || e.which;
      var tecla = String.fromCharCode(key).toLowerCase();
      var letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.,;:";
      var especiales = "8-37-39-44-46";

      var tecla_especial = false;
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }

      if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
      }

      // Capitalizar la primera letra de cada palabra después de un espacio
      var texto = e.target.value;
      var palabras = texto.split(" ");
      for (var i = 0; i < palabras.length; i++) {
        palabras[i] = palabras[i].charAt(0).toUpperCase() + palabras[i].slice(1);
      }
      e.target.value = palabras.join(" ");
    }


    /////////////////////

var contraseña = document.getElementById('contraseña');
var input = document.getElementById('input-contraseña');
contraseña.addEventListener("click", function(){
        if (input.type == "password") {
            input.type = "text";
          
        }else{
            input.type = "password";
           
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

