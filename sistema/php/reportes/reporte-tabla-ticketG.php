<?php
date_default_timezone_set("America/Caracas");
date_default_timezone_set("America/Caracas");

$diahoy=date("d-m-y");
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
//conexion a la base de datos
$conexion=mysqli_connect("localhost","root","","inces2");
 
//Conbsulta SQL para las fechas (desayuno)
$desayuno = current($conexion ->query("SELECT COUNT(idticket) FROM perticket WHERE comida='desayuno' ")->fetch_assoc() );

//Conbsulta SQL para las fechas (Almuerzo)
$almuerzo = current($conexion ->query("SELECT COUNT(idticket) FROM perticket WHERE comida='almuerzo'  ")->fetch_assoc() );

//Conbsulta SQL para las fechas (cena)
$cena = current($conexion ->query("SELECT COUNT(idticket) FROM perticket WHERE comida='cena'   ")->fetch_assoc() );

require('conexion.php');
require_once ('fpdf/fpdf.php');
class PDF extends FPDF
{

function Header()
{
    global $diahoy;
   
$this->Image('repimg/inces2.0.png',2,3,45);
$this->Image('repimg/tuerca.png', 160,-20,60);

$this->SetY(25);
$this->SetX(75);
$this->SetFont('Arial','B',12);


$this->Cell(50, 8, 'TABLA DE TICKETS GENERADOS',0,1);


$this->SetY(30);
$this->SetX(89);
$this->SetFont('Arial','',8);
//.$this->Image('repimg/inces.png', 0, 0, 100)
$this->Cell(30, 8, 'Sistema Comedor Aragua');

$this->SetY(12);
    $this->SetX(182);
    $this->SetFont('Arial','B',8);
    $this->Cell(50, 8,utf8_decode('Día:')." ".utf8_decode(fecha_espanol_larga()),0,1);
    
    $this->SetXY(182, 17);
    
    $this->Cell(50, 8,utf8_decode('Fecha:').$diahoy,0,1);

    $this->SetXY(182, 22);
    $this->Cell(50, 8,utf8_decode('Estado: Aragua'),0,1);
// Datos totales de las comidas solicitadas
global $desayuno;
global $almuerzo;
global $cena;

$this->SetXY(5,52);
$this->SetFont('Arial','B',10);

$this->Cell(31, 8, 'Desayuno:'.$desayuno, 0);
$this->Cell(31, 8, 'Almuerzo:'.$almuerzo, 0);
$this->Cell(31, 8, 'Cena:'.$cena, 0);



$this->SetTextColor(255, 255, 255);
$this->Ln(12);

$this->SetFillColor(210,57,57);
$this->SetXY(4.9, 60);
$this->SetFont('Arial', 'B', 8);
$this->Cell(20, 8, utf8_decode('Cedula'), 0, 0,'C', 1);
$this->Cell(20, 8, utf8_decode('Nombre'), 0, 0,'C', 1);
$this->Cell(20, 8, utf8_decode('Apellido'), 0, 0,'C', 1);
$this->Cell(35, 8, utf8_decode('sede'), 0, 0,'C', 1);
$this->Cell(25, 8, utf8_decode('estatus'), 0, 0,'C', 1);
$this->Cell(20, 8, utf8_decode('comida'), 0, 0,'C', 1);
$this->Cell(35, 8, utf8_decode('Fecha y Hora'), 0, 0,'C', 1);
$this->Cell(25, 8, utf8_decode('Iden_cedula'), 0, 0,'C', 1);



$this->Ln(8);
$this->SetFont('Arial', '', 8);

}

function Footer()
{
     $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0,-2,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L', 0);
        $this->Cell(0,-2,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->Line(10,285,200,285);
        $this->Cell(0,3,utf8_decode("Elaborado Por División Informática (UPTA)."),0,0,"C", 0);
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

$productos = ("SELECT * FROM perticket ");
$resultado = mysqli_query($conexion, $productos);
$item = 0;
$totalunidades = 0;
$totaldis = 0;
while ($row = mysqli_fetch_array($resultado)) {
    $item = $item+1;
    $pdf->SetX(5);
    $pdf->Cell(20, 8, $row['cedula'], 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['nombre']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, $row['apellido'], 1, 0,'C', 0);
    $pdf->Cell(35, 8, $row['sede'], 1, 0,'C', 0);
    $pdf->Cell(25, 8, $row['estatus'], 1, 0,'C', 0);
    $pdf->Cell(20, 8, $row['comida'], 1, 0,'C', 0);
    $pdf->Cell(35, 8, $row['fecha'].'-'.$row['hora'], 1, 0,'C', 0);
    $pdf->Cell(25, 8, $row['iden_cedula'], 1, 0,'C', 0);
   


    $pdf->Ln(8);
    
}
$total = current($conexion->query("SELECT COUNT(idticket) FROM perticket  ")->fetch_assoc() );

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(210,57,57);
$pdf->SetX(170);
$pdf->Cell(35, 8, utf8_decode("Total de tickets:".$total), 1, 0,'C', 1);
$pdf->SetFont('Arial','B',10);

$pdf->SetXY(5, 35);

$pdf->Output('reporte_de tickets-generados.pdf', 'I');
?>
