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
$sql = "SELECT COUNT(idpermisos_aj) as count FROM permisos WHERE idpermisos_aj ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalRecords = $row['count'];

// Obtener la información necesaria para DataTables
$draw = $_REQUEST['draw'];
$start = $_REQUEST['start'];
$length = $_REQUEST['length'];
$searchValue = $_REQUEST['search']['value'];

// Consulta SQL para obtener los registros que coinciden con la búsqueda y la paginación
$sql = "SELECT * FROM permisos WHERE (idpermisos_aj like '%$searchValue%' or permisos
like '%$searchValue%') ORDER BY  idpermisos_aj  ASC LIMIT $start, $length";
$result = $conn->query($sql);

// Construir el array de datos para DataTables
// href="edit.php?id='.$row['idpersonal'].'"
$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = array(
        "idpermisos" => $row['idpermisos_aj'],
        "permisos" => $row['permisos'],
        "actions" => ' <button class="boton-eliminar pt-1 pb-1 me-2"
        type="button" id="boton-permisos" name="actualizar"><img src="icons/eliminar.png"
        </button> 
        <button class="boton-actualizar pt-1 pb-1" id="actualizar-editar-permiso" ><img src="icons/boligrafo.png"</button>'
    
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