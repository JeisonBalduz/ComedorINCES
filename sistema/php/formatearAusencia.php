<?php
require_once './conexion.php';

// Función para comparar fechas
function compararFechas($fechaActual, $fechaFin) {
    if ($fechaFin <= $fechaActual) {
        return true;
    } else {
        return false;
    }
}

// Obtener la fecha actual
$fechaActual = $_POST['fecha'];

// Consultar las fechas de ausencia justificada
$SolicitarFecha = "SELECT * FROM ausencia_justificada a 
INNER JOIN personal p ON a.idpersonal = p.idpersonal 
ORDER BY a.fecha_fin = '$fechaActual'" ;

try {
    $resultadoFecha = mysqli_query($conexion, $SolicitarFecha);
    if (!$resultadoFecha) {
        throw new Exception("Error en la consulta: " . mysqli_error($conexion));
    }

    // Recorrer las fechas y compararlas con la fecha actual
    while ($fila = mysqli_fetch_assoc($resultadoFecha)) {
        $fechaFin = $fila['fecha_fin'];
        if (compararFechas($fechaActual, $fechaFin)) {
            echo "<br>";
            echo "<strong>Se ha encontrado una coincidencia con la fecha de ausencia justificada.</strong>";
            echo "<br>Nombre del usuario de ausencia :".$fila['nombre'];
            echo "<br>Fecha fin: " . $fila['fecha_fin'];
            echo "<br>Fecha actual: " . $fechaActual;
            echo "<br>";
            echo "------------------------------------------------------------------------------------------";

                  try{// Preparar la consulta (sin alias)
                  $sqlRestaurar = "DELETE FROM ausencia_justificada 
                  WHERE fecha_fin <= '$fechaActual'";

                  // Ejecutar la consulta
                  $resultadoFecha2 = mysqli_query($conexion, $sqlRestaurar);

                  if (!$resultadoFecha2) {
                    throw new Exception("Error al eliminar ausencias: " . mysqli_error($conexion));
                  }

                  // Mostrar mensaje de éxito
                  echo "Ausencias justificadas con fecha fin menor o igual a '$fechaActual' eliminadas correctamente.";

                } catch (Exception $e) {
                  // Mostrar mensaje de error
                  echo "Error: " . $e->getMessage();
                } finally {
                  // Cerrar la conexión a la base de datos
                  mysqli_close($conexion);

                  }
                   
        } else {
          echo "<br>";
          echo "<strong>No se ha encontrado una coincidencia con la fecha de ausencia justificada.</strong>";
          echo "<br>Nombre del usuario de ausencia :".$fila['nombre'];
          echo "<br>Fecha fin: " . $fila['fecha_fin'];
          echo "<br>Fecha actual: " . $fechaActual;
          echo "<br>";
          echo "------------------------------------------------------------------------------------------";
        }
    }
} catch (Exception $e) {
    echo "<br>**Error:** " . $e->getMessage();
} finally {
    if (isset($resultadoFecha)) {
        mysqli_free_result($resultadoFecha);
    }
}
?>