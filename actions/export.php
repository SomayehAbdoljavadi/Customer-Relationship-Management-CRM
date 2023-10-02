<?php
require_once 'config.php';
require_once 'jdf.php';
require_once 'PHPExcel.php';
require_once 'functions.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'نام')
->setCellValue('B1', 'نام خانوادگی')
->setCellValue('C1', 'تلفن همراه')
->setCellValue('D1', 'ایمیل')
->setCellValue('E1', 'روز تولد')
->setCellValue('F1', 'ماه تولد')
->setCellValue('G1', 'سال تولد')
->setCellValue('H1', 'جنسیت')
->setCellValue('I1', 'استان')
->setCellValue('J1', 'شهر')
->setCellValue('K1', 'آدرس')
->setCellValue('L1', 'توضیحات')
->setCellValue('M1', 'کد پستی')
->setCellValue('N1', 'رسمی / غیر رسمی');
$result = mysqli_query($con,"SELECT * FROM customers");
$i = 2;
while($row = mysqli_fetch_array($result)){
	if(!empty($row['birthdate'])) {
		$birthdate = $row['birthdate'];
		$birthdate = jdate('Y/m/d',$birthdate,'','','en');
		$birthdate = explode('/', $birthdate);
		$day = $birthdate[2];
		$month = $birthdate[1];
		$year = $birthdate[0];
	} else {
		$day = '';
		$month = '';
		$year = '';
	}
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $row['name']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $row['family']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $row['mobile']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $row['email']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, $day);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $month);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $year);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, $row['gender']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, $row['state']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$i, $row['city']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$i, $row['address']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i, $row['description']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i, $row['postcode']);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$i, $row['official']);
	$i += 1;
}
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="contacts.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>