<?php
	require_once '../procesos/conexion.php';
	require_once '../procesos/autenticar.php';
	//require_once 'fpdf.php';
	require_once 'fpdf-blob.php';
	date_default_timezone_set("America/El_Salvador");
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
    $pdf = new PDF_MemImage('P', 'mm', 'letter');
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
	$pdf->Image("../resources/img/pplogo-provisional.png",175,16,26,24);
	$pdf->Ln(15);
	//obtener valores
	$productoBlob = $_POST['producto'];
	$sqlProd = "SELECT p.nombre_producto nombre, fp.foto_producto foto FROM productos p, fotos_productos fp WHERE p.id_producto = fp.id_producto AND fp.foto_producto = ? AND fp.estado_foto_producto = ?";
	$stmtProd = $con->prepare($sqlProd);
	$stmtProd->execute(array($productoBlob,1));
	$datosProd = $stmtProd->fetch(PDO::FETCH_BOTH);
	$productoNombre = $datosProd["nombre"];
	$productoIMG = $datosProd["foto"];
	$tiempo = $_POST['tiempo'];
	$equipo = $_POST['equipo'];
	$sqlEquipo = "SELECT e.equipo equipo, e.costo_click_equipo costoclick FROM equipos e WHERE e.id_equipo = ? AND e.estado_equipo = ?";
	$stmtEquipo = $con->prepare($sqlEquipo);
	$stmtEquipo->execute(array($equipo,1));
	$datosEquipo = $stmtEquipo->fetch(PDO::FETCH_BOTH);
	$equipoNombre = $datosEquipo['equipo'];
	$equipoCostoClick = $datosEquipo['costoclick'];
	$actividad = $_POST['actividad'];
	$sqlActv = "SELECT m.actividad actividad, m.costo_hora costop60m FROM mano_obra m WHERE m.id_actividad = ? AND m.estado_obra = ?";
	$stmtActv = $con->prepare($sqlActv);
	$stmtActv->execute(array($actividad,1));
	$datosActv = $stmtActv->fetch(PDO::FETCH_BOTH);
	$actividadNombre = $datosActv['actividad'];
	$actividadprecio = $datosActv['costop60m'];
	$preciob = $_POST['PrecioBase'];
	$clicks = $_POST['clicks'];
	//fin
	$pdf->SetFont('Arial','BUI',14);
	$pdf->Cell(190,20,'COTIZACION DE PRODUCTO',0,1,'C');
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(80,19,"Producto:",0,1,"L");
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(80,2,"   ".$productoNombre,0,1,"L");
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(27,19,"Precio Base:",0,1,"L");
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(80,2,"   $ ". $preciob,0,1,"L");
	$pdf->MemImage(base64_decode($productoIMG),115,77,70,60);
	$pdf->Ln(25);
	$pdf->SetFont('Arial','BU',12);
	$pdf->Cell(80,5,"Equipo utilizado ",0,0,"C");
	$pdf->Cell(100,5,"Actividad Realizada ",0,1,"C");
	$pdf->SetFont('Arial','',12);
	$pdf->Ln(3);
	$pdf->Cell(80,5,"".$equipoNombre,0,0,"C");
	$pdf->Cell(100,5," ".$actividadNombre,0,1,"C");
	$pdf->Ln(4);
	$pdf->SetFont('Arial','BU',12);
	$pdf->Cell(80,5,"Costo por Click",0,0,"C");
	$pdf->Cell(100,5,"Costo por hora ",0,1,"C");
	$pdf->SetFont('Arial','',12);
	$pdf->Ln(3);
	$pdf->Cell(80,5,"$ ".$equipoCostoClick,0,0,"C");
	$pdf->Cell(100,5," $ ".$actividadprecio,0,1,"C");
	$pdf->Ln(4);
	$pdf->SetFont('Arial','BU',12);
	$pdf->Cell(80,5,"Clicks Realizados",0,0,"C");
	$pdf->Cell(100,5,"Minutos trabajados ",0,1,"C");
	$pdf->SetFont('Arial','',12);
	$pdf->Ln(3);
	$pdf->Cell(80,5,$clicks." Clicks",0,0,"C");
	$pdf->Cell(100,5," ".$tiempo." minutos",0,1,"C");
	$pdf->Ln(8);
	$pdf->Cell(80,5,"Total por uso de equipo: $ ".($equipoCostoClick*$clicks),0,0,"C");
	$pdf->Cell(100,5,"Total por mano de obra: $". (($actividadprecio/60)*$tiempo),0,1,"C");
	$pdf->Ln(16);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(180,10,"Total Cotizado: $".(($equipoCostoClick*$clicks) + (($actividadprecio/60)*$tiempo) + $preciob),0,1,"C");
	$pdf->SetTitle("Cotizacion de Productos | Punto Print - Soluciones en impresiones" , true);
	//$pdf->MultiCell(40,5,utf8_decode('Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.'),0,'J');
	$pdf->Output();
?>