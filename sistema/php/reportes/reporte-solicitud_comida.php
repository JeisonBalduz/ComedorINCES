<?php

date_default_timezone_set("America/Caracas");
$diahoy=date("d-m-Y");
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
  


// SOLICITUD DE COMIDAS POR PERSONAL DETALLADO CON USAURIOS 

if (isset($_GET['boton_total_detallado'])){
    //conexion a la base de datos
    $conexion=mysqli_connect("localhost","root","","inces2");
        
    $total = current($conexion->query("SELECT COUNT(idcomer) FROM pedir_comida  WHERE pd_ticket = '1' ")->fetch_assoc());
    
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
        global $script_tz;
        global $total;
    
    $this->Image('repimg/inces2.0.png',2,3,45);
    $this->Image('repimg/tuerca.png', 160,-20,60);
    
    $this->SetY(12);
    $this->SetX(55);
    $this->SetFont('Arial','B',9);
    
    
    $this->Cell(50, 8, 'REPORTE DE SOLICITUD DE COMIDA POR PERSONAL DETALLADO',0,1);
    
    
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
    $this->Cell(50, 8,utf8_decode('Comidas:')." ".$total,0,1);

    

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
    
    
    
    $this->SetXY(5,52);
    $this->SetFont('Arial','B',10);
    
    $this->SetTextColor(255, 255, 255);
    $this->Ln(12);
    
    $this->SetFillColor(210,57,57);
    $this->SetXY(3, 60);
    $this->SetFont('Arial', 'B', 8);
    $this->Cell(10, 8, utf8_decode('Nº'), 0, 0,'C', 1);
    $this->Cell(18, 8, utf8_decode('CÉCUDLA'), 0, 0,'C', 1);
    $this->Cell(35, 8, utf8_decode('NOMBRE Y APELLIDO'), 0, 0,'C', 1);
    $this->Cell(25, 8, utf8_decode('ESTATUS'), 0, 0,'C', 1);
    $this->Cell(57, 8, utf8_decode('DEPENDENCIA'), 0, 0,'C', 1);
    $this->Cell(25, 8, utf8_decode('IDEN_USUARIO'), 0, 0,'C', 1);
    $this->Cell(35, 8, utf8_decode('CÉDULA'), 0, 0,'C', 1);
    
    
    
    
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
    //SELECT *, UPPER(nombre) AS nombre_mayusculas, UPPER(apellido) AS apellido_mayusculas, pedir_comida.id_usuario, pedir_comida.idpersonal, personal.idestatus, personal.idsede FROM pedir_comida INNER JOIN usuario ON pedir_comida.id_usuario = usuario.idusuario INNER JOIN personal ON pedir_comida.idpersonal = personal.idpersonal INNER JOIN estatus ON personal.idestatus = estatus.idestatus INNER JOIN sedes ON personal.idsede = sedes.idsede

    $hola= 'idsede';
    //CONSULTA DE LA BASE DE DATOS APRA TRER LAS FECHAS 
$sql = $conexion -> query (" SELECT *, pedir_comida.idpersonal, pedir_comida.id_usuario, UPPER(personal.nombre) AS nombre_mayusculas, UPPER(personal.apellido) AS apellido_mayusculas FROM pedir_comida INNER JOIN usuario ON pedir_comida.id_usuario = usuario.idusuario INNER JOIN personal ON pedir_comida.idpersonal = personal.idpersonal INNER JOIN estatus ON personal.idestatus = estatus.idestatus INNER JOIN sedes ON personal.idsede = sedes.idsede" );
    
    
    $contador= 0;
    while ($row = $sql->fetch_assoc()) {
        $contador ++;
        $pdf->SetX(3);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(10, 8, utf8_decode($contador), 1, 0,'C', 0);
        $pdf->Cell(18, 8, utf8_decode($row['cedula']), 1, 0,'C', 0);
        $pdf->Cell(35, 8, utf8_decode($row['nombre_mayusculas']." ".$row['apellido_mayusculas']), 1, 0,'C', 0);
        $pdf->Cell(25, 8, utf8_decode($row['estatus']), 1, 0,'C', 0);
        $pdf->Cell(57, 8, utf8_decode($row['sede']), 1, 0,'C', 0);
        $pdf->Cell(25, 8, utf8_decode($row['usuario']), 1, 0,'C', 0);   
        $pdf->Cell(35, 8, utf8_decode($row['cedula_usuario']), 1, 0,'C', 0);      
   
        
        $pdf->Ln(8);
        
    }
        
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFillColor(210,57,57);
    $pdf->SetX(158.2);
    $pdf->Cell(50, 8, utf8_decode("TOTAL DE COMIDAS:")."  ".$total, 1, 0,'C', 1);
    $pdf->SetFont('Arial','B',10);
    
    $pdf->SetXY(5, 35);
    
    $pdf->Output('reporte_solicitud_comida.pdf', 'I');

    exit();       

}





