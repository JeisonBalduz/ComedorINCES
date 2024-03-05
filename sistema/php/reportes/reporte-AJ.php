
<?php
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
  

  if (strlen($_GET['desde4'])>0 ){
      $desde = $_GET['desde4'];
  }else{
      echo'FALTO LA FECHA DE INICIO';
      exit();
  }
  
  
  if (strlen($_GET['hasta4'])>0 ) {
      $hasta = $_GET['hasta4'];
  
      $verDesde = date('d/m/Y', strtotime($desde));
      $verHasta = date('d/m/Y', strtotime($hasta));
      $verHasta2 = date('d-m-Y', strtotime($hasta));
    $verDesde2 = date('d-m-Y', strtotime($desde));
  }else{
      echo 'FALTO LA FECHA FINAL';
      $desde = '1111-01-01';
      $hasta = '9999-12-30';
      
      $verDesde = '__/__/___';
      $verHasta = '__/__/___';
  
      exit();
  }
  

//conexion a la base de datos
$conexion=mysqli_connect("localhost","root","","inces2");
 
$total = current($conexion->query("SELECT COUNT(idpermiso) FROM ausencia_justificada WHERE fecha_aj BETWEEN '$desde' AND '$hasta'   ")->fetch_assoc() );

require('conexion.php');
require_once ('fpdf/fpdf.php');
class PDF extends FPDF
{

function Header()
{
    global $verDesde;
    global $verHasta;
    global $verDesde2;
    global $verHasta2;
    global $verSede;
    global $diahoy;
    global $total;    

    $this->Image('repimg/inces2.0.png',2,3,45);
    $this->Image('repimg/tuerca.png', 160,-20,60);
    
    $this->SetY(12);
    $this->SetX(62);
    $this->SetFont('Arial','B',9);
    
    
    $this->Cell(50, 8, 'REPORTE DE SOLICITUD DE AUSENCIA JUSTIFICADA',0,1);
    
    // fecha en que se ahcen las peticiones
    $this->SetY(12);
    $this->SetX(182);
    $this->SetFont('Arial','B',8);
    $this->Cell(50, 8,utf8_decode('Día:')." ".utf8_decode(fecha_espanol_larga()),0,1);
    
    $this->SetXY(182, 17);
    
    $this->Cell(50, 8,utf8_decode('Fecha:').$diahoy,0,1);

    $this->SetXY(182, 22);
    $this->Cell(50, 8,utf8_decode('Estado: Aragua'),0,1);

    $this->SetXY(182, 27);
    $this->Cell(50, 8,utf8_decode('Permisos:')." ".$total,0,1);
    
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
    $this->SetX(81);
    $this->SetFont('Arial','',8);
    //.$this->Image('repimg/inces.png', 0, 0, 100)
    $this->Cell(30, 8, utf8_decode('Día:').$verDesde2." "."Hasta:".$verHasta2);

$this->SetXY(5,52);
$this->SetFont('Arial','B',10);

$this->SetTextColor(255, 255, 255);
$this->Ln(12);

$this->SetFillColor(210,57,57);
$this->SetXY(2, 60);
$this->SetFont('Arial', 'B', 7);

$this->Cell(18, 8, utf8_decode('CÉDULA'), 0, 0,'C', 1);
$this->Cell(28, 8, utf8_decode('NOMBRE Y APELLIDO'), 0, 0,'C', 1);
$this->Cell(47, 8, utf8_decode('DEPENDENCIA'), 0, 0,'C', 1);
$this->Cell(20, 8, utf8_decode('ESTATUS'), 0, 0,'C', 1);
$this->Cell(18, 8, utf8_decode('FECHA_INI'), 0, 0,'C', 1);
$this->Cell(18, 8, utf8_decode('FECHA_FIN'), 0, 0,'C', 1);
$this->Cell(30, 8, utf8_decode('FECHA'), 0, 0,'C', 1);
$this->Cell(27, 8, utf8_decode('PERMISO'), 0, 0,'C', 1);

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

$permisos = ("SELECT *, DATE_FORMAT(fecha_aj, '%d-%m-%Y') AS fecha_aj, DATE_FORMAT(fecha_inicio, '%d-%m-%Y') 
AS fecha_inicio, DATE_FORMAT(fecha_fin, '%d-%m-%Y') AS fecha_fin,
UPPER(personal.nombre) AS nombre_mayusculas, UPPER(personal.apellido)
AS apellido_mayusculas FROM ausencia_justificada INNER JOIN personal 
ON ausencia_justificada.idpersonal = personal.idpersonal
INNER JOIN sedes ON personal.idsede = sedes.idsede 
INNER JOIN estatus ON personal.idestatus = estatus.idestatus 
INNER JOIN permisos ON ausencia_justificada.id_permiso = permisos.idpermisos_aj
WHERE fecha_aj BETWEEN '$desde' AND '$hasta' ORDER BY fecha_aj ");

$resultado = mysqli_query($conexion, $permisos);
$contador= 0;

while ($row = mysqli_fetch_array($resultado)) {
    $contador  ++;
    $pdf->SetX(2);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(18, 8, utf8_decode($row['cedula']), 1, 0,'C', 0);
    $pdf->Cell(28, 8, utf8_decode($row['nombre_mayusculas'])." ".utf8_decode($row['apellido_mayusculas']), 1, 0,'C', 0);
    $pdf->Cell(47, 8, utf8_decode($row['sede']), 1, 0,'C', 0);
    $pdf->Cell(20, 8, utf8_decode($row['estatus']), 1, 0,'C', 0);
    $pdf->Cell(18, 8, utf8_decode($row['fecha_inicio']), 1, 0,'C', 0);
    $pdf->Cell(18, 8, utf8_decode($row['fecha_fin']), 1, 0,'C', 0);
    $pdf->Cell(30, 8, utf8_decode($row['fecha_aj'])." ".utf8_decode($row['hora_aj']), 1, 0,'C', 0);
    $pdf->Cell(27, 8, utf8_decode($row['permisos']), 1, 0,'C', 0);

    $pdf->Ln(8);
    
}

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(210,57,57);
$pdf->SetX(161);
$pdf->Cell(47, 8, utf8_decode("PERMISOS EN TOTAL:"." ".$total), 1, 0,'C', 1);

$pdf->SetFont('Arial','B',10);

$pdf->SetXY(5, 35);

$pdf->Output('reporte_ASJ.pdf', 'I');
?>
