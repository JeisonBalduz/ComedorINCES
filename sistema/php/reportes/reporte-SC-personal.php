<?php

date_default_timezone_set("America/Caracas");
$diahoy=date("d-m-y");
$horadia=date("g:i:s:a");
$horadia2=date("g:i:s:A");
$hora=date("H:i:s");



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
        $total = current($conexion->query("SELECT COUNT(pd_ticket) FROM pedir_comida WHERE pd_ticket = '1' ")->fetch_assoc());
         
        require('conexion.php');
        require_once ('fpdf/fpdf.php');
        class PDF extends FPDF
        {
        
        function Header()
        {
            
            global $hora;
            global $hora2;
            
            global $horadia;
            global $hora;
            global $diahoy;
            global $total;
        
        $this->Image('repimg/inces2.0.png',2,3,45);
        $this->Image('repimg/tuerca.png', 160,-20,60);
        
        $this->SetY(12);
        $this->SetX(65);
        $this->SetFont('Arial','B',9);
        
        
        $this->Cell(50, 8, 'REPORTE DE SOLICITUD DE COMIDA POR PERSONAL',0,1);
        
           
        // fecha en que se ahcen las peticiones
        $this->SetY(12);
        $this->SetX(182);
        $this->SetFont('Arial','B',8);
        $this->Cell(50, 8,utf8_decode('Día:')." ".utf8_decode(fecha_espanol_larga()),0,1);
        
        $this->SetXY(182, 17);
        
        $this->Cell(50, 8,utf8_decode('Fecha: ').$diahoy,0,1);

        $this->SetXY(182, 22);
        $this->Cell(50, 8,utf8_decode('Estado: Aragua'),0,1);

        $this->SetXY(182, 27);
        $this->Cell(50, 8,utf8_decode('Personal:')." ".$total,0,1);

        
        $this->SetXY(5, 35);
        $this->Cell(50, 8,utf8_decode('COMEDOR: ______________________________________________'),0,1);

        
        $this->SetXY(5, 42);
        $this->Cell(50, 8,utf8_decode('RESPONSABLE: __________________________________________'),0,1);

        
        $this->SetXY(5, 49);
        $this->Cell(50, 8,utf8_decode('CARGO: _________________________________________________'),0,1);

        $this->SetXY(115, 49);
        $this->Cell(50, 8,utf8_decode('FIRMA DEL RESPONSABLE: _______________________'),0,1);
        $this->SetY(18);
        $this->SetX(88);
        $this->SetFont('Arial','',8);
        //.$this->Image('repimg/inces.png', 0, 0, 100)
        $this->Cell(30, 8, 'Sistema Comedor Aragua');
        
        
        
        $this->SetXY(5,52);
        $this->SetFont('Arial','B',10);
        
        $this->SetTextColor(255, 255, 255);
        $this->Ln(12);
        
        $this->SetFillColor(210,57,57);
        $this->SetXY(10, 60);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(10, 8, utf8_decode('Nº'), 0, 0,'C', 1);
        $this->Cell(25.2, 8, utf8_decode('CÉCUDLA'), 0, 0,'C', 1);
        $this->Cell(35, 8, utf8_decode('NOMBRE Y APELLIDO'), 0, 0,'C', 1);
        $this->Cell(26, 8, utf8_decode('ESTATUS'), 0, 0,'C', 1);
        $this->Cell(60, 8, utf8_decode('DEPENDENCIA'), 0, 0,'C', 1);
        $this->Cell(35, 8, utf8_decode('FIRMA'), 0, 0,'C', 1);
        
        
        
        
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
        
        $hola= 'idsede';
        //CONSULTA DE LA BASE DE DATOS APRA TRER LAS FECHAS
        
        $sql = $conexion -> query ("SELECT *, UPPER(personal.nombre) AS nombre_mayusculas, UPPER(personal.apellido) AS apellido_mayusculas FROM pedir_comida INNER JOIN personal ON pedir_comida.idpersonal = personal.idpersonal INNER JOIN estatus ON personal.idestatus = estatus.idestatus INNER JOIN sedes ON personal.idsede = sedes.idsede" );
        
        
        $contador= 0;
        while ($row = $sql->fetch_assoc()) {
            $contador ++;
            $pdf->SetX(10);
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(10, 8, utf8_decode($contador), 1, 0,'C', 0);
            $pdf->Cell(25.2, 8, utf8_decode($row['cedula']), 1, 0,'C', 0);
            $pdf->Cell(35, 8, utf8_decode($row['nombre_mayusculas']." ".$row['apellido_mayusculas']), 1, 0,'C', 0);
            $pdf->Cell(26, 8, utf8_decode($row['estatus']), 1, 0,'C', 0);
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(60, 8, utf8_decode($row['sede']), 1, 0,'C', 0);
            $pdf->Cell(35, 8, utf8_decode('____________________'), 1, 0,'C', 0);
            
            $pdf->Ln(8);
            
        }
            
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFillColor(210,57,57);
        $pdf->SetX(144.2);
        $pdf->Cell(57, 8, utf8_decode("TOTAL DE COMIDAS:")."  ".$total, 1, 0,'C', 1);
        $pdf->SetFont('Arial','B',10);
        
        $pdf->SetXY(5, 35);
        
        $pdf->Output('reporte_solicitud_comida.pdf', 'I');

        exit();       
