<?php
	require_once '../privado/procesos/conexion.php';
	//require_once 'fpdf.php';
	require_once '../privado/reportes/fpdf-blob.php';
	session_start();
	class PDF extends FPDF{
	  function Footer(){
	      $this->SetXY(0,-20);
	      $this->SetFont('Arial','',12);
	      $this->Cell(220,10,''.$this->PageNo().'',0,0,'C');
	    }
	}
	$blob = $_POST['blobimg'];
	$trozo = explode(",", $blob);
	$pdf = new PDF_MemImage('P', 'mm', 'letter');
	$pdf->SetMargins(15, 15 , 15);
	$pdf->SetAutoPageBreak(true,25);
	$pdf->SetFont('Arial','B',12);		
	$pdf->AddPage();
	$pdf->SetTitle("Cotizacion de Productos | Punto Print - Soluciones en impresiones" , true);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(-100,8,"PUNTO PRINT",0,1,'L');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(10,2,"Soluciones en impresion",0,1,'L');
	$pdf->Cell(10,2,'',0,1,'L');
	$pdf->Cell(10,4,"Correo: puntoprintsv@gmail.com",0,1,'L');
	$pdf->Cell(10,2,'',0,1,'L');
	$pdf->Cell(10,2,"Fecha y hora: ". date('d/m/Y H:i:s'),0,1,'L');
	$pdf->Cell(10,2,'',0,1);
	$pdf->SetFont('Arial','B',12);
	//while ($nombre = $stmtnombre->fetch(PDO::FETCH_BOTH)) {
		$pdf->SetXY($pdf->GetX(), $pdf->GetY());
		$pdf->Cell(30,5,"Realizado por:",0,0,'L');		
		$pdf->SetFont('Arial','',12);
		$usuariop = "Anónimo";
		if (isset($_SESSION['email'])){
			$usuariop = $_SESSION['email'];
		}
		$pdf->Cell(80,5,utf8_decode($usuariop),0,1,'L');
	//}
	$pdf->Image("../resources/img/pplogo-provisional.png",175,16,26,24);
	$pdf->Ln(15);
	$pdf->MemImage(base64_decode($trozo[1]),-17,70,250,200);
	//$pdf->MultiCell(40,5,utf8_decode('Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.'),0,'J');
	$pdf->Output();
?>