<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
</head>
<body>
    
<?php
include('../conexion.php');
date_default_timezone_set("America/Caracas");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "ReporteExcel_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


$sql = ("SELECT * FROM usuario INNER JOIN rol ON usuario.idrol = rol.idrol");
$usuarios = mysqli_query($conexion, $sql);

        ?>


        <table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
        <thead>
            <tr style="background: #D0CDCD;">
            <th>#</th>
            <th>Usuario</th>
            <th>CONTRASEÑA</th>
            <th>NOMBRE</th>
            <th>CEDULA</th>
            <th>ROL</th>
            <th>FECHA Y HORA</th>
            </tr>
        </thead>
        <?php
    $i =1;
        while ($user = mysqli_fetch_array($usuarios)) { ?>
        <tbody>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $user['usuario']; ?></td>
                <td><?php echo $user['contraseña']; ?></td>
                <td><?php echo $user['nombre'] ; ?></td>
                <td><?php echo $user['cedula'] ; ?></td>
                <td><?php echo $user['rol'] ; ?></td>
                <td><?php echo $user['fecha'].'-'.$user['hora'] ; ?></td>
                
            </tr>
        </tbody>
        
    <?php 

    } 
?>
</table>

</body>
</html>