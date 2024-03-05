<!-- MODAL DE EDITAR -->

<!-- Modal -->
<div class="modal fade" id="tablaInvitados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-white">
        <h5 class="modal-title text-black" id="exampleModalLabel">Tabla de invitados </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered mt-5" id="myTable-invitados">
          <thead class="thead-dark">
            <tr>  
              
              <th class="pe-5">NOMBRE</th>
              <th class="pe-5">APELLIDO</th>
              <th>DEPENDENCIA</th>
              <th>ESTATUS</th>
              <th>COMIDA</th>
              <th>FECHA</th>
            
              
            </tr>
          </thead>
          <tbody>
                    <?php
                include "php/conexion.php";
                  $sql = $conexion -> query ("SELECT * FROM perticket
                    order by idticket");
                  while ($row = $sql->fetch_assoc()) {
                    ?>
                      <tr>
                          <th style="color: #858796;" scope="row"><?php echo $row['nombre']?></th>
                          <th style="color: #858796;" scope="row"><?php echo $row['apellido']?></th>
                          <th style="color: #858796;" scope="row"><?php echo $row['sede']?></th>
                          <th style="color: #858796;" scope="row"><?php echo $row['estatus']?></th>
                          <th style="color: #858796;" scope="row"><?php echo $row['comida']?></th>
                          <th style="color: #858796;" scope="row"><?php echo $row['fecha']?></th>

                        </tr>
                       
                       
                    <?php
                    
                  }
                ?>
          </tbody>

        </table>
          <section class="d-flex">
            <div class="mt-2 me-3">
              <a href="php/reportes/reporte-tabla-ticketG.php"><button class="boton-alerts-rojo"><img src="icons/pdf.png" alt="" class="me-3">PDF</button></a>
            </div>
            <!--
            <div class="mt-2">
              <a href="php/reportes/excel/reporte-excel-usaurio.php"><button class="boton-alerts-verde"><img src="icons/sobresalir.png" alt="" class="me-3">EXCEL</button></a>
            </div>-->
          </section>
      </div>
    </div>
  </div>
</div>
     
<script type="text/javascript">

//datos de datatable

const DataTableOption = {
    lengthMenu: [2, 5, 10, 15],
    
    pageLength: 7,
    language: {
            url: 'js/datatable/es-ES.json'
        }
}
$(document).ready(function() {
    $('#myTable-invitados').DataTable(DataTableOption)({
        
    });
});

</script> 
  