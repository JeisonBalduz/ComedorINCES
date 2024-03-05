
<!------------------------------------------------------------------------------------------------------>
<!-- MODAL DE ELIMINAR -->

<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header  bg-danger text-white">
        <h5 class="modal-title text-white" id="exampleModalLabel">¿ Estas seguro de eliminar estos datos?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="./eliminar/eliminar-registro.php" method="GET">
        <div class="input-group " id="identificador-eliminar">
            <label class="mt-3" for="">Identificador</label>
            <span class="input-group-text" id="basic-addon1"><img src="icons/carpeta.png" alt=""></span>
            <input class="modal-input form-control" id="idper" type="text" name="idper" readonly><br>
        </div>

        <div class="mt-3 input-group  ">
            <label class="" for="">Nombre</label>
            <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
            <input class="modal-input form-control" id="nombre"  name="nombre" type="text" readonly><br>
        </div>

        <div class="mt-3 input-group  ">
            <label class="" for="">Apellido</label>
            <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
            <input class="modal-input form-control" id="apellido" name="apellido" type="text" ><br>
        </div>

        <div class="mt-3 input-group  ">
            <label class="" for="">Cedula</label>
            <span class="input-group-text" ><img src="icons/usuario-usuario.png" alt=""></span>
            <input class="modal-input form-control" id="cedula_per" name="cedula" type="text" ><br>
        </div>
      
        <div class=" mt-3 input-group  ">
            <label class="" for="">Dependencia</label>
            <span class="input-group-text" ><img src="icons/sede-sede.png" alt=""></span>
            <input class="modal-input form-control" id="dependencia_eliminar" name="dependencia" type="text" readonly><br>
        </div>

        <div class="mt-3 input-group  ">
            <label class="" for="">Estatus</label>
            <span class="input-group-text" ><img src="icons/grupo1.png" alt=""></span>
            <input class="modal-input form-control" id="estatus_eliminar" name="estatus2" type="text"  readonly ><br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton-salir" data-bs-dismiss="modal">Salir</button>
        <button  type="button" class="boton-actualizar" id="boton-actualizar">Actualizar</button>
        <input type="submit" id="eliminar" class="boton-eliminar"  value="Si, Eliminar">
        
      </div>
      </form>
    </div>
  </div>
</div>



<script src="js/todo.js"></script>
