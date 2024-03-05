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
$sql = "SELECT COUNT(idestatus) as count FROM estatus ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalRecords = $row['count'];

// Obtener la información necesaria para DataTables
$draw = $_REQUEST['draw'];
$start = $_REQUEST['start'];
$length = $_REQUEST['length'];
$searchValue = $_REQUEST['search']['value'];

// Consulta SQL para obtener los registros que coinciden con la búsqueda y la paginación
$sql = "SELECT * FROM estatus WHERE (idestatus like
 '%$searchValue%' or estatus_fecha like '%$searchValue%' or estatus like '%$searchValue%' ) 
 AND estado_estatus = '1' ORDER BY idestatus ASC LIMIT $start, $length";
$result = $conn->query($sql);

// Construir el array de datos para DataTables
// href="edit.php?id='.$row['idpersonal'].'"
$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = array(
        "idestatus" => $row['idestatus'],
        "estatus" => $row['estatus'],
        "actions" => ' <button class="button-eliminar pt-1 pb-1 me-2"
        type="button" name="actualizar" data-bs-toggle="modal" data-bs-target="#eliminarModal"><img src="icons/eliminar.png"
        </button> 
        <button class="button-actualizar pt-1 pb-1" id="actualizar-editar"><img src="icons/boligrafo.png"</button>'
    
    );
}

// Devolver la respuesta a DataTables
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecords,
    "aaData" => $data
);
echo json_encode($response);
?>