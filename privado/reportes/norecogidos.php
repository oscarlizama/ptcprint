<?php 
	session_start();
	require_once '../procesos/conexion.php';
	$fecha_cl = null;
	date_default_timezone_set("America/El_Salvador");
	if(isset($_POST['fechacl']))
		$fecha_cl = $_POST['fechacl'];
	else
		$fecha_cl = date("Y-m-d");
	if(!empty($_SESSION['autenticado'])){     
      $nombre = $_SESSION['autenticado'];
      $sql = "SELECT * FROM clientes WHERE correo_cliente=?";
      $correo = $_SESSION['email'];
      $stmt = $con->prepare($sql);
      $stmt->execute(array($correo));
      $nomb = $stmt->fetch(PDO::FETCH_BOTH);
      $nombre = $nomb[1];
      $id_cl = $nomb[0];
    }

	require_once 'fpdf.php';

	if ($fecha_cl == null) {
		$fechassql = "SELECT c.fecha_solicitud FROM carritos c, clientes cl WHERE cl.id_cliente = c.id_cliente AND cl.id_cliente=? GROUP BY c.fecha_solicitud";
		$stmtfecha = $con->prepare($fechassql);
		$stmtfecha->execute(array($id_cl));
	}
	
	$nombresql = "SELECT CONCAT(cl.nombre_cliente,' ',cl.apellido_cliente) FROM clientes cl WHERE id_cliente=?";
	$stmtnombre = $con->prepare($nombresql);
	$stmtnombre->execute(array($id_cl));
	//$header = array();
	///array_push($header, "HOLAA");
	//array_push($header, "HOLAA22");
	
	//$resultset = array();
	class PDF extends FPDF{
	  function Footer(){
	      $this->SetXY(0,-20);
	      $this->SetFont('Arial','',12);
	      //$this->Line($this->GetX(),$this->GetY(),$this->GetX()+100,$this->GetY());
	      //$this->Write(5,'Punto Print | Soluciones en impresion');
	      $this->Cell(220,10,''.$this->PageNo().'',0,0,'C');
	      //$this->Cell(190,10,"PUNTO PRINT",0,0,'C');
	    }
	}
	//$pdf = new PDF('P','mm',array(100,150));
	$pdf = new PDF('P', 'mm', 'letter');
	//$pdf->SetMargins($pdf->SetMargins(30, 25 , 30); ); 
	$pdf->SetMargins(15, 15 , 15); 
	$pdf->SetAutoPageBreak(true,25);
	//$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);		
	/*while ($resultado = $stmt->fetch(PDO::FETCH_BOTH)) {
		$resultset[] = $resultado;
	}*/
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
	while ($nombre = $stmtnombre->fetch(PDO::FETCH_BOTH)) {
		$pdf->SetXY($pdf->GetX(), $pdf->GetY());
		$pdf->Cell(80,5,"Cliente:",0,1,'L');
		$pdf->SetXY($pdf->GetX()+17, $pdf->GetY() - 5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,5,utf8_decode($nombre[0]),0,1,'L');
	}
	$pdf->Image("../../resources/img/pplogo-provisional.png",175,16,26,24);

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,20,'COMPROBANTE DE PRODUCTOS NO RECOGIDOS',0,1,'C');

	$pdf->SetFillColor(232,232,232);
 
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(50,6,'PRODUCTO',1,0,'C',1);
	$pdf->Cell(60,6,'MEDIDA',1,0,'C',1);
	$pdf->Cell(40,6,'TIPO',1,0,'C',1);
	$pdf->Cell(35,6,'FECHA',1,0,'C',1);
	$pdf->Ln(6);
	/*if ($fecha_cl == null) {
		while ($fecha = $stmtfecha->fetch(PDO::FETCH_BOTH)) {
			$pdf->Cell(50,5,'',0,1);
			$pdf->SetFont('Arial','B',12);
			$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
			$pdf->Cell(80,5,"Fecha:",0,1,'L');
			$pdf->SetXY($pdf->GetX()+25, $pdf->GetY() - 5);
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(80,5,$fecha[0],0,1,'L');
			$sql = "SELECT p.nombre_producto,md.medida FROM productos p, carritos c, medidas_producto md WHERE c.id_cliente=? AND p.id_producto = md.id_producto AND c.id_medida = md.id_medida AND c.fecha_solicitud=?";
			$stmt = $con->prepare($sql);
			$stmt->execute(array($id_cl,$fecha[0]));
			while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
				$pdf->Cell(80,2,'',0,1,'L');
				$pdf->SetFont('Arial','B',12);
				$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
				$pdf->Cell(80,5,"Producto:",0,1,'L');
				$pdf->SetXY($pdf->GetX()+25, $pdf->GetY() - 5);
				$pdf->SetFont('Arial','',12);
				$pdf->Cell(80,5,$datos[0],0,1,'L');

				$pdf->Cell(80,2,'',0,1,'L');
				$pdf->SetFont('Arial','B',12);
				$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
				$pdf->Cell(80,5,"Medida:",0,1,'L');
				$pdf->SetXY($pdf->GetX()+25, $pdf->GetY() - 5);
				$pdf->SetFont('Arial','',12);
				$pdf->Cell(80,5,$datos[1],0,1,'L');

				$pdf->Cell(80,2,'',0,1,'L');
				$pdf->SetFont('Arial','B',12);
				$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
				$pdf->Cell(80,5,"Tipo:",0,1,'L');
				$pdf->SetXY($pdf->GetX()+25, $pdf->GetY() - 5);
				$pdf->SetFont('Arial','',12);
				$pdf->Cell(80,5,"Diseño preestablecido",0,1,'L');
			}
		}
	}else{*/
		//echo "HOLAA";
	/*$pdf->Cell(70,10,"HASHAAH",1,0,'L',0);
   	$pdf->Cell(35,10,"hsgdhasghjsgjsha",1,0,'R',1);
	//Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila
 	$pdf->Cell(40,10,"jsgdjhsadghas", 1, 0, 'C', false );
 	$pdf->Cell(40,10,"jsgdjhsadghas", 1, 0, 'C', false );
 
	$pdf->Ln(15);*/
	/*$
	$pdf->Cell(50,5,'',0,1);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
	$pdf->Cell(80,5,"Fecha:",0,1,'L');
	$pdf->SetXY($pdf->GetX()+25, $pdf->GetY() - 5);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(80,5,$fecha_cl,0,1,'L');
	$pdf->Cell(80,2,'',0,1,'L');*/
	$sql = "SELECT p.nombre_producto,md.medida,c.fecha_solicitud FROM productos p, carritos c, medidas_producto md WHERE c.id_cliente=? AND p.id_producto = md.id_producto AND c.id_medida = md.id_medida AND c.fecha_solicitud=? AND c.recogido=0";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($id_cl,$fecha_cl));
	$pdf->SetFont('Arial','',10);
	while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
		$pdf->Cell(50,10,$datos[0],1,0,'L',0);
	   	$pdf->Cell(60,10,$datos[1],1,0,'C',0);
		//Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila
	 	$pdf->Cell(40,10,utf8_decode("Diseño preestablecido"), 1, 0, 'C', false );
	 	$pdf->Cell(35,10,$datos[2], 1, 0, 'C', false );
		$pdf->Ln(10);
		/*$pdf->Cell(80,5,'',0,1,'L');
		$pdf->SetFont('Arial','B',12);
		$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
		$pdf->Cell(80,5,"Producto:",0,1,'L');
		$pdf->SetXY($pdf->GetX()+25, $pdf->GetY() - 5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,5,utf8_decode($datos[0]),0,1,'L');

		$pdf->Cell(80,2,'',0,1,'L');
		$pdf->SetFont('Arial','B',12);
		$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
		$pdf->Cell(80,5,"Medida:",0,1,'L');
		$pdf->SetXY($pdf->GetX()+25, $pdf->GetY() - 5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,5,utf8_decode($datos[1]),0,1,'L');

		$pdf->Cell(80,2,'',0,1,'L');
		$pdf->SetFont('Arial','B',12);
		$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
		$pdf->Cell(80,5,"Tipo:",0,1,'L');
		$pdf->SetXY($pdf->GetX()+25, $pdf->GetY() - 5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,5,utf8_decode("Diseño preestablecido"),0,1,'L');*/
	}
	$sql = "SELECT a.nombre_archivo, p.fecha_pedido FROM archivos a, pedidos p, clientes cl, conversaciones c WHERE a.id_archivo = p.id_archivo AND cl.id_cliente=? AND p.fecha_pedido=? AND cl.id_cliente = c.id_cliente AND c.id_conversacion = a.id_conversacion AND p.recogido=0";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($id_cl,$fecha_cl));
	while ($datos = $stmt->fetch(PDO::FETCH_BOTH)) {
		$pdf->Cell(50,10,$datos[0],1,0,'L',0);
	   	$pdf->Cell(60,10,"----------",1,0,'C',0);
		//Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila
	 	$pdf->Cell(40,10,utf8_decode("Diseño personalizado"), 1, 0, 'C', false );
	 	$pdf->Cell(35,10,$datos[1], 1, 0, 'C', false );
		$pdf->Ln(10);
		/*$pdf->Cell(80,5,'',0,1,'L');
		$pdf->SetFont('Arial','B',12);
		$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
		$pdf->Cell(80,5,"Producto:",0,1,'L');
		$pdf->SetXY($pdf->GetX()+25, $pdf->GetY() - 5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,5,utf8_decode($datos[0]),0,1,'L');

		$pdf->Cell(80,2,'',0,1,'L');
		$pdf->SetFont('Arial','B',12);
		$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
		$pdf->Cell(80,5,"Medida:",0,1,'L');
		$pdf->SetXY($pdf->GetX()+25, $pdf->GetY() - 5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,5,utf8_decode($datos[1]),0,1,'L');

		$pdf->Cell(80,2,'',0,1,'L');
		$pdf->SetFont('Arial','B',12);
		$pdf->SetXY($pdf->GetX()+1, $pdf->GetY());
		$pdf->Cell(80,5,"Tipo:",0,1,'L');
		$pdf->SetXY($pdf->GetX()+25, $pdf->GetY() - 5);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,5,utf8_decode("Diseño personalizado"),0,1,'L');*/
	}
	//}
	

	//$pdf->Cell(80,5,'Oscar Lizama',0,1,'L');
	//$pdf->Cell(80,5,'Fecha:',0,1,'L');
	//$pdf->Cell(80,5,'Producto:',0,1,'L');
	//$pdf->Cell(80,5,utf8_decode('Descripción:'),0,1,'L');
	$pdf->SetFont('Arial','',12);
	$pdf->SetTitle("Comprobante de pedido - Punto Print | Soluciones en impresiones" , true);
	//$pdf->MultiCell(40,5,utf8_decode('Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.'),0,'J');
	//$pdf->MultiCell(40,5,utf8_decode('Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.'),0,'J');
	$pdf->Output();
?>