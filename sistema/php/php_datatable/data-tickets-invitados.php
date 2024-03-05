<?php
date_default_timezone_set("America/Caracas");
$fechaActual = date("Y-m-d");
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
$sql = "SELECT COUNT(idinvitados) as count FROM invitados ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalRecords = $row['count'];

// Obtener la información necesaria para DataTables
$draw = $_REQUEST['draw'];
$start = $_REQUEST['start'];
$length = $_REQUEST['length'];
$searchValue = $_REQUEST['search']['value'];

// Consulta SQL para obtener los registros que coinciden con la búsqueda y la paginación
$sql = "SELECT * FROM invitados  WHERE (
invitados.idinvitados like '%$searchValue%' or 
invitados.nombre_invi like '%$searchValue%' or  
invitados.apellido_invi like '%$searchValue%' or 
invitados.cedula_invi like '%$searchValue%' or
invitados.sede_inivitado like '%$searchValue%' or  
invitados.estatus_invitado like '%$searchValue%' ) 
ORDER BY idinvitados ASC LIMIT $start, $length";
$result = $conn->query($sql);

// Construir el array de datos para DataTables
// href="edit.php?id='.$row['idpersonal'].'"
$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = array(
      
        "nombre" => $row['nombre_invi'],
        "apellido" => $row['apellido_invi'],
        "cedula" => $row['cedula_invi'],
        "estatus" => $row['estatus_invitado'],
        "sede" => $row['sede_inivitado'],
        "comida" => $row['comida_invitado'], 
        "fecha" => $row['fecha_inv'],
        "hora" => $row['hora_inv']
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