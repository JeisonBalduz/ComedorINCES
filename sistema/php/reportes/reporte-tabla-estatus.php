<?php
date_default_timezone_set("America/Caracas");
require('conexion.php');
$total = current($conexion->query("SELECT COUNT(idestatus) FROM estatus  ")->fetch_assoc() );

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
  


require_once ('fpdf/fpdf.php');
class PDF extends FPDF
{

function Header()
{
 global $diahoy;
 global $total;

    $this->Image('repimg/inces2.0.png',2,3,45);
    $this->Image('repimg/tuerca.png', 160,-20,60);
    
    $this->SetY(12);
    $this->SetX(83);
    $this->SetFont('Arial','B',11);
    
    
    $this->Cell(50, 8, 'TABLA DE ESTATUS',0,1);
    
    // fecha en que se ahcen las peticiones
    $this->SetY(12);
    $this->SetX(183);
    $this->SetFont('Arial','B',8);
    $this->Cell(50, 8,utf8_decode('Día:')." ".utf8_decode(fecha_espanol_larga()),0,1);
    
    $this->SetXY(183, 17);
    
    $this->Cell(50, 8,utf8_decode('Fecha: ').$diahoy,0,1);

    $this->SetXY(183, 22);
    $this->Cell(50, 8,utf8_decode('Estado: Aragua'),0,1);

    $this->SetXY(183, 27);
    $this->Cell(50, 8,utf8_decode('Estatus:')." ".$total,0,1);

    
    $this->SetXY(5, 35);
    $this->Cell(50, 8,utf8_decode('COMEDOR: ______________________________________________'),0,1);
    
    $this->SetXY(5, 42);
    $this->Cell(50, 8,utf8_decode('RESPONSABLE: __________________________________________'),0,1);

    
    $this->SetXY(5, 49);
    $this->Cell(50, 8,utf8_decode('CARGO: _________________________________________________'),0,1);

    $this->SetXY(115, 49);
    $this->Cell(50, 8,utf8_decode('FIRMA DEL RESPONSABLE: _______________________'),0,1);
    $this->SetY(18);
    $this->SetX(86);
    $this->SetFont('Arial','',8);
    //.$this->Image('repimg/inces.png', 0, 0, 100)
    $this->Cell(30, 8, 'Sistema Comedor Aragua');

    $this->SetTextColor(255, 255, 255);
    $this->Ln(12);

    $this->SetFillColor(210,57,57);
    $this->SetXY(25, 60);
    $this->SetFont('Arial', 'B', 8);
    $this->Cell(10, 8, utf8_decode('Nº'), 0, 0,'C', 1);
    $this->Cell(50, 8, utf8_decode('ESTATUS'), 0, 0,'C', 1);
    $this->Cell(35, 8, utf8_decode('FECHA Y HORA'), 0, 0,'C', 1);
    $this->Cell(35, 8, utf8_decode('USUARIO'), 0, 0,'C', 1);
    $this->Cell(35, 8, utf8_decode('IDEN_CÉDUAL'), 0, 0,'C', 1);
   
   


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

$productos = ("SELECT *, DATE_FORMAT(estatus_fecha, '%d-%m-%Y') AS fecha_nueva
 FROM estatus INNER JOIN usuario ON estatus.iden_usuario = usuario.idusuario ORDER BY idestatus" );
$resultado = mysqli_query($conexion, $productos);
$item = 0;
$totalunidades = 0;
$totaldis = 0;
while ($row = mysqli_fetch_array($resultado)) {
    $item = $item+1;
    $pdf->SetX(25);
    $pdf->Cell(10, 8, $item, 1, 0,'C', 0);
    $pdf->Cell(50, 8, $row['estatus'], 1, 0,'C', 0);
    $pdf->Cell(35, 8, utf8_decode($row['fecha_nueva']).'-'.$row['estatus_hora'], 1, 0,'C', 0);
    $pdf->Cell(35, 8, utf8_decode($row['usuario']), 1, 0,'C', 0);
    $pdf->Cell(35, 8, utf8_decode($row['cedula_usuario']), 1, 0,'C', 0);
   
    
    $pdf->Ln(8);
    
}

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(210,57,57);
$pdf->SetX(145);
$pdf->Cell(45, 8, utf8_decode("TOTAL DE ESTATUS:"." ".$total), 1, 0,'C', 1);
$pdf->SetFont('Arial','B',10);

$pdf->SetXY(5, 35);

$pdf->Output('tabla-estatus.pdf', 'I');
?>
