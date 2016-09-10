<?php 
	require_once '../procesos/conexion.php';
	require_once 'fpdf.php';
	$sql = "SELECT nombre_producto FROM productos WHERE estado_producto=1";
	$header = array();
	array_push($header, "HOLAA");
	//array_push($header, "HOLAA22");
	$stmt = $con->prepare($sql);
	$stmt->execute(array());
	$resultset = array();
	class PDF extends FPDF{
	  function Footer(){
	      $this->SetXY(100,-15);
	      $this->SetFont('Arial','',8);
	      //$this->Line($this->GetX(),$this->GetY(),$this->GetX()+100,$this->GetY());
	      $this->Write(5,'                              Punto Print | Soluciones en impresion   ');
	      $this->Line($this->GetX()-72,$this->GetY()-2,$this->GetX()+20,$this->GetY()-2);
	      $this->Line($this->GetX()-72,$this->GetY()-2.3,$this->GetX()+20,$this->GetY()-2.3);
	    }
	}
	$pdf = new PDF();
	$pdf->SetMargins(5, 10 , 0); 
	//$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);		
	while ($resultado = $stmt->fetch(PDO::FETCH_BOTH)) {
		$resultset[] = $resultado;
	}
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(-100,8,'PUNTO PRINT',0,1,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(10,2,'Soluciones en impresion',0,1,'L');
	$pdf->Cell(10,2,'',0,1,'L');
	$pdf->Cell(10,4,'Correo: puntoprintsv@gmail.com',0,1,'L');
	$pdf->Cell(10,5,'',0,1);
	$pdf->Image('../img/tw.jpg',75,11.5,16,15);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(95,10,'COMPROBANTE DE PEDIDO',0,1,'C');

	$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
	$pdf->Cell(80,5,'Cliente:',0,1,'L');
	$pdf->SetXY($pdf->GetX()+15, $pdf->GetY() - 5);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(80,5,'Oscar Lizama',0,1,'L');

	$pdf->SetFont('Arial','B',8);
	$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
	$pdf->Cell(80,5,'Fecha:',0,1,'L');
	$pdf->SetXY($pdf->GetX()+15, $pdf->GetY() - 5);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(80,5,'2016/04/01',0,1,'L');

	$pdf->SetFont('Arial','B',8);
	$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
	$pdf->Cell(80,5,'Producto:',0,1,'L');
	$pdf->SetXY($pdf->GetX()+15, $pdf->GetY() - 5);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(80,5,'Banner X',0,1,'L');

	//$pdf->Cell(80,5,'Oscar Lizama',0,1,'L');
	//$pdf->Cell(80,5,'Fecha:',0,1,'L');
	//$pdf->Cell(80,5,'Producto:',0,1,'L');
	//$pdf->Cell(80,5,utf8_decode('Descripción:'),0,1,'L');
	$pdf->SetFont('Arial','',8);
	$pdf->SetTitle("Comprobante de pedido - Punto Print | Soluciones en impresiones" , true);
	//$pdf->MultiCell(40,5,utf8_decode('Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.'),0,'J');
	//$pdf->MultiCell(40,5,utf8_decode('Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.'),0,'J');
	$pdf->Output();
?>