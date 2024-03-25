<?php
date_default_timezone_set("America/Caracas");


$diahoy=date("d-m-Y");
function fecha_espanol_larga(){
    $fecha_dia=date("d");
    $dia_semana=[
        "Monday"=>"Lunes",
        "Tuesday"=>"Martes",
        "Wednesday"=>"Miércoles",
        "Thursday"=>"Jueves",
        "Friday"=>"Viernes",
        "Saturday"=>"Sábado",
        "Sunday"=>"Domingo"
    ];
    $fecha_final=$dia_semana[date("l")];
    return $fecha_final;
  }



//fecha de inicio y fecha fin del reporte  
if (strlen($_GET['desde2'])>0 ){
    $desde = $_GET['desde2'];
}else{
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


if (strlen($_GET['hasta2'])>0 ) {
    $hasta = $_GET['hasta2'];

    $verDesde = date('Y-m-d', strtotime($desde));
    $verHasta = date('Y-m-d', strtotime($hasta));


    $verHasta2 = date('d-m-Y', strtotime($hasta));
    $verDesde2 = date('d-m-Y', strtotime($desde));
}else{
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
            title: 'FALTO COLOCAR LA FECHA FIN!!',
            icon: 'error',
            confirmButtonText: false,
            showConfirmButton: false,
            footer:'<a href="../../reportes.php" class="boton-eliminar" id="boton-envio">Regresar</a>'
        })
    </script>
<?php

    exit();
}

// sede
if ( strlen($_GET['sede'])>0 ) {
    $sede = $_GET['sede'];
    $verSede = $sede;

}else{
   
    $sede = 'NO TIENE DEPENDENCIA';
    $verSede = $sede;

}


//////////*//////////**//////// */

/// REPORTE TOTAL DE TODAS LAS DEPENDENCIAS

require('conexion.php');

$desayunoLunes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.lunes='Lunes'  AND perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );

$desayunoMartes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.martes='Martes' AND  perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$desayunoMiercoles = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.miercoles='Miercoles' AND perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$desayunoJueves = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.jueves='Jueves'  AND perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$desayunoViernes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.viernes='Viernes' AND perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$desayunoSabado = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.sabado='Sabado' AND perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );


//Conbsulta SQL para las fechas (Almuerzo)
$almuerzoLunes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.lunes='Lunes'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$almuerzoMartes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.martes='Martes'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$almuerzoMiercoles = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.miercoles='Miercoles'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$almuerzoJueves = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.jueves='Jueves'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$almuerzoViernes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.viernes='Viernes'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$almuerzoSabado = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.sabado='Sabado'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );


//Conbsulta SQL para las fechas (cena)
$cenaLunes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.lunes='Lunes'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$cenaMartes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.martes='Martes'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$cenaMiercoles = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.miercoles='Miercoles'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$cenaJueves = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.jueves='Jueves'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$cenaViernes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.viernes='Viernes'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$cenaSabado = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.sabado='Sabado'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );



//Conbsulta SQL para las fechas (desayuno)
$desayuno = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );

//Conbsulta SQL para las fechas (Almuerzo)
$almuerzo = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta'   ")->fetch_assoc() );

//Conbsulta SQL para las fechas (cena)
$cena = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND  perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta'   ")->fetch_assoc() );
//$cena = current($conexion ->query("SELECT COUNT(idticket) FROM perticket WHERE comida='cena'AND fecha='$verDesde' AND fecha='$verHasta'  ")->fetch_assoc() );


$total = current($conexion->query("SELECT COUNT(comida) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede'  AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta'   ")->fetch_assoc() );



require_once ('fpdf/fpdf.php');




if ( strlen($_GET['sede']) > 0 ) {

        
    $totalLunes  = current($conexion->query("SELECT COUNT(comida) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede'  AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.lunes='Lunes'  ")->fetch_assoc() );
    $totalMartes = current($conexion->query("SELECT COUNT(comida)FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede'  AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.martes='Martes'  ")->fetch_assoc() );
    $totalMiercoles = current($conexion->query("SELECT COUNT(comida)FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede'  AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.miercoles='Miercoles'  ")->fetch_assoc() );
    $totalJueves= current($conexion->query("SELECT COUNT(comida) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.jueves='Jueves'  ")->fetch_assoc() );
    $totalViernes = current($conexion->query("SELECT COUNT(comida)FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.viernes='Viernes'  ")->fetch_assoc() );
    $totalSabado = current($conexion->query("SELECT COUNT(comida)FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.sabado='Sabado'  ")->fetch_assoc() );
    
    
    $sumar = $totalLunes + $totalMartes + $totalMiercoles + $totalJueves + $totalViernes + $totalSabado;

    class PDF extends FPDF
    {
    
    //cabeza del reporte
    function Header()
    {
        global $verDesde;
        global $verHasta;
        global $verDesde2;
        global $verHasta2;
        global $verSede;
        global $diahoy;
        global $sumar;
    
        $this->Image('repimg/inces2.0.png',2,3,45);
        $this->Image('repimg/tuerca.png', 160,-20,60);
        
        $this->SetY(12);
        $this->SetX(70);
        $this->SetFont('Arial','B',9);
        
        
        $this->Cell(50, 8, 'REPORTE CONSOLIDADO DE DEPENDENCIA',0,1);
        
        // fecha en que se ahcen las peticiones
        $this->SetY(12);
        $this->SetX(180);
        $this->SetFont('Arial','B',8);
          $this->Cell(50, 8,utf8_decode('Día:')." ".utf8_decode(fecha_espanol_larga()),0,1);
        
        $this->SetXY(180, 17);
        
        $this->Cell(50, 8,utf8_decode('Fecha: ').$diahoy,0,1);
    
        $this->SetXY(180, 22);
        $this->Cell(50, 8,utf8_decode('Estado: Aragua'),0,1);
    
        
        $this->SetXY(180, 27);
        $this->Cell(50, 8,utf8_decode('Dependencia:')." ".$sumar,0,1);
        
        $this->SetXY(5, 35);
        $this->Cell(50, 8,utf8_decode('COMEDOR: ______________________________________________'),0,1);
    
        
        $this->SetXY(5, 42);
        $this->Cell(50, 8,utf8_decode('RESPONSABLE: __________________________________________'),0,1);
    
        
        $this->SetXY(5, 49);
        $this->Cell(50, 8,utf8_decode('CARGO: _________________________________________________'),0,1);
    
        $this->SetXY(115, 49);
        $this->Cell(50, 8,utf8_decode('FIRMA DEL RESPONSABLE: _______________________'),0,1);
        $this->SetY(18);
        $this->SetX(85);
        $this->SetFont('Arial','',8);
        //.$this->Image('repimg/inces.png', 0, 0, 100)
        $this->Cell(30, 8, 'Sistema Comedor Aragua');
    
        
 // Datos totales de las comidas solicitadas
        global $desayuno;
        global $almuerzo;
        global $cena;
            $this->SetY(58);
            $this->SetX(100);
            $this->SetFont('Arial','B', 8);
            
            $this->Cell(50, 8,utf8_decode('Dependencia filtrada:')."  ".utf8_decode($verSede),0,1);

            $this->SetXY(5,58);
            $this->SetFont('Arial','B',10);

            $this->Cell(31, 8, 'Desayuno:'.$desayuno, 0);
            $this->SetX(40);
            $this->Cell(31, 8, 'Almuerzo:'.$almuerzo, 0);
            $this->Cell(31, 8, 'Cena:'.$cena, 0);

        $this->SetY(23);
        $this->SetX(78.2);
        $this->SetFont('Arial','',8);
        //.$this->Image('repimg/inces.png', 0, 0, 100)
        $this->Cell(30, 8, utf8_decode('Desde:').$verDesde2." "."Hasta:".$verHasta2);
    
        $this->SetY(45);
        $this->SetX(147);
        $this->SetTextColor(255, 255, 255);
        $this->Ln(15);
    
        //columnas de los nombre de las tablas a mostrar 
        $this->SetFillColor(210,57,57);
        $this->SetXY(5 , 65);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(10, 8, utf8_decode('Nº'), 0, 0,'C', 1);
        $this->Cell(65, 8, utf8_decode('DEPENDENCIA'), 0, 0,'C', 1);
        $this->Cell(20, 8, utf8_decode('LUNES'), 0, 0,'C', 1);
        $this->Cell(20, 8, utf8_decode('MARTES'), 0, 0,'C', 1);
        $this->Cell(20, 8, utf8_decode('MIÉRCOLES'), 0, 0,'C', 1);
        $this->Cell(20, 8, utf8_decode('JUEVES'), 0, 0,'C', 1);
        $this->Cell(20, 8, utf8_decode('VIERNES'), 0, 0,'C', 1);
        $this->Cell(20,8, utf8_decode('SÁBADO'), 0, 0, 'C',1);

    
   
    
 
    
    $this->Ln(16);
    $this->SetFont('Arial', '', 8);
    
    }
    
    // pie de pagina del reporte
    function Footer()
    {
    
        global $total;
        $this->SetFont('helvetica', 'B', 8);
            $this->SetY(-15);
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0,-2,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L', 0);
            $this->Cell(0,-2,date('d/m/Y | g:i:a') ,00,1,'R');
            $this->Line(10,285,200,285);
            $this->Cell(0,3,utf8_decode("Elaborado Por División Informática (UPTA)."),0,0,"C", 0);
            $this->Image('repimg/pie.png', -4, 190.4, 215);
            $this->SetXY(10, -40);
           
            
    }
    
    }
    
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetTopMargin(500);
    $pdf->SetLeftMargin(10);
    $pdf->SetRightMargin(10);
    
    $pdf->SetFont('', '', 8);
    // Cell(ancho , alto,texto,borde(0/1),salto(0/1),alineacion(L,C,R),rellenar(0/1)
    
    //CONSULTA DE LA BASE DE DATOS PARA TRER LSO DATOS DEL REPO
    
   
$sql = $conexion -> query ("SELECT *, COUNT(perticket.lunes) AS lunes , COUNT(perticket.martes) AS martes, 
COUNT(perticket.miercoles) AS miercoles, COUNT(perticket.jueves) AS jueves,
COUNT(perticket.viernes) AS viernes,COUNT(perticket.sabado) AS sabado
FROM  perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal
INNER JOIN sedes ON personal.idsede = sedes.idsede
 WHERE  sedes.sede = '$verSede ' AND perticket.fecha BETWEEN '$desde' AND '$hasta'  GROUP BY  sedes.sede ");
 
$contador = 0;

while ($row = $sql->fetch_assoc()) {
    $contador ++;
    $pdf->SetXY(5, 73);
    $pdf->Cell(10, 8, utf8_decode($contador), 1, 0,'C', 0);
    $pdf->Cell(65, 8, utf8_decode($row['sede']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['lunes']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['martes']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['miercoles']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['jueves']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['viernes']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['sabado']), 1, 0,'C', 0);
   
    $pdf->Ln(8);

}

    /*
    $totalLunes  = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE  fecha BETWEEN '$desde' AND '$hasta' AND lunes='Lunes'  ")->fetch_assoc() );
    $totalMartes = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE  fecha BETWEEN '$desde' AND '$hasta' AND martes='Martes'  ")->fetch_assoc() );
    $totalMiercoles = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND miercoles='Miercoles'  ")->fetch_assoc() );
    $totalJueves= current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND jueves='jueves'  ")->fetch_assoc() );
    $totalViernes = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND viernes='viernes'  ")->fetch_assoc() );
    $totalSabado = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND sabado='sabado'  ")->fetch_assoc() );
    */
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFillColor(210,57,57);
    $pdf->SetX(165);
    $pdf->Cell(35, 8, utf8_decode("TOTAL:")."  ".$sumar, 1, 0,'C', 1);
    
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('Arial','B',10);
    $pdf->Output('reporte_consolidado_por_dependencia.pdf', 'I');
   
   
   
   
    exit();
    
    
    
    
}else{





















/// REPORTE TOTAL DE TODAS LAS DEPENDENCIAS
/////////////////////
    /////////////////
    /////////////
    ////////////
require('conexion.php');
require_once ('fpdf/fpdf.php');


$totalLunes  = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE  fecha BETWEEN '$desde' AND '$hasta' AND lunes='Lunes'  ")->fetch_assoc() );
$totalMartes = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE  fecha BETWEEN '$desde' AND '$hasta' AND martes='Martes'  ")->fetch_assoc() );
$totalMiercoles = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND miercoles='Miercoles'  ")->fetch_assoc() );
$totalJueves= current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND jueves='jueves'  ")->fetch_assoc() );
$totalViernes = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND viernes='viernes'  ")->fetch_assoc() );
$totalSabado = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND sabado='sabado'  ")->fetch_assoc() );

$sumar = $totalLunes + $totalMartes + $totalMiercoles + $totalJueves + $totalViernes + $totalSabado;






//Conbsulta SQL para las fechas (desayuno)
$desayuno2 = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );

//Conbsulta SQL para las fechas (Almuerzo)
$almuerzo2 = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE  perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta'   ")->fetch_assoc() );

//Conbsulta SQL para las fechas (cena)
$cena2 = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE   perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta'   ")->fetch_assoc() );
//$cena = current($conexion ->query("SELECT COUNT(idticket) FROM perticket WHERE comida='cena'AND fecha='$verDesde' AND fecha='$verHasta'  ")->fetch_assoc() );

class PDF extends FPDF
{

//cabeza del reporte
function Header()
{
    global $verDesde;
    global $verHasta;
    global $verDesde2;
    global $verHasta2;
    global $verSede;
    global $diahoy;
    global $sumar;

    $this->Image('repimg/inces2.0.png',2,3,45);
    $this->Image('repimg/tuerca.png', 160,-20,60);
    
    $this->SetY(12);
    $this->SetX(60);
    $this->SetFont('Arial','B',9);
    
    
    $this->Cell(50, 8, 'REPORTE CONSOLIDADO DE DEPENDENCIA EN TOTAL',0,1);
    
    // fecha en que se ahcen las peticiones
    $this->SetY(12);
    $this->SetX(180);
    $this->SetFont('Arial','B',8);
    $this->Cell(50, 8,utf8_decode('Día:')." ".utf8_decode(fecha_espanol_larga()),0,1);
    
    $this->SetXY(180, 17);
    $this->Cell(50, 8,utf8_decode('Fecha: ').$diahoy,0,1);

    $this->SetXY(180, 22);
    $this->Cell(50, 8,utf8_decode('Estado: Aragua'),0,1);

    
    $this->SetXY(180, 27);
    $this->Cell(50, 8,utf8_decode('Dependencia:')." ".$sumar,0,1);

    $this->SetXY(5, 35);
    $this->Cell(50, 8,utf8_decode('COMEDOR: ______________________________________________'),0,1);

    
    $this->SetXY(5, 42);
    $this->Cell(50, 8,utf8_decode('RESPONSABLE: __________________________________________'),0,1);

    
    $this->SetXY(5, 49);
    $this->Cell(50, 8,utf8_decode('CARGO: _________________________________________________'),0,1);

    $this->SetXY(115, 49);
    $this->Cell(50, 8,utf8_decode('FIRMA DEL RESPONSABLE: _______________________'),0,1);
    
    $this->SetY(18);
    $this->SetX(85);
    $this->SetFont('Arial','',8);
    //.$this->Image('repimg/inces.png', 0, 0, 100)
    $this->Cell(30, 8, 'Sistema Comedor Aragua');

    
    $this->SetY(23);
    $this->SetX(78.2);
    $this->SetFont('Arial','',8);
    //.$this->Image('repimg/inces.png', 0, 0, 100)
    $this->Cell(30, 8, utf8_decode('Desde:').$verDesde2." "."Hasta:".$verHasta2);

$this->SetY(45);
$this->SetX(147);
$this->SetTextColor(255, 255, 255);
$this->Ln(15);

//columnas de los nombre de las tablas a mostrar 
$this->SetFillColor(210,57,57);
$this->SetXY(4.9, 63 );
$this->SetFont('Arial', 'B', 8);

$this->Cell(10, 8, utf8_decode('Nº'), 0, 0,'C', 1);
$this->Cell(65, 8, utf8_decode('DEPENDENCIA'), 0, 0,'C', 1);
$this->Cell(20, 8, utf8_decode('LUNES'), 0, 0,'C', 1);
$this->Cell(20, 8, utf8_decode('MARTES'), 0, 0,'C', 1);
$this->Cell(20, 8, utf8_decode('MIÉRCOLES'), 0, 0,'C', 1);
$this->Cell(20, 8, utf8_decode('JUEVES'), 0, 0,'C', 1);
$this->Cell(20, 8, utf8_decode('VIERNES'), 0, 0,'C', 1);
$this->Cell(20,8, utf8_decode('SÁBADO'), 0, 0, 'C',1);



// Datos totales de las comidas solicitadas
    global $desayuno2;
    global $almuerzo2;
    global $cena2;



$this->SetTextColor(0, 0, 0);
$this->SetFont('Arial','B',10);
$this->SetXY(4, 55);
$this->Cell(25, 8, 'Desayuno:'.$desayuno2, 0);
$this->SetX(40);
$this->Cell(25, 8, 'Almuerzo:'.$almuerzo2, 0);
$this->SetX(75);
$this->Cell(20, 8, 'Cena:'.$cena2, 0);

$this->Ln(16);
$this->SetFont('Arial', '', 8);

}

// pie de pagina del reporte
function Footer()
{


    global $total;
    $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0,-2,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L', 0);
        $this->Cell(0,-2,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->Line(10,285,200,285);
        $this->Cell(0,3,utf8_decode("Elaborado Por División Informática (UPTA)."),0,0,"C", 0);
        $this->Image('repimg/pie.png', -4, 190.4, 215);
        $this->SetXY(10, -40);
        
}

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(500);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

$pdf->SetFont('', '', 8);
// Cell(ancho , alto,texto,borde(0/1),salto(0/1),alineacion(L,C,R),rellenar(0/1)

//CONSULTA DE LA BASE DE DATOS PARA TRER LSO DATOS DEL REPO

//INNER JOIN sedes ON perticket.sede = sedes.sede


$sql = $conexion -> query ("SELECT *, COUNT(perticket.lunes) AS lunes , COUNT(perticket.martes) AS martes, 
COUNT(perticket.miercoles) AS miercoles, COUNT(perticket.jueves) AS jueves,
COUNT(perticket.viernes) AS viernes,COUNT(perticket.sabado) AS sabado
FROM  perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal
INNER JOIN sedes ON personal.idsede = sedes.idsede
 WHERE perticket.fecha BETWEEN '$desde' AND '$hasta'  GROUP BY  sedes.sede ");

$contador = 0;

while ($row = $sql->fetch_assoc()) {
    $contador ++;
    $pdf->SetX(5);
    $pdf->Cell(10, 8, utf8_decode($contador), 1, 0,'C', 0);
    $pdf->Cell(65, 8, utf8_decode($row['sede']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['lunes']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['martes']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['miercoles']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['jueves']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['viernes']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['sabado']), 1, 0,'C', 0);
   
    $pdf->Ln(8);


}

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(210,57,57);
$pdf->SetX(165);
$pdf->Cell(35, 8, utf8_decode("TOTAL:")."  ".$sumar, 1, 0,'C', 1);

$pdf->SetFont('Arial','B',10);


$pdf->SetFont('Arial','B',10);


$pdf->Output('reporte_consolidado_en_total.pdf', 'I');
}

?>