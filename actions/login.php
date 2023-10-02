<?php
require_once('config.php');
// if(DB_USER == "root"); {
if(!isset($_POST['sa-captchaText'])){
	header("location: ../?msg=captchaisnull");
	exit();
	exit();
}
//session_start();
if(strtolower($_POST['sa-captchaText']) !== strtolower($_SESSION['sacaptchaCode'])){
	header("location: ../?msg=captchaiswrong");
	exit();
	exit();
}
// }
if(!empty($_POST['email']) && !empty($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$result = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' AND password = '$password'");
	$row = mysqli_fetch_array($result);
	if(empty($row['id'])) {
		rd("../login.php?msg=incorrect");
	} else {
		$id = $row['id'];
		$result_info = mysqli_query($con,"SELECT * FROM user_info WHERE user_id = $id ");
		$row_info = mysqli_fetch_array($result_info);
		$_SESSION['user_info'] = $row;
		$_SESSION['user_info']['name'] = $row_info['name'];
		$_SESSION['user_info']['family'] = $row_info['family'];
		$_SESSION['user_info']['mobile'] = $row_info['mobile'];
		rd(URL);
	}
} else {
	rd("../login.php?msg=incomlate");
}