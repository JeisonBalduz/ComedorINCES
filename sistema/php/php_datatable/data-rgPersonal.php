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
$sql = "SELECT COUNT(idpersonal) as count FROM personal WHERE activo='1'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalRecords = $row['count'];

// Obtener la información necesaria para DataTables
$draw = $_REQUEST['draw'];
$start = $_REQUEST['start'];
$length = $_REQUEST['length'];
$searchValue = $_REQUEST['search']['value'];

// Consulta SQL para obtener los registros que coinciden con la búsqueda y la paginación
$sql = "SELECT *, correo FROM personal INNER JOIN sedes ON personal.idsede = sedes.idsede
INNER JOIN estatus ON personal.idestatus= estatus.idestatus WHERE (idpersonal like
 '%$searchValue%' or nombre like '%$searchValue%' or apellido like '%$searchValue%'
 or cedula like '%$searchValue%' or sede like '%$searchValue%' or estatus like 
 '%$searchValue%' or correo like '%$searchValue%' ) AND activo = '1' ORDER BY idpersonal ASC LIMIT $start, $length";
$result = $conn->query($sql);

// Construir el array de datos para DataTables
// href="edit.php?id='.$row['idpersonal'].'"
$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = array(
        "idpersonal" => $row['idpersonal'],
        "nombre" => $row['nombre'],
        "apellido" => $row['apellido'],
        "cedula" => $row['cedula'],
        "correo" => $row['correo'],
        "sede" => $row['sede'],
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