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
$sql = "SELECT COUNT(idpermiso) as count FROM ausencia_justificada ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalRecords = $row['count'];

// Obtener la información necesaria para DataTables
$draw = $_REQUEST['draw'];
$start = $_REQUEST['start'];
$length = $_REQUEST['length'];
$searchValue = $_REQUEST['search']['value'];

// Consulta SQL para obtener los registros que coinciden con la búsqueda y la paginación
$sql = "SELECT *, DATE_FORMAT(ausencia_justificada.fecha_inicio, '%d-%m-%Y') AS fechaINI, DATE_FORMAT(ausencia_justificada.fecha_fin, '%d-%m-%Y') AS fechafin, DATE_FORMAT(ausencia_justificada.fecha_aj, '%d-%m-%Y') AS fechaAJ FROM ausencia_justificada INNER JOIN personal ON ausencia_justificada.idpersonal = personal.idpersonal
INNER JOIN sedes ON personal.idsede = sedes.idsede 
INNER JOIN permisos ON ausencia_justificada.id_permiso = permisos.idpermisos_aj WHERE ( ausencia_justificada.idpermiso like
 '%$searchValue%' or personal.nombre like '%$searchValue%' or personal.apellido like '%$searchValue%' or
sedes.sede like '%$searchValue% ' or permisos.permisos like '%$searchValue%' or personal.cedula like '%$searchValue%') LIMIT $start, $length";
$result = $conn->query($sql);

// Construir el array de datos para DataTables
// href="edit.php?id='.$row['idpersonal'].'"
$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = array(
        "idpermiso" => $row['idpermiso'],
        "nombre" => $row['nombre'],
        "apellido" => $row['apellido'],
        "cedula" => $row['cedula'],
        "fecha_inicio" => $row['fechaINI'],
        "fecha_fin" => $row['fechafin'],
        "permiso" => $row['permisos'],
        "fecha_aj" => $row['fechaAJ']."  ".$row['hora_aj'],
        "actions" => '
        <button class="boton-verde boton-habilitar " id="">Habilitar</button>
        <button class="boton-actualizar " type="button" name="actualizar" ><img src="icons/boligrafo.png"
        </button> 
        '
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