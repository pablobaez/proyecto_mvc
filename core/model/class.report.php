<?php
class Reportes
{

public function reporteExcel()
{
if (PHP_SAPI == 'cli')
	die('Este ejemplo sólo se puede ejecutar desde un navegador Web');

/** Incluye PHPExcel */
require_once ('core/libs/PHPExcel/PHPExcel.php'); //'/Classes/PHPExcel.php';
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("Dpto Fisica")
							 ->setLastModifiedBy("Dpto Fisica")
							 ->setTitle("Office 2010 XLSX Documento de Notas")
							 ->setSubject("Office 2010 XLSX Documento de Notas")
							 ->setDescription("generado usando clases de PHP.")
							 ->setKeywords("office 2010 openxml php")
							 ->setCategory("Archivo con resultado de prueba");



// Combino las celdas desde A1 hasta E1
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E1');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NOTAS LABORATORIO')
            ->setCellValue('A3', 'PROFESOR')
						->setCellValue('A4', 'ASIGNATURA')
						->setCellValue('A5', 'SECCION')
            ->setCellValue('A6', 'RUT')
						->setCellValue('B6', 'NOMBRE')
						->setCellValue('C6', 'REP')
            ->setCellValue('D6', 'INF1')
						->setCellValue('E6', 'INF2')
						->setCellValue('F6', 'P1')
						->setCellValue('G6', 'P2');

// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
$fondocell = array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => F8F32B));

$objPHPExcel->getActiveSheet()
						->getStyle('A6:G6')
						->getFill()
						->applyFromArray($boldArray);
						//->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
						//->getStarColor()->setARGB('FFEEEEEE');

$objPHPExcel->getActiveSheet()
												->getStyle('A3:B5')
												->getFill()
												->applyFromArray($fondocell);


//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(7);

/*Extraer datos de MYSQL*/


  $pdo = new Conexion();
	session_start();
	$cantidad =$_POST["cantidadhidden"];
	$asig=$_POST["codigoasignatura"];
	$secc=$_POST["seccionhidden"];
	//$secc=$_SESSION["seccion"];
	//$profe=$_POST["nombreprofe"];
	$rutprofesor=$_SESSION["k_username"];
	$result_1=$pdo->query("select RutAlumno, Alumno, RutProfesor from maestro where RutProfesor='$rutprofesor' and CodigoRamo='$asig' and Seccion='$secc' order by Alumno Asc");
	$nombreprofesor=$pdo->query("select NombreProfesor from profesor where RutProfesor='$rutprofesor'");
	$nombreasignatura=$pdo->query("SELECT Asignatura from ramo WHERE Codigo ='$asig'");
	$row1=$nombreprofesor->fetch(PDO::FETCH_ASSOC);
	$row2=$nombreasignatura->fetch(PDO::FETCH_ASSOC);
	$NombreProfesor=$row1["NombreProfesor"];
	$NombreAsignatura=$row2["Asignatura"];



	$b1="B3";
	$b2="B4";
	$b3="B5";
	$objPHPExcel->setActiveSheetIndex(0)
								->setCellValue($b1, $NombreProfesor)
									->setCellValue($b2, $NombreAsignatura)
										->setCellValue($b3, $secc);





	$cel=7;//Numero de fila donde empezara a crear  el reporte
	while ($row=$result_1->fetch(PDO::FETCH_ASSOC))
	{
    $RutAlumno=$row['RutAlumno'];
    $Alumno=$row['Alumno'];
		$result_2=$pdo->query("SELECT Reporte,Informe1,Informe2,Prueba1,Prueba2 from Notas where RutAlumno='$RutAlumno'");
		$notas=$result_2->fetch(PDO::FETCH_ASSOC);
		$Reporte=$notas['Reporte'];
		$Informe1=$notas['Informe1'];
		$Informe2=$notas['Informe2'];
		$Prueba1=$notas['Prueba1'];
		$Prueba2=$notas['Prueba2'];

			$a="A".$cel;
			$b="B".$cel;
			$c="C".$cel;
			$d="D".$cel;
			$e="E".$cel;
			$f="F".$cel;
			$g="G".$cel;

			// Agregar datos
			$objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue($a, $RutAlumno)
                      ->setCellValue($b, $Alumno)
												->setCellValue($c, $Reporte)
                         	->setCellValue($d, $Informe1)
                          	->setCellValue($e, $Informe2)
			                        ->setCellValue($f, $Prueba1)
                                 ->setCellValue($g, $Prueba2);

	$cel+=1;
	}

/*Fin extracion de datos MYSQL*/
$rango="A6:$g";
$datosprofe="A3:B5";
$promedio="PROMEDIO(C7:G7)";
$styleArray0= array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$styleArray1= array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray0);
$objPHPExcel->getActiveSheet()->getStyle($datosprofe)->applyFromArray($styleArray1);

// $objPHPExcel->getActiveSheet()->setCellValue('H7',"'PROMEDIO'(C7:G7)");
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Reporte de Notas');


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit;
}

public function reportePDF()
{
	require("core/libs/fpdf/fpdf.php");
	$pdo = new Conexion();
	session_start();
	$RutProfesor=$_SESSION["k_username"];
	$Asignatura=$_POST["codigoasignatura"];
	$Seccion=$_POST["seccionhidden"];
	$alumnos=$pdo->query("select RutAlumno, Alumno from Maestro where RutProfesor='$RutProfesor' and CodigoRamo= '$Asignatura' and Seccion='$Seccion' order by Alumno Asc");
	$profesor=$pdo->query("select NombreProfesor from Profesor where RutProfesor='$RutProfesor'");
	$asignatura=$pdo->query("select Asignatura from Ramo where codigo='$Asignatura'");
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 10);
	$pdf->Image('styles/img/LogoUtem.jpg' , 10 ,8, 10 , 13,'jpg');
	$pdf->Cell(10, 5, '', 0);
	$pdf->Cell(150, 5, 'Universidad Tecnologica Metropolitana', 0);
	//$pdf->Cell(150, 10, 'Departamento de Fisica', 0);
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(50, 5, 'Fecha: '.date('d-m-Y').'', 0);
	$pdf->Ln(3);

	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(20, 5, '', 0);
	$pdf->Cell(150, 5, 'Departamento de Fisica', 0);
	$pdf->Ln(15);

	$pdf->SetFont('Arial', 'B', 15);
	$pdf->Cell(70, 8, '', 0);
	$pdf->Cell(100, 8, 'NOTAS ALUMNOS', 0);
	$pdf->Ln(15);

	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(30, 8, 'PROFESOR', 0);
	$pdf->Cell(5, 8, ':', 0);
	$pdf->SetFont('Arial', '', 12);
	$rowprofe=$profesor->fetch(PDO::FETCH_ASSOC);
	$pdf->Cell(100, 8, $rowprofe[NombreProfesor], 0);
	$pdf->Ln(5);

	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(30, 8, 'ASIGNATURA', 0);
	$pdf->Cell(5, 8, ':', 0);
	$pdf->SetFont('Arial', '', 12);
	$rowasig=$asignatura->fetch(PDO::FETCH_ASSOC);
	$pdf->Cell(100, 8, $rowasig[Asignatura], 0);
	$pdf->Ln(5);

	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(30, 8, 'SECCION', 0);
	$pdf->Cell(5, 8, ':', 0);
	$pdf->SetFont('Arial', '', 12);
	$pdf->Cell(100, 8, $Seccion, 0);
	$pdf->Ln(10);

	//Cabecera tabla
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(20, 8, 'RUT', 0);
	$pdf->Cell(60, 8, 'NOMBRE', 0);
	$pdf->Cell(20, 8, '<REPORT>', 0);
	$pdf->Cell(15, 8, 'INFO-1', 0);
	$pdf->Cell(15, 8, 'INFO-2', 0);
	$pdf->Cell(15, 8, 'P-1', 0);
	$pdf->Cell(15, 8, 'P-2', 0);
	$pdf->Cell(20, 8, 'NOTA FINAL', 0);
	$pdf->Ln(8);
	$pdf->SetFont('Arial', '', 8);





	while ($row_1=$alumnos->fetch(PDO::FETCH_ASSOC))
	{
		$RutAlumno=$row_1['RutAlumno'];
		$notas=$pdo->query("select Reporte,Informe1,Informe2,Prueba1,Prueba2 from Notas where RutAlumno= '$RutAlumno'");
		$row_2=$notas->fetch(PDO::FETCH_ASSOC);
		$pdf->Cell(20, 8,$row_1['RutAlumno'], 0);
		$pdf->Cell(60, 8,$row_1['Alumno'], 0);
		$pdf->Cell(20, 8,$row_2['Reporte'], 0);
		$pdf->Cell(15, 8,$row_2['Informe1'], 0);
		$pdf->Cell(15, 8,$row_2['Informe2'], 0);
		$pdf->Cell(15, 8,$row_2['Prueba1'], 0);
		$pdf->Cell(15, 8,$row_2['Prueba2'], 0);
		$pdf->Cell(20, 8,$row_2[''], 0);
		$pdf->Ln(8);
	}
		$pdf->Output();
}
}
?>
