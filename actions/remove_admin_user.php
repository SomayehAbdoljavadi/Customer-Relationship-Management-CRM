<?php
require_once('config.php');
if(!empty($_GET['id'])) {
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM users WHERE id = $id");
	mysqli_query($con,"DELETE FROM user_info WHERE user_id = $id");
}