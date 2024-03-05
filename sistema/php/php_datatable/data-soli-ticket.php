<?php
// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inces2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Validar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener el número total de registros en la base de datos
$sql = "SELECT COUNT(idcomer) as count FROM pedir_comida ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalRecords = $row['count'];

// Obtener la información necesaria para DataTables
$draw = $_REQUEST['draw'];
$start = $_REQUEST['start'];
$length = $_REQUEST['length'];
$searchValue = $_REQUEST['search']['value'];

// Consulta SQL para obtener los registros que coinciden con la búsqueda y la paginación
$sql = "SELECT * FROM pedir_comida 
INNER JOIN personal ON pedir_comida.idpersonal = personal.idpersonal
INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE (idcomer like
 '%$searchValue%' or nombre like '%$searchValue%' or apellido like '%$searchValue%'
 or cedula like '%$searchValue%' or sede like '%$searchValue%' ) 
 ORDER BY idcomer ASC LIMIT $start, $length

";
$result = $conn->query($sql);

// Construir el array de datos para DataTables
// href="edit.php?id='.$row['idpersonal'].'"
$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = array(
        "idpersonal" => $row['idcomer'],
        "nombre" => $row['nombre'],
        "apellido" => $row['apellido'],
        "cedula" => $row['cedula'],
        "sede" => $row['sede'],
        "actions" => ' 
        <div class=" d-flex container-fluid justify-content-center">
        <button class="boton-verde cambiar pt-1 pb-1 me-2" id="cambiar">Cambiar</button>
        
        </div> 
        '
    );
}
/* boton de eliminar por si es requerido */
/*<button class="boton-eliminar pt-1 pb-1 me-2"
        type="button"  name="actualizar" data-bs-toggle="modal" data-bs-target="#eliminarModal">Eliminar
</button>*/
// Devolver la respuesta a DataTables
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecords,
    "aaData" => $data
);
echo json_encode($response);
?>