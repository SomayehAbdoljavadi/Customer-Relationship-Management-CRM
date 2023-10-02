<?php
require_once 'config.php';
function reste_syetem($host = DB_HOST,$user = DB_USER,$pass = DB_PASS,$name = DB_NAME) {
  $con = mysqli_connect($host,$user,$pass,$name);
  mysqli_set_charset($con, 'utf8');
  mysqli_query($con,"DELETE FROM custom_tasks ");
  mysqli_query($con,"DELETE FROM tasks ");
  mysqli_query($con,"DELETE FROM customers ");
  mysqli_query($con,"DELETE FROM events WHERE title !='تولد'");
  mysqli_query($con,"DELETE FROM event_group");
  $result = mysqli_query($con,"SELECT * FROM events WHERE title = 'تولد'  ");
  $row = mysqli_fetch_array($result);
  $id = $row['id'];
  mysqli_query($con,"DELETE FROM messages WHERE id != $id") or die(mysqli_error($con));
}

if(!empty($_POST['backupPassword'])) {
	if($_POST['backupPassword'] == "1234") {
		reste_syetem();
    header("location: ".URL."/#backup");
	} else {
		header("location: ".URL."/#backup");
	}
} else {
	header("location: ".URL."/#backup");
}

?>
