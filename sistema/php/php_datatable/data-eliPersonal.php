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
$sql = "SELECT COUNT(ideliminado) as count FROM personal_eliminado ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalRecords = $row['count'];

// Obtener la información necesaria para DataTables
$draw = $_REQUEST['draw'];
$start = $_REQUEST['start'];
$length = $_REQUEST['length'];
$searchValue = $_REQUEST['search']['value'];

// Consulta SQL para obtener los registros que coinciden con la búsqueda y la paginación
$sql = "SELECT *, personal.nombre AS nombrePersonal, usuario.nombre AS usuarioNombre
 FROM personal_eliminado INNER JOIN personal ON personal_eliminado.idpersonal = personal.idpersonal
 INNER JOIN sedes ON personal.idsede = sedes.idsede INNER JOIN estatus ON personal.idestatus
 = estatus.idestatus INNER JOIN usuario ON personal.id_usuario = usuario.idusuario
WHERE (personal.idpersonal like '%$searchValue%')ORDER BY ideliminado ASC LIMIT $start, $length";
$result = $conn->query($sql);

// Construir el array de datos para DataTables
// href="edit.php?id='.$row['idpersonal'].'"
$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = array(
        "idpersonal" => $row['idpersonal'],
        "nombre" => $row['nombrePersonal'],
        "apellido" => $row['apellido'],
        "cedula" => $row['cedula'],
        "sede" => $row['sede'],
        "estatus" => $row['estatus'],
        "fecha_hora" => $row['fecha_eli'],
        "hora_eli" => $row['hora_eli'],
        "usuario_eli" => $row['usuario'],
        "cedula_usuario_eli" => $row['cedula_usuario'],
        "actions" => ' <button class="boton-habilita"
        type="button" name="actualizar">Habilitar
        </button> '
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