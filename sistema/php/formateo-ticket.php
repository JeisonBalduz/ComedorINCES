<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inces2";

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Definir la consulta SQL para borrar todos los registros de la tabla "usuarios"
$sql = "DELETE FROM ticket";

// Ejecutar la consulta para borrar los datos de la tabla
if (mysqli_query($conn, $sql)) {
    echo "Los datos han sido borrados correctamente.";
} else {
    echo "Error al borrar los datos: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
