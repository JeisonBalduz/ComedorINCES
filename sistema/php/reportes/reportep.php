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
    echo'FALTO LA FECHA DE INICIO';
    exit();
}


if (strlen($_GET['hasta2'])>0 ) {
    $hasta = $_GET['hasta2'];

    $verDesde = date('d/m/Y', strtotime($desde));
    $verHasta = date('d/m/Y', strtotime($hasta));
    $verHasta2 = $hasta  ;
    $verDesde2 = $desde  ;
}else{
    echo 'FALTO LA FECHA FINAL';
    $desde = '1111-01-01';
    $hasta = '9999-12-30';
    
    $verDesde = '__/__/___';
    $verHasta = '__/__/___';

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


$desayunoLunes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.lunes='$verLunes'  AND perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );

$desayunoMartes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.martes='$verMartes' AND  perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$desayunoMiercoles = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.miercoles='$verMiercoles' AND perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$desayunoJueves = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.jueves='$verJueves'  AND perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$desayunoViernes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.viernes='$verViernes' AND perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$desayunoSabado = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.sabado='$verSabado' AND perticket.comida='desayuno' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );


//Conbsulta SQL para las fechas (Almuerzo)
$almuerzoLunes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.lunes='$verLunes'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$almuerzoMartes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.martes='$verMartes'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$almuerzoMiercoles = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.miercoles='$verMiercoles'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$almuerzoJueves = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.jueves='$verJueves'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$almuerzoViernes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.viernes='$verViernes'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$almuerzoSabado = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.sabado='$verSabado'  AND perticket.comida='almuerzo' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );


