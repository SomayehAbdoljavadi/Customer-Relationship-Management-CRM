<?php
	require_once('config.php');
	$message = $_POST['message'];
	$time = $_POST['time'] + 100;
	$users = $_SESSION['custom_user_select'];
	$users_string = '';
	foreach($users as $user) {
		$users_string .= $user.',';
	}
	$users_string = rtrim($users_string, ',');
	mysqli_query($con,"INSERT INTO custom_tasks (contacts,date,message,status) VALUES ('$users_string','$time','$message',0)");
	$_SESSION['custom_user_select'] = '';
	header("location: ../#/tasks");
?>