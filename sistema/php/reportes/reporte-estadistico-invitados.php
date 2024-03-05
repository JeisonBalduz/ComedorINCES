
<?php
date_default_timezone_set("America/Caracas");


if (strlen($_GET['desde'])>0 ){
    $desde = $_GET['desde'];
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


if (strlen($_GET['hasta'])>0 ){
    $desde = $_GET['hasta'];
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




if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0 ){
 
    $desde = $_GET['desde'];
    $hasta = $_GET['hasta'];

    $verDesde = date('d/m/Y', strtotime($desde));
    $verHasta = date('d/m/Y', strtotime($hasta));
    $verHasta2 = $verHasta;

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
    $desayuno = current($conexion ->query("SELECT COUNT(idinvitados) FROM invitados WHERE comida_invitado='desayuno' AND fecha_inv BETWEEN  '$desde' AND '$hasta'")->fetch_assoc() );
    
    //Conbsulta SQL para las fechas (Almuerzo)
    $almuerzo = current($conexion ->query("SELECT COUNT(idinvitados) FROM invitados WHERE comida_invitado='almuerzo' AND fecha_inv BETWEEN  '$desde' AND '$hasta'")->fetch_assoc() );
    
    //Conbsulta SQL para las fechas (cena)
    $cena = current($conexion ->query("SELECT COUNT(idinvitados) FROM invitados WHERE comida_invitado='cena'AND fecha_inv BETWEEN  '$desde' AND '$hasta' ")->fetch_assoc() );
    $total = current($conexion->query("SELECT COUNT(idinvitados) FROM invitados WHERE fecha_inv BETWEEN  '$desde' AND '$hasta'")->fetch_assoc() );
    
    require('conexion.php');
    require_once ('fpdf/fpdf.php');
    class PDF extends FPDF
    {
    
    function Header()
    {
        global $total;
        global $diahoy;
        global $verDesde;
        global $verHasta;
    
        $this->Image('repimg/inces2.0.png',2,3,45);
        $this->Image('repimg/tuerca.png', 160,-20,60);
        
        $this->SetY(12);
        $this->SetX(65);
        $this->SetFont('Arial','B', 9);
        
        
        $this->Cell(50, 8, 'REPORTE DE TABLA DE COMIDA DE INVITADOS',0,1);
        
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
        $this->Cell(50, 8,utf8_decode('Invitados:')." ".$total,0,1);
        
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
        $this->Cell(30, 8, utf8_decode('Día:').$verDesde." "."Hasta:".$verHasta);
    
        $this->SetY(23);
        $this->SetX(78.2);
        $this->SetFont('Arial','',8);
        //.$this->Image('repimg/inces.png', 0, 0, 100)
        
        
        
    
    
    // Datos totales de las comidas solicitadas
    global $desayuno;
    global $almuerzo;
    global $cena;
    

    
    
    $this->SetTextColor(255, 255, 255);
    $this->Ln(12);
    
    $this->SetFillColor(210,57,57);
    $this->SetXY(1.8, 68);
    $this->SetFont('Arial', 'B', 6);
    $this->Cell(10, 8, utf8_decode('Nº'), 0, 0,'C', 1);
    $this->Cell(18.2, 8, utf8_decode('CÉDULA'), 0, 0,'C', 1);
    $this->Cell(33, 8, utf8_decode('NOMBRE Y APELLIDO'), 0, 0,'C', 1);
    $this->Cell(47, 8, utf8_decode('DEPENDENCIA'), 0, 0,'C', 1);
    $this->Cell(16, 8, utf8_decode('ESTATUS'), 0, 0,'C', 1);
    $this->Cell(16, 8, utf8_decode('COMIDA'), 0, 0,'C', 1);
    $this->Cell(32, 8, utf8_decode('FECHAS Y HORA'), 0, 0,'C', 1);
    $this->Cell(17, 8, utf8_decode('IDEN_USUARIO'), 0, 0,'C', 1);
    $this->Cell(18, 8, utf8_decode('CÉDULA'), 0, 0,'C', 1);
    
    
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
    
    $productos = ("SELECT *, UPPER(invitados.nombre_invi) 
    AS nombre_mayusculas, UPPER(invitados.apellido_invi) 
    AS apellido_mayusculas, DATE_FORMAT(fecha_inv, '%d-%m-%Y') AS fecha_español
    FROM invitados 
    INNER JOIN usuario ON invitados.id_usuario_invi = usuario.idusuario 
    WHERE  fecha_inv BETWEEN  '$desde' AND '$hasta'");
    $resultado = mysqli_query($conexion, $productos);
    $contador = 0;
    if ($resultado) {
        while ($row = mysqli_fetch_array($resultado)) {
            $contador  ++;
            $pdf->SetFont('Arial','',7);
            $pdf->SetX(2);
            $pdf->Cell(10, 8, utf8_decode($contador), 1, 0,'C', 0);
            $pdf->Cell(18, 8, utf8_decode($row['cedula_invi']), 1, 0,'C', 0);
            $pdf->Cell(33, 8, utf8_decode($row['nombre_mayusculas'])." ".utf8_decode($row['apellido_mayusculas']), 1, 0,'C', 0);
            $pdf->Cell(47, 8, utf8_decode($row['sede_inivitado']), 1, 0,'C', 0);
            $pdf->Cell(16, 8, utf8_decode($row['estatus_invitado']), 1, 0,'C', 0);
            $pdf->Cell(16, 8, utf8_decode($row['comida_invitado']), 1, 0,'C', 0);
            $pdf->Cell(32, 8, utf8_decode($row['fecha_español']).'-'.$row['hora_inv'], 1, 0,'C', 0);
            $pdf->Cell(17, 8, utf8_decode($row['usuario']), 1, 0,'C', 0);
            $pdf->Cell(18, 8, utf8_decode($row['cedula_usuario']), 1, 0,'C', 0);
        
            $pdf->Ln(8);
            
        }
    }
    
    
    
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFillColor(210,57,57);
    $pdf->SetX(164);
    $pdf->Cell(45, 8, utf8_decode("TOTAL DE INVITADOS:"." ".$total), 1, 0,'C', 1);
    $pdf->SetFont('Arial','B',10);
    
    $pdf->SetXY(5, 35);
    
    $pdf->Output('reporte_tabla_invitados .pdf', 'I');
    
    
    
   } 
 
?>
    