//Conbsulta SQL para las fechas (cena)
$cenaLunes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.lunes='$verLunes'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$cenaMartes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.martes='$verMartes'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$cenaMiercoles = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.miercoles='$verMiercoles'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$cenaJueves = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.jueves='$verJueves'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$cenaViernes = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.viernes='$verViernes'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );
$cenaSabado = current($conexion ->query("SELECT COUNT(idticket) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.sabado='$verSabado'  AND perticket.comida='cena' AND perticket.fecha BETWEEN '$verDesde' AND '$verHasta' ")->fetch_assoc() );




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

    class PDF extends FPDF
    {
    
    //cabeza del reporte
    function Header()
    {
        global $verDesde;
        global $verHasta;
        global $verSede;
        global $diahoy;
    
        $this->Image('repimg/inces2.0.png',2,3,45);
        $this->Image('repimg/tuerca.png', 160,-20,60);
        
        $this->SetY(12);
        $this->SetX(70);
        $this->SetFont('Arial','B',9);
        
        
        $this->Cell(50, 8, 'REPORTE CONSOLIDADO DE DEPENDENCIA',0,1);
        
        // fecha en que se ahcen las peticiones
        $this->SetY(12);
        $this->SetX(182);
        $this->SetFont('Arial','B',8);
          $this->Cell(50, 8,utf8_decode('Día:')." ".utf8_decode(fecha_espanol_larga()),0,1);
        
        $this->SetXY(182, 17);
        
        $this->Cell(50, 8,utf8_decode('Fecha: ').$diahoy,0,1);
    
        $this->SetXY(182, 22);
        $this->Cell(50, 8,utf8_decode('Estado: Aragua'),0,1);
    
        
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
        $this->Cell(30, 8, utf8_decode('Desde:').$verDesde." "."Hasta:".$verHasta);
    
        $this->SetY(45);
        $this->SetX(147);
        $this->SetTextColor(255, 255, 255);
        $this->Ln(15);
    
        //columnas de los nombre de las tablas a mostrar 
        $this->SetFillColor(210,57,57);
        $this->SetX(15);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(10, 8, utf8_decode('Nº'), 0, 0,'C', 1);
        $this->Cell(45, 8, utf8_decode('DEPENDENCIA'), 0, 0,'C', 1);
        $this->Cell(20, 8, utf8_decode('LUNES'), 0, 0,'C', 1);
        $this->Cell(20, 8, utf8_decode('MARTES'), 0, 0,'C', 1);
        $this->Cell(20, 8, utf8_decode('MIÉRCOLES'), 0, 0,'C', 1);
        $this->Cell(20, 8, utf8_decode('JUEVES'), 0, 0,'C', 1);
        $this->Cell(20, 8, utf8_decode('VIERNES'), 0, 0,'C', 1);
        $this->Cell(20,8, utf8_decode('SÁBADO'), 0, 0, 'C',1);
    
    
    // Datos totales de las comidas solicitadas
        global $desayuno;
        global $almuerzo;
        global $cena;
    
    $this->SetXY(5,68);
    $this->SetFont('Arial','B',10);
    $this->SetXY(135, 52);
    $this->Cell(25, 8, 'Desayuno:'.$desayuno, 0);
    $this->Cell(25, 8, 'Almuerzo:'.$almuerzo, 0);
    $this->Cell(20, 8, 'Cena:'.$cena, 0);
    
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
 WHERE  sede = '$verSede ' AND perticket.fecha BETWEEN '$desde' AND '$hasta'  GROUP BY  sedes.sede ");
 
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
    
    /*
    $totalLunes  = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE  fecha BETWEEN '$desde' AND '$hasta' AND lunes='Lunes'  ")->fetch_assoc() );
    $totalMartes = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE  fecha BETWEEN '$desde' AND '$hasta' AND martes='Martes'  ")->fetch_assoc() );
    $totalMiercoles = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND miercoles='Miercoles'  ")->fetch_assoc() );
    $totalJueves= current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND jueves='jueves'  ")->fetch_assoc() );
    $totalViernes = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND viernes='viernes'  ")->fetch_assoc() );
    $totalSabado = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND sabado='sabado'  ")->fetch_assoc() );
    */
    
    $totalLunes  = current($conexion->query("SELECT COUNT(comida) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede'  AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.lunes='Lunes'  ")->fetch_assoc() );
    $totalMartes = current($conexion->query("SELECT COUNT(comida)FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede'  AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.martes='Martes'  ")->fetch_assoc() );
    $totalMiercoles = current($conexion->query("SELECT COUNT(comida)FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede'  AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.miercoles='Miercoles'  ")->fetch_assoc() );
    $totalJueves= current($conexion->query("SELECT COUNT(comida) FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.jueves='Jueves'  ")->fetch_assoc() );
    $totalViernes = current($conexion->query("SELECT COUNT(comida)FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.viernes='Viernes'  ")->fetch_assoc() );
    $totalSabado = current($conexion->query("SELECT COUNT(comida)FROM perticket INNER JOIN personal ON perticket.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE sedes.sede='$verSede' AND perticket.fecha BETWEEN '$desde' AND '$hasta' AND perticket.sabado='Sabado'  ")->fetch_assoc() );
    
    
    $sumar = $totalLunes + $totalMartes + $totalMiercoles + $totalJueves + $totalViernes + $totalSabado;
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFillColor(210,57,57);
    $pdf->SetX(155);
    $pdf->Cell(35, 8, utf8_decode("TOTAL:")."  ".$sumar, 1, 0,'C', 1);
    
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('Arial','B',10);
    $pdf->Output('reporte_consolidado_por_dependencia.pdf', 'I');
    exit();
    
    
    
    
}else{
    
/// REPORTE TOTAL DE TODAS LAS DEPENDENCIAS

require('conexion.php');
require_once ('fpdf/fpdf.php');

class PDF extends FPDF
{

//cabeza del reporte
function Header()
{
    global $verDesde;
    global $verHasta;
    global $verSede;
    global $diahoy;

    $this->Image('repimg/inces2.0.png',2,3,45);
    $this->Image('repimg/tuerca.png', 160,-20,60);
    
    $this->SetY(12);
    $this->SetX(60);
    $this->SetFont('Arial','B',9);
    
    
    $this->Cell(50, 8, 'REPORTE CONSOLIDADO DE DEPENDENCIA EN TOTAL',0,1);
    
    // fecha en que se ahcen las peticiones
    $this->SetY(12);
    $this->SetX(182);
    $this->SetFont('Arial','B',8);
    $this->Cell(50, 8,utf8_decode('Día:')." ".utf8_decode(fecha_espanol_larga()),0,1);
    
    $this->SetXY(182, 17);
    $this->Cell(50, 8,utf8_decode('Fecha: ').$diahoy,0,1);

    $this->SetXY(182, 22);
    $this->Cell(50, 8,utf8_decode('Estado: Aragua'),0,1);

    
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
    $this->Cell(30, 8, utf8_decode('Desde:').$verDesde." "."Hasta:".$verHasta);

$this->SetY(45);
$this->SetX(147);
$this->SetTextColor(255, 255, 255);
$this->Ln(15);

//columnas de los nombre de las tablas a mostrar 
$this->SetFillColor(210,57,57);
$this->SetX(4.9);
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
    global $desayuno;
    global $almuerzo;
    global $cena;

$this->SetXY(5,68);
$this->SetFont('Arial','B',10);
$this->SetXY(135, 52);
$this->Cell(25, 8, 'Desayuno:'.$desayuno, 0);
$this->Cell(25, 8, 'Almuerzo:'.$almuerzo, 0);
$this->Cell(20, 8, 'Cena:'.$cena, 0);

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

$totalLunes  = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE  fecha BETWEEN '$desde' AND '$hasta' AND lunes='Lunes'  ")->fetch_assoc() );
$totalMartes = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE  fecha BETWEEN '$desde' AND '$hasta' AND martes='Martes'  ")->fetch_assoc() );
$totalMiercoles = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND miercoles='Miercoles'  ")->fetch_assoc() );
$totalJueves= current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND jueves='jueves'  ")->fetch_assoc() );
$totalViernes = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND viernes='viernes'  ")->fetch_assoc() );
$totalSabado = current($conexion->query("SELECT COUNT(comida) FROM perticket WHERE fecha BETWEEN '$desde' AND '$hasta' AND sabado='sabado'  ")->fetch_assoc() );

$sumar = $totalLunes + $totalMartes + $totalMiercoles + $totalJueves + $totalViernes + $totalSabado;

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