<?php

//DATOS DE CONEXCION CON EL SERVIDOR DE LA BASE DE DATOS
$host = "localhost"; // Nombre de host de la base de datos
$usuario = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$nombreDeBaseDeDatos = "inces2"; // Nombre de la base de datos

// Función para exportar la base de datos
function exportarDb($host, $usuario, $password, $nombreDeBaseDeDatos)
{
    set_time_limit(3000);// Establece el límite de tiempo de ejecución del script en segundos
    $mysqli = new mysqli($host, $usuario, $password, $nombreDeBaseDeDatos); // Conexión a la base de datos
    $mysqli->select_db($nombreDeBaseDeDatos);
    // Establece el juego de caracteres a UTF-8 para evitar problemas de codificación
    $mysqli->query("SET NAMES 'utf8'");

    $tablas = $mysqli->query('SHOW TABLES');// Obtiene una lista de todas las tablas de la base de datos
    $contenido = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n";

    // Tablas que se exportarán en un orden específico 
    $tablaOrden = array(
        'rol', 'usuario', 'estatus', 'sedes_codigo', 'estados', 'sedes',  'personal',
        'personal_eliminado','permisos','ausencia_justificada' 
    );

    // Recorrer las tablas en el orden especificado
    foreach ($tablaOrden as $nombreDeLaTabla) {
        // Obtener los datos de la tabla
        $datosQueContieneLaTabla = $mysqli->query('SELECT * FROM `' . $nombreDeLaTabla . '`');
        $cantidadDeCampos = $datosQueContieneLaTabla->field_count;
        $cantidadDeFilas = $datosQueContieneLaTabla->num_rows;
         //Crear formato de creacion de tabla
        $esquemaDeTabla = $mysqli->query('SHOW CREATE TABLE `' . $nombreDeLaTabla . '`');
        $filaDeTabla = $esquemaDeTabla->fetch_row();//Obtener filas de las tablas
        $contenido .= "\n\n" . $filaDeTabla[1] . ";\n\n";//Meter dentro de una variable todas las filas de la tabla

        //Verificacion de datos dentro de las tablas
        if ($cantidadDeFilas > 0) {
            $valores = array();
            while ($fila = $datosQueContieneLaTabla->fetch_row()) {
                $valoresFila = array();
                for ($j = 0; $j < $cantidadDeCampos; $j++) {
                    $fila[$j] = str_replace("\n", "\\n", mysqli_real_escape_string($mysqli, $fila[$j]));
                    if (isset($fila[$j])) {
                        /* Escapa los caracteres especiales y las comillas simples 
                        para evitar problemas de inserción en la consulta SQL*/
                        $valoresFila[] = '"' . $fila[$j] . '"';
                    } else {
                        $valoresFila[] = '""';
                    }
                }
                $valores[] = '(' . implode(',', $valoresFila) . ')';
            }
            //Pasar a esta varible el contenido de las tablas y ponerlas en un formato de INSERT
            $contenido .= "INSERT INTO `" . $nombreDeLaTabla . "` VALUES\n" . implode(",\n", $valores) . ";\n\n";
        }
    }

    // Recorrer las demás tablas en orden alfabético
    while ($fila = $tablas->fetch_row()) {
        $nombreDeLaTabla = $fila[0];
        // Saltar las tablas que ya se exportaron en el orden específico
        if (empty($nombreDeLaTabla) || in_array($nombreDeLaTabla, $tablaOrden)) {
            continue;
        }
        //Obtener los datos que contienen las tablas 
        $datosQueContieneLaTabla = $mysqli->query('SELECT * FROM `' . $nombreDeLaTabla . '`');
        $cantidadDeCampos = $datosQueContieneLaTabla->field_count;
        $cantidadDeFilas = $datosQueContieneLaTabla->num_rows;
        $esquemaDeTabla = $mysqli->query('SHOW CREATE TABLE `' . $nombreDeLaTabla . '`');
        $filaDeTabla = $esquemaDeTabla->fetch_row();
        $contenido .= "\n\n" . $filaDeTabla[1] . ";\n\n";
 
        //Validamos los filas 
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
                $valores[] = '(' . implode(',', $valoresFila) . ')';//Guardamos valores
            }
            $contenido .= "INSERT INTO `" . $nombreDeLaTabla . "` VALUES\n" . implode(",\n", $valores) . ";\n\n";
        }
    }
    
    //Detectamos parametros del servidor para descargar el archivo en una ruta predetermida
    $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/respaldos"; // Ruta de la carpetade respaldos en htdocs
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);//Validamos los datos obtenidos por esa varible 
    }

    $fechaDelDia = date("Y-m-d");//Obtenemos las fechas del equipo
    $nombreDelArchivo = sprintf('%s/inces22%s.sql', $carpeta, $fechaDelDia);//Nombre del archivo como se descarga
    //Formato de descarga por la web
    $archivo = fopen($nombreDelArchivo, 'w');
    fwrite($archivo, $contenido);//Incorporar el contenido dentro del archivo 
    fclose($archivo);//Obtenemos total del archivo 

    // Descargar el archivo al navegador
    //Parametros para descargar contenido en la web 
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
//Exportamos todo el archivo 
exportarDb($host, $usuario, $password, $nombreDeBaseDeDatos);

header("../principal.php");