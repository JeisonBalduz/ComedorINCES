$(function buscar_datos(){
    $('#guardar').hide();
    $('#agregar').hide();
    $('#enviar_usuario').hide();
    $('#contenedor_usuario').hide();
    $('#contenedor_contraseña').hide();
    $('#contenedor_roles').hide();

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
        title: 'Personal no encontrado!',
        icon: 'error',
        allowOutsideClick: false,
        allowEnterKey: false,
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
        allowOutsideClick: false,
        allowEnterKey: false,
        confirmButtonText: false,
        showConfirmButton: false,
        timer: 1500
      })  
        
        
        if(valores.existe=="1") 
        {
          $("#nombre").val(valores.nombre);
       
          // agregar boton para generar el ticket 
            $('#guardar').show();
            $('#agregar').show();
            $('#enviar_usuario').show();


        // aparecer los input para crear los usuarios
       
        $('#contenedor_usuario').show();
        $('#contenedor_contraseña').show();
        $('#contenedor_roles').show();    
        }
        // personal no encontrado en la base de datos 
        else
        {
          $("#cedula").val("");
          Swal.fire({
            title: 'Este personal no existe en nuestra base de datos ',
            icon: 'error',
            allowOutsideClick: false,
            allowEnterKey: false,
            confirmButtonText: false,
            showConfirmButton: false,
            timer: 4800
          })  
        }

      }
    }) 
  }

