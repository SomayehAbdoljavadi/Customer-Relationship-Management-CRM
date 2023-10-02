<?php
require_once('config.php');
ini_set("display_errors","On");
require_once('jdf.php');
if(!empty($_GET['title']) && !empty($_GET['year']) && !empty($_GET['month']) && !empty($_GET['day'])) {
	$title = $_GET['title'];
	$year = $_GET['year'];
	$month = $_GET['month'];
	$day = $_GET['day'];
	$date = jmktime(0,0,0,$month,$day,$year);
	mysqli_query($con,"INSERT INTO events (title,date) VALUES ('$title','$date')");
}
?>
<script type="text/javascript">$('#events').load('pages/ajax/events.php');</script>