<!-- MODAL DE REPORTE-->

<!-- Modal -->
<div class="modal fade" id="NuevoReporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header  text-white">
        <h5 class="modal-title text-black" id="exampleModalLabel">Reportes Invitados </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- REPORTE GENERAL -->
        <button id="reporte" class="contenedor-boton d-flex mt-3  p-3 " >
          <img src="icons/anadir.png" alt="" class="me-3" id="flecha1">
          <h3 class="">Estadistico</h3>
        </button>
          <div id="general-reporte" class="reporte1 container mt-2 mb-2 p-2 ">
            <div class="container d-flex justify-content-center">
              <div class="reporte1_conten" id="reportes">
                <label class="label_reporte mt-2" for="desde">Fecha Inicio</label>
                <input min="2023-02-01" class="form-control  me-3" type="date" name="desde" id="desde" >
                <label class="label_reporte mt-2" for="hasta">Fecha Fin</label>
                <input min="2023-02-01" class="form-control  "type="date" name="hasta" id="hasta" value="<?php echo date("Y"); echo'-'; echo date("m"); echo'-'; echo date("d");?>">
                <button onclick="generar_estadisticoPDF()" class="boton-pdf mt-3">Generar reporte</button>
              </div>
            </div>
          </div>
        <button onclick="generar_general_invitadoPDF()" id="reporte2" class="contenedor-boton d-flex mt-3  p-3 " >
          <img src="icons/anadir.png" alt="" class="me-3" id="flecha1">
          <h3 class="">General</h3>
        </button>
      </div>
    </div>
  </div>
</div>