//// generar el reporte por cantidad de dependencia

          
    //conexion a la base de datos
    $conexion=mysqli_connect("localhost","root","","inces2");
    
    $total = current($conexion->query("SELECT COUNT(pd_ticket) FROM pedir_comida  WHERE pd_ticket = '1' ")->fetch_assoc());

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
   

    $this->SetY(20);
    $this->SetX(50);
    $this->SetFont('Arial','B',12);


    $this->Image('repimg/inces2.0.png',2,3,45);
    $this->Image('repimg/tuerca.png', 160,-20,60);
    
    $this->SetY(12);
    $this->SetX(58);
    $this->SetFont('Arial','B',9);
    
    
    $this->Cell(50, 8, 'REPORTE DE SOLICITUD DE COMIDA POR DEPENDENCIA',0,1);
    
    
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
    $this->Cell(50, 8,utf8_decode('Comidas:')." ".$total,0,1);

    
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
    
    
    
    $this->SetXY(5,52);
    $this->SetFont('Arial','B',10);
    
    $this->SetTextColor(255, 255, 255);
    $this->Ln(12);
    
    $this->SetFillColor(210,57,57);
    $this->SetXY(45, 60);
    $this->SetFont('Arial', 'B', 8);
    $this->Cell(10, 8, utf8_decode('Nº'), 0, 0,'C', 1);
    $this->Cell(80.2, 8, utf8_decode('DEPENDENCIA'), 0, 0,'C', 1);
    $this->Cell(30, 8, utf8_decode('CANTIDAD'), 0, 0,'C', 1);
    
    
    

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

    $sql = $conexion -> query ("SELECT *, COUNT(sedes.idsede) AS sedes2 FROM pedir_comida INNER JOIN personal ON pedir_comida.idpersonal = personal.idpersonal INNER JOIN sedes ON personal.idsede = sedes.idsede WHERE pd_ticket = '1' GROUP BY sedes.idsede " );


    $contador = 0;
    while ($row = $sql->fetch_assoc()) {
        $contador ++;
        $pdf->SetX(45);
        $pdf->Cell(10, 8, utf8_decode($contador), 1, 0,'C', 0);
        $pdf->Cell(80, 8, utf8_decode($row['sede']), 1, 0,'C', 0);
        $pdf->Cell(30, 8, utf8_decode($row['sedes2']), 1, 0,'C', 0);
        
    
        
    
        $pdf->Ln(8);
        
    }
        
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFillColor(210,57,57);
    $pdf->SetX(115);
    $pdf->Cell(50, 8, utf8_decode("TOTAL DE COMIDAS:")."  ".$total, 1, 0,'C', 1);
    $pdf->SetFont('Arial','B',10);

    $pdf->SetXY(5, 35);

    $pdf->Output('reporte_solicitud_comida.pdf', 'I');
    exit();
 


