<?php 
	require_once '../procesos/conexion.php';
	require_once '../procesos/autenticar.php';
	require_once 'fpdf.php';
	$nombre = "";
	$producto = 0;
	$nombreprod = array();
	if (isset($_POST['productos']))
		$producto = $_POST['productos'];
	else
		header('Location: reporteria');

	if ($producto == 0)
		header('Location: reporteria');

	class PDF extends FPDF{
	  function Footer(){
	      $this->SetXY(0,-20);
	      $this->SetFont('Arial','',12);
	      $this->Cell(220,10,''.$this->PageNo().'',0,0,'C');
	    }
	}
	if(!empty($_SESSION['autenticadop'])){     
      $nombre = $_SESSION['autenticadop'];
      $sql = "SELECT CONCAT(nombre_usuario,' ',apellido_usuario) FROM usuarios WHERE correo_usuario=?";
      $correo = $_SESSION['emailc'];
      $stmt = $con->prepare($sql);
      $stmt->execute(array($correo));
      $nomb = $stmt->fetch(PDO::FETCH_BOTH);
      $nombre = $nomb[0];
    }
    
    $sqlnombrep = "SELECT p.nombre_producto FROM productos p WHERE p.id_producto=?";
    $stmtnombre = $con->prepare($sqlnombrep);
    $stmtnombre->execute(array($producto));
    $nombreprod = $stmtnombre->fetch(PDO::FETCH_BOTH);

	$pdf = new PDF('P', 'mm', 'letter');
	$pdf->SetMargins(15, 15 , 15); 
	$pdf->SetAutoPageBreak(true,25);
	$pdf->SetFont('Arial','B',12);		
	$pdf->AddPage();
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
		$pdf->Cell(80,5,"Usuario:",0,1,'L');
		$pdf->SetXY($pdf->GetX()+18, $pdf->GetY() - 5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,5,utf8_decode($nombre),0,1,'L');
	//}
	$pdf->Image("../../resources/img/pplogo-provisional.png",175,16,26,24);

	$pdf->SetFont('Arial','B',12);
	$pdf->Ln(5);
	$pdf->Cell(190,15,'LISTADO DE MEDIDAS DE:',0,1,'C');
	$pdf->Ln(1);
	$pdf->Cell(190,0,strtoupper($nombreprod[0]),0,1,'C');
	$pdf->Ln(6);
	$pdf->SetFillColor(232,232,232);
 
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,8,'MEDIDA',1,0,'C',1);
	$pdf->Cell(90,8,'CANTIDAD DE VECES COMPRADA',1,0,'C',1);
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',10);
	$sql = "SELECT md.id_medida,md.medida FROM productos p, medidas_producto md, carritos c WHERE p.id_producto = md.id_producto AND c.id_carrito = md.id_medida AND p.id_producto=1";
	$stmt = $con->prepare($sql);
	$stmt->execute(array());
	while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
		$pdf->Cell(90,10,utf8_decode($datos[1]),1,0,'C',0);

		$sqlcompra = "SELECT COUNT(c.id_carrito) FROM carritos c, medidas_producto md WHERE c.id_medida = md.id_medida AND c.recogido=? AND md.id_medida=?";
		$stmtcompra = $con->prepare($sqlcompra);
		$stmtcompra->execute(array(1,$datos[0]));
		while ($comprado = $stmtcompra->fetch(PDO::FETCH_BOTH)) {
			$pdf->Cell(90,10,utf8_decode($comprado[0]),1,0,'C',0);	
		}
		$pdf->Ln(10);
	}
	$pdf->SetTitle("Listado de tipos de productos | Punto Print - Soluciones en impresiones" , true);
	//$pdf->MultiCell(40,5,utf8_decode('Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.'),0,'J');
	//$pdf->MultiCell(40,5,utf8_decode('Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.'),0,'J');
	$pdf->Output();
?>