<?php
require_once('config.php');
ini_set("display_errors","On");
if(!empty($_POST['text'])) {
	$id = $_POST['id'];
	$text = $_POST['text'];
	$gender = $_POST['gender'];
	$event_id = $_POST['event_id'];
	$official = $_POST['official'];
	mysqli_query($con,"UPDATE messages SET text = '$text',event_id = $event_id,gender = $gender,official = $official WHERE id = $id");
}

header("location: ../#/messages");
?>