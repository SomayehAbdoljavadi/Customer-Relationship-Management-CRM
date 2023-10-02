<?php
require_once("functions.php");

define('DB_USER', 'myclassir_crm');
define('DB_PASS', 'Gg1EzbLPK');
define('DB_NAME', 'myclassir_crm');
define('DB_HOST', 'localhost');
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($con, 'utf8');
session_start();
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item='url'");
$row = mysqli_fetch_array($result);
$url = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item='title'");
$row = mysqli_fetch_array($result);
$title = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item='sms_url'");
$row = mysqli_fetch_array($result);
$sms_url = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item='sms_number'");
$row = mysqli_fetch_array($result);
$sms_number = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item='sms_username'");
$row = mysqli_fetch_array($result);
$sms_username = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item='sms_password'");
$row = mysqli_fetch_array($result);
$sms_password = $row['value'];
define('URL', $url);
define('TITLE', $title);
define('SMS_API', $sms_url);
define('SMS_NUMBER', $sms_number);
define('SMS_USERNAME', $sms_username);
define('SMS_PASSWORD', $sms_password);
?>