<?php

date_default_timezone_set("America/Caracas");

$diahoy = date("d-m-Y");
function fecha_espanol_larga()
{
    $fecha_dia = date("d");
    $dia_semana = [
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miércoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sábado",
        "Sunday" => "Domingo"
    ];
    $fecha_final = $dia_semana[date("l")];
    return $fecha_final;
}

if (strlen($_GET['desde']) > 0) {
    $desde = $_GET['desde'];
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!--CSS De Bootstrap-->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/botones.css">
    </head>
    <body>
    
    <script src="../../js/libreriasJS/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../../js/libreriasJS/sweetalert2.all.min.js"></script>
    <!-- JQuery -->
    <script src="../../js/libreriasJS/jquery-3.6.3.min.js"></script>
    </body>
    </html>
        <script type="text/javascript">
            Swal.fire({
                title: 'FALTO COLOCAR LA FECHA INICIO!!',
                icon: 'error',
                confirmButtonText: false,
                showConfirmButton: false,
                footer:'<a href="../../reportes.php" class="boton-eliminar" id="boton-envio">Regresar</a>'
            })
        </script>
    <?php
    exit();
}


if (strlen($_GET['hasta']) > 0) {
    $desde = $_GET['hasta'];
} else {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--CSS De Bootstrap-->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/botones.css">
</head>
<body>

<script src="../../js/libreriasJS/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../js/libreriasJS/sweetalert2.all.min.js"></script>
<!-- JQuery -->
<script src="../../js/libreriasJS/jquery-3.6.3.min.js"></script>
</body>
</html>
    <script type="text/javascript">
        Swal.fire({
            title: 'FALTO COLOCAR LA FECHA FINAL!!',
            icon: 'error',
            confirmButtonText: false,
            showConfirmButton: false,
            footer:'<a href="../../reportes.php" class="boton-eliminar" id="boton-envio">Regresar</a>'
        })
    </script>
<?php
    exit();
}




if (strlen($_GET['desde']) > 0 and strlen($_GET['hasta']) > 0) {

    $desde = $_GET['desde'];
    $hasta = $_GET['hasta'];

    $verDesde = date('d/m/Y', strtotime($desde));
    $verHasta = date('d/m/Y', strtotime($hasta));
    $verHasta2 = $verHasta;

    //conexion a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "inces2");
    $total = current($conexion->query("SELECT COUNT(idticket) FROM perticket WHERE fecha BETWEEN  '$desde' AND '$hasta'   ")->fetch_assoc());

    //Conbsulta SQL para las fechas (desayuno)
    $desayuno = current($conexion->query("SELECT COUNT(idticket) FROM perticket WHERE comida='desayuno' AND fecha BETWEEN '$desde' AND '$hasta' ")->fetch_assoc());

    //Conbsulta SQL para las fechas (Almuerzo)
    $almuerzo = current($conexion->query("SELECT COUNT(idticket) FROM perticket WHERE comida='almuerzo' AND fecha BETWEEN '$desde' AND '$hasta'   ")->fetch_assoc());

    //Conbsulta SQL para las fechas (cena)
    $cena = current($conexion->query("SELECT COUNT(idticket) FROM perticket WHERE comida='cena' AND fecha BETWEEN '$desde' AND '$hasta'   ")->fetch_assoc());

    //$cena = current($conexion ->query("SELECT COUNT(idticket) FROM perticket WHERE comida='cena'AND fecha='$verDesde' AND fecha='$verHasta'  ")->fetch_assoc() );

    require('conexion.php');
    require_once('fpdf/fpdf.php');
    class PDF extends FPDF
    {

        function Header()
        {
            global $verDesde;
            global $verHasta;
            global $verHasta2;
            global $verSede;
            global $diahoy;
            global $total;

            $this->Image('repimg/inces2.0.png', 2, 3, 45);
            $this->Image('repimg/tuerca.png', 160, -20, 60);

            $this->SetY(12);
            $this->SetX(62);
            $this->SetFont('Arial', 'B', 9);


            $this->Cell(50, 8, 'REPORTE DE SOLICITUD DE COMIDA POR PERSONAL', 0, 1);

            // fecha en que se ahcen las peticiones
            $this->SetY(12);
            $this->SetX(182);
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(50, 8, utf8_decode('Día:') . " " . utf8_decode(fecha_espanol_larga()), 0, 1);

            $this->SetXY(182, 17);

            $this->Cell(50, 8, utf8_decode('Fecha: ') . $diahoy, 0, 1);

            $this->SetXY(182, 22);
            $this->Cell(50, 8, utf8_decode('Estado: Aragua'), 0, 1);

            $this->SetXY(182, 27);
            $this->Cell(50, 8, utf8_decode('Personal:') . " " . $total, 0, 1);

            $this->SetXY(5, 35);
            $this->Cell(50, 8, utf8_decode('COMEDOR: ______________________________________________'), 0, 1);


            $this->SetXY(5, 42);
            $this->Cell(50, 8, utf8_decode('RESPONSABLE: __________________________________________'), 0, 1);


            $this->SetXY(5, 49);
            $this->Cell(50, 8, utf8_decode('CARGO: _________________________________________________'), 0, 1);

            $this->SetXY(115, 49);
            $this->Cell(50, 8, utf8_decode('FIRMA DEL RESPONSABLE: _______________________'), 0, 1);
            $this->SetY(18);
            $this->SetX(85);
            $this->SetFont('Arial', '', 8);
            //.$this->Image('repimg/inces.png', 0, 0, 100)
            $this->Cell(30, 8, 'Sistema Comedor Aragua');

            $this->SetY(23);
            $this->SetX(81);
            $this->SetFont('Arial', '', 8);
            //.$this->Image('repimg/inces.png', 0, 0, 100)
            $this->Cell(30, 8, utf8_decode('Día:') . $verDesde . " " . "Hasta:" . $verHasta);





            // Datos totales de las comidas solicitadas
            global $desayuno;
            global $almuerzo;
            global $cena;

            $this->SetXY(5, 60);
            $this->SetFont('Arial', 'B', 10);

            $this->Cell(31, 8, 'Desayuno:' . $desayuno, 0);
            $this->Cell(31, 8, 'Almuerzo:' . $almuerzo, 0);
            $this->Cell(31, 8, 'Cena:' . $cena, 0);


            $this->SetTextColor(255, 255, 255);
            $this->Ln(12);

            $this->SetFillColor(210, 57, 57);
            $this->SetXY(1.8, 68);
            $this->SetFont('Arial', 'B', 8);
            $this->Cell(8, 8, utf8_decode('Nº'), 0, 0, 'C', 1);
            $this->Cell(18, 8, utf8_decode('CÉDULA'), 0, 0, 'C', 1);
            $this->Cell(35, 8, utf8_decode('NOMBRE Y APELLIDO'), 0, 0, 'C', 1);
            $this->Cell(47, 8, utf8_decode('DEPENDENCIA'), 0, 0, 'C', 1);
            $this->Cell(30, 8, utf8_decode('ESTATUS'), 0, 0, 'C', 1);
            $this->Cell(20, 8, utf8_decode('COMIDA'), 0, 0, 'C', 1);
            $this->Cell(30, 8, utf8_decode('FECHAS Y HORA'), 0, 0, 'C', 1);
            $this->Cell(18, 8, utf8_decode('USUARIO'), 0, 0, 'C', 1);


            $this->Ln(8);
            $this->SetFont('Arial', '', 8);
        }

        function Footer()
        {
            $this->SetFont('helvetica', 'B', 8);
            $this->SetY(-15);
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0, -2, utf8_decode('Página ') . $this->PageNo() . ' / {nb}', 0, 0, 'L', 0);
            $this->Cell(0, -2, date('d/m/Y | g:i:a'), 00, 1, 'R');
            $this->Line(10, 285, 200, 285);
            $this->Cell(0, 3, utf8_decode("Elaborado Por División Informática (UPTA)."), 0, 0, "C", 0);
            $this->Image('repimg/pie.png', -4, 190.4, 215);
        }
    }



    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetTopMargin(500);
    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);
    $pdf->SetX(5);


    // Cell(ancho , alto,texto,borde(0/1),salto(0/1),alineacion(L,C,R),rellenar(0/1)


    //CONSULTA DE LA BASE DE DATOS APRA TRER LAS FECHAS

    $productos = ("SELECT *, UPPER(personal.nombre) AS nombre_mayusculas, 
UPPER(personal.apellido) AS apellido_mayuscula, DATE_FORMAT(perticket.fecha, '%d-%m-%Y') AS 
fecha_español, perticket.hora AS hora_ticket FROM perticket INNER JOIN personal ON 
perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = 
sedes.idsede INNER JOIN estatus ON personal.idestatus = estatus.idestatus
INNER JOIN usuario ON perticket.iden_usuario = usuario.idusuario 

WHERE perticket.fecha BETWEEN  '$desde' AND '$hasta' ");


    $resultado = mysqli_query($conexion, $productos);
    $contador = 0;
    if ($resultado) {
        while ($row = mysqli_fetch_array($resultado)) {
            $contador++;
            $pdf->SetX(2);
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(8, 8, utf8_decode($contador), 1, 0, 'C', 0);
            $pdf->Cell(18, 8, utf8_decode($row['cedula']), 1, 0, 'C', 0);
            $pdf->Cell(35, 8, utf8_decode($row['nombre_mayusculas']) . " " . utf8_decode($row['apellido_mayuscula']), 1, 0, 'C', 0);
            $pdf->Cell(47, 8, utf8_decode($row['sede']), 1, 0, 'C', 0);
            $pdf->Cell(30, 8, utf8_decode($row['estatus']), 1, 0, 'C', 0);
            $pdf->Cell(20, 8, utf8_decode($row['comida']), 1, 0, 'C', 0);
            $pdf->Cell(30, 8, utf8_decode($row['fecha_español']) . " " . utf8_decode($row['hora_ticket']), 1, 0, 'C', 0);
            $pdf->Cell(18, 8, utf8_decode($row['cedula_usuario']), 1, 0, 'C', 0);
            $pdf->Ln(8);
        }
    } else {
    }


    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFillColor(210, 57, 57);
    $pdf->SetX(173);
    $pdf->Cell(35, 8, utf8_decode("TOTAL:") . " " . $total, 1, 0, 'C', 1);
    $pdf->SetFont('Arial', 'B', 10);

    $pdf->SetXY(5, 35);

    $pdf->Output('reporte_general.pdf', 'I');
}


?>