<?php

/******* App user api 
Mobile is required
Other filds are optional
Officials : 1=official  2=unonfficial
Genders : 1=male 2=fmale
Category : category IDs shown in your sms panel ( ex: 1=Gold 2=Silver 3=boronz  )
Title , City , State : same category...

********/

require_once 'config.php';
require_once 'jdf.php';
ini_set("display_errors","On");

if(!empty($_GET['mobile'])) {
// variables 
	$email = (!empty($_GET['email']) ? $_GET['email'] : '');
	$mobile = $_GET['mobile'];
	$name = (!empty($_GET['name']) ? $_GET['name'] : '');
	$family = (!empty($_GET['family']) ? $_GET['family'] : 0);
	$year = (!empty($_GET['year']) ? $_GET['year'] : '');
	$month = (!empty($_GET['month']) ? $_GET['month'] : 0);
	$day = (!empty($_GET['day']) ? $_GET['day'] : 0);
	$title = (!empty($_GET['title']) ? $_GET['title'] : 0);
	$gender = (!empty($_GET['gender']) ? $_GET['gender'] : 3);
	$category = (!empty($_GET['category']) ? $_GET['category'] : 0);
	$state = (!empty($_GET['state']) ? $_GET['state'] : '');
	$city = (!empty($_GET['city']) ? $_GET['city'] : '');
	$address = (!empty($_GET['address']) ? $_GET['address'] : '');
	$postcode = (!empty($_GET['postcode']) ? $_GET['postcode'] : 0);
	$official = (!empty($_GET['official']) ? $_GET['official'] : 3);
	$date = time();
// birthdate
	if($year > 0) {
		$year = '13'.str_replace('13', '', $year);
	}
	if(($day > 0) && ($month > 0) && ($year > 0)) {
		$birthdate = jmktime(0,0,0,$month,$day,$year);
	} else {
		$birthdate = 'asd';
	}


	// check mobile exist
	$result = mysqli_query($con,"SELECT * FROM customers WHERE mobile = '$mobile'");
	$row = mysqli_fetch_array($result);
	if(empty($row['id']))
	{
		mysqli_query($con,"INSERT INTO customers (mobile,birthdate,name,family,title_id,city,email,gender,state,postcode,address,description,official,staff_id,register_date) VALUES ('$mobile','$birthdate','$name','$family',$title,'$city','$email',$gender,'$state',$postcode,'$address','',$official,1,'$date')");

		$contact_result = mysqli_query($con,"SELECT id FROM customers ORDER BY id DESC LIMIT 1");
		$contact_row = mysqli_fetch_array($contact_result);
		$contact_id = $contact_row['id'];
		mysqli_query($con,"INSERT INTO contact_groups (contact_id,category_id) VALUES ($contact_id,$category) ");
		$event_result = mysqli_query($con,"SELECT * FROM events WHERE title LIKE '%تولد%'");
		$event_row = mysqli_fetch_array($event_result);
		if(!empty($event_row['id'])) {
			if(($day > 0) && ($month > 0) && ($year > 0)) {
				$event_id = $event_row['id'];
				$message_result = mysqli_query($con,"SELECT * FROM messages WHERE event_id = $event_id");
				$message_row = mysqli_fetch_array($message_result);
				if(!empty($message_row['id'])) {
					$message_id = $message_row['id'];
					for($i=0;$i<5;$i++) {
						$year  = jdate('Y',time(),'','','en') + $i;
						//$year = $year + $i;
						$send_date = jmktime(0,0,0,$month,$day,$year);
						$message_user_result = mysqli_query($con,"SELECT * FROM tasks WHERE contact_id = $contact_id AND send_date = '$send_date'");
						$message_user_row = mysqli_fetch_array($message_user_result);
						if(empty($message_user_row['id'])){
							mysqli_query($con,"INSERT INTO tasks (contact_id,message_id,send_date,status) VALUES($contact_id,$message_id,'$send_date',0)") or die(mysqli_error());
						}
					}
				}
			}
		}
		echo "Done!";
		exit();

	} else 
	{
		echo "Mobile exist!";
		exit();
	}

} else {
	echo "Mobile is empty";
	exit();
}