<?php
require_once('config.php');
if(!empty($_GET['id'])) {
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM events WHERE id = $id");
}