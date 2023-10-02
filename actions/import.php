<?php
require_once 'config.php';
require_once 'PHPExcel.php';
require_once 'functions.php';
// $file = time().'.xlsx';
$file = 'import.xlsx';
$_FILES["fileToUpload"]["tmp_name"];
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 'excels/'.$file);
$objPHPExcel = PHPExcel_IOFactory::load('excels/'.$file);
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$i = 0;
$contacts = array();
foreach ($sheetData as $data) {
	if($i > 0) {
		// var_dump($data);
		$name = $data['A'];
		$family = $data['B'];
		$mobile = $data['C'];
		$email = $data['D'];
		$day = $data['E'];
		$month = $data['F'];
		$year = $data['G'];
		if((!empty($day)) && (!empty($month)) && (!empty($year))) {
			$birthdate = birthdate($day,$month,$year);
		} else {
			$birthdate = '';
		}
		$gender = $data['H'];
		$state = $data['I'];
		$city = $data['J'];
		$address = $data['K'];
		$description = $data['L'];
		$postcode = $data['M'];
		$official = $data['N'];
		$contacts[$i-1] = add_contact($con,$name,$family,$mobile,$email,$birthdate,$gender,$state,$data['J'],$address,$description,$data['N'],$postcode);
	}
	$i += 1;
}

//print_r($contacts);
header("location:../#/customers");
?>
