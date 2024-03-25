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
$conn->query("SET @autoid := 0");
$conn->query("UPDATE perticket SET idticket = (@autoid := @autoid + 1)");
$conn->query("ALTER TABLE perticket AUTO_INCREMENT = 1");

// Obtener el número total de registros en la base de datos
$sql = "SELECT COUNT(idticket) AS count FROM perticket ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalRecords = $row['count'];

// Obtener la información necesaria para DataTables
$draw = $_REQUEST['draw'];
$start = $_REQUEST['start'];
$length = $_REQUEST['length'];
$searchValue = $_REQUEST['search']['value'];

// Consulta SQL para obtener los registros que coinciden con la búsqueda y la paginación
$sql = "SELECT *, perticket.hora AS hora_ticket, DATE_FORMAT(perticket.fecha, '%d-%m-%Y') AS fecha_ticket
FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal
 INNER JOIN sedes ON personal.idsede = sedes.idsede INNER JOIN estatus ON personal.idestatus
 = estatus.idestatus  WHERE (
personal.idpersonal like '%$searchValue%' or 
personal.nombre like '%$searchValue%' or  
personal.apellido like '%$searchValue%' or 
perticket.comida like '%$searchValue%' or
perticket.fecha like '%$searchValue%' or  
perticket.hora like '%$searchValue%' )  ORDER BY idticket ASC LIMIT $start, $length";
$result = $conn->query($sql);

// Construir el array de datos para DataTables
// href="edit.php?id='.$row['idpersonal'].'"
$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = array(
      
        "nombre" => $row['nombre'],
        "apellido" => $row['apellido'],
        "cedula" => $row['cedula'],
        "estatus" => $row['estatus'],
        "sede" => $row['sede'],
        "comida" => $row['comida'], 
        "fecha" => $row['fecha_ticket'],
        "hora" => $row['hora_ticket']
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