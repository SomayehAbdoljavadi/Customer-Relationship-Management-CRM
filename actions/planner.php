<?php
require_once('config.php');
require_once('functions.php');
require_once('jdf.php');	
ini_set("display_errors","On");
function create_task($contact_id,$message_id,$send_date,$con) {
	$result = mysqli_query($con,"SELECT * FROM tasks WHERE contact_id = $contact_id AND message_id = $message_id AND send_date = '$send_date' ");
	$row = mysqli_fetch_array($result);
	if(empty($row['id'])) {
		mysqli_query($con,"INSERT INTO tasks (contact_id,message_id,send_date,status) VALUES ($contact_id,$message_id,'$send_date',0) ");
	}
}
function now() {
	$now = time();
	$today = jdate('Y-m-d',$now,'','','en');
	$array = explode('-', $today);
	$today_string = jmktime(0,0,0,$array[1],$array[2],$array[0]);
	$day = $array[2];
	$month = $array[1];
	$year = $array[0];
	return jmktime(0,0,0,$month,$day,$year);
}
$now = now();
$result = mysqli_query($con,"SELECT customers.id AS customer_id ,events.date AS send_date,messages.id AS message_id
 FROM customers,events,messages,event_group,contact_groups,category 
 WHERE messages.event_id = events.id AND category.id = contact_groups.category_id AND contact_groups.contact_id = customers.id AND category.id = event_group.category_id
 AND events.id = event_group.event_id
 AND (messages.gender = 3 OR customers.gender = messages.gender OR customers.gender = 3)
 AND (messages.official = 3 OR customers.official = messages.official OR customers.official = 3) 
 AND events.date = '$now'");
while($row = mysqli_fetch_array($result)) {
	create_task($row['customer_id'],$row['message_id'],$row['send_date'],$con);
}
header("location:../#/tasks");