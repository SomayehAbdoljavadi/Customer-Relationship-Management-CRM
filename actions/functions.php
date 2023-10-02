<?php
require_once('jdf.php');
function rd($page) {
	header("location: $page");
}
function get_today() {
	$now = jdate("Y/m/d",time(),"","","en");
	$now = explode("/", $now);
	$year = $now[0];
	$month = $now[1];
	$day = $now[2];
	$today = jmktime(0,0,0,$month,$day,$year);
	return $today;
}
function add_contact($con,$name='',$family='',$mobile='',$email='',$birthdate='',$gender=1,$state=1,$city_a='',$address='',$description='',$official=3,$postcode=0) {
	if($official == 'رسمی' || $official == 1) {
		$official = 1;
	} elseif($official == 3) {
		$official = 3;
	} else {
		$official = 2;
	}
	if($gender == 'خانم' || $gender == 'زن' || $gender == 2) {
		$gender = 2;
	} elseif($gender == 3) {
		$gender = 3;
	} else {
		$gender = 1;
	}
	// $city_result = mysqli_query($con,"SELECT * FROM city WHERE name = '$city'");
	// $city_row = mysqli_fetch_array($city_result);
	// $city = $city_row['id'];
	// $state_result = mysqli_query($con,"SELECT * FROM province WHERE name LIKE '%$state%'");
	// $state_row = mysqli_fetch_array($state_result);
	// $state = $state_row['id'];
	if(!empty($mobile)) {
		$result = mysqli_query($con,"SELECT * FROM customers WHERE mobile = '$mobile'");
		$row = mysqli_fetch_array($result);
		if(empty($row['id'])) {
			mysqli_query($con,"INSERT INTO customers (category_id,postcode,title_id,name,family,mobile,email,birthdate,gender,state,city,address,description,official) VALUES (1,$postcode,1,'$name','$family','$mobile','$email','$birthdate',$gender,'$state','$city','$address','$description',$official)") or die(mysqli_error($con));
			return $mobile;
		} else {
			$id = $row['id'];
			if(!empty($name)) {
				mysqli_query($con,"UPDATE customers SET name='$name' WHERE id = $id");
			}
			if(!empty($family)) {
				mysqli_query($con,"UPDATE customers SET family='$family' WHERE id = $id");
			}
			if(!empty($email)) {
				mysqli_query($con,"UPDATE customers SET email='$email' WHERE id = $id");
			}
			if(!empty($gender)) {
				mysqli_query($con,"UPDATE customers SET gender=$gender WHERE id = $id");
			}
			if(!empty($birthdate)) {
				mysqli_query($con,"UPDATE customers SET birthdate=$birthdate WHERE id = $id");
			}
			if(!empty($address)) {
				mysqli_query($con,"UPDATE customers SET address='$address' WHERE id = $id");
			}
			if(!empty($postcode)) {
				mysqli_query($con,"UPDATE customers SET postcode=$postcode WHERE id = $id");
			}
			if(!empty($state)) {
				mysqli_query($con,"UPDATE customers SET state='$state' WHERE id = $id");
			}
			if(!empty($city_a)) {
				mysqli_query($con,"UPDATE customers SET city='$city_a' WHERE id = $id");
			}
			if(!empty($official)) {
				mysqli_query($con,"UPDATE customers SET official=$official WHERE id = $id");
			}
		}
	}
}
function birthdate($day,$month,$year) {
	if(strlen($day) == 1) {
		$day = '0'.$day;
	}
	if(strlen($month) == 1) {
		$month = '0'.$month;
	}
	if(strlen($year) == 2) {
		echo $year = '13'.$year;
	}
	return $birthdate = jmktime(0,0,0,$month,$day,$year);
}
