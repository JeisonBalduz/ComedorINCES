<?php
$host = "localhost";
$usuario = "root";
$password = "";
$nombreDeBaseDeDatos = "inces2";

function exportarDb($host, $usuario, $password, $nombreDeBaseDeDatos)
{
    set_time_limit(3000);
    $mysqli = new mysqli($host, $usuario, $password, $nombreDeBaseDeDatos);
    $mysqli->select_db($nombreDeBaseDeDatos);
    $mysqli->query("SET NAMES 'utf8'");

    $tablas = $mysqli->query('SHOW TABLES');
    $contenido = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n";
    
    while ($fila = $tablas->fetch_row()) {
        $nombreDeLaTabla = $fila[0];
        if (empty($nombreDeLaTabla)) {
            continue;
        }
        $datosQueContieneLaTabla = $mysqli->query('SELECT * FROM `' . $nombreDeLaTabla . '`');
        $cantidadDeCampos = $datosQueContieneLaTabla->field_count;
        $cantidadDeFilas = $datosQueContieneLaTabla->num_rows;
        $esquemaDeTabla = $mysqli->query('SHOW CREATE TABLE `' . $nombreDeLaTabla . '`');
        $filaDeTabla = $esquemaDeTabla->fetch_row();
        $contenido .= "\n\n" . $filaDeTabla[1] . ";\n\n";
        
        if ($cantidadDeFilas > 0) {
            $valores = array();
            while ($fila = $datosQueContieneLaTabla->fetch_row()) {
                $valoresFila = array();
                for ($j = 0; $j < $cantidadDeCampos; $j++) {
                    $fila[$j] = str_replace("\n", "\\n", mysqli_real_escape_string($mysqli, $fila[$j]));
                    if (isset($fila[$j])) {
                        $valoresFila[] = '"' . $fila[$j] . '"';
                    } else {
                        $valoresFila[] = '""';
                    }
                }
                $valores[] = '(' . implode(',', $valoresFila) . ')';
            }
            $contenido .= "INSERT INTO `" . $nombreDeLaTabla . "` VALUES\n" . implode(",\n", $valores) . ";\n\n";
        }
    }
    $contenido .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
   $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/respaldos"; // Ruta de la carpeta de respaldos en htdocs
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    $fechaDelDia = date("Y-m-d");
    $nombreDelArchivo = sprintf('%s/inces22%s.sql', $carpeta, $fechaDelDia);

    $archivo = fopen($nombreDelArchivo, 'w');
    fwrite($archivo, $contenido);
    fclose($archivo);

    // Descargar el archivo al navegador
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($nombreDelArchivo));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($nombreDelArchivo));
    readfile($nombreDelArchivo);
    exit;
}

exportarDb($host, $usuario, $password, $nombreDeBaseDeDatos);
