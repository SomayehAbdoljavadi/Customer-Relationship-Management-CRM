<?php
require_once('config.php');
ini_set("display_errors","On");
require_once('jdf.php');
if(!empty($_GET['title']) && !empty($_GET['year']) && !empty($_GET['month']) && !empty($_GET['day']) && !empty($_GET['id'])) {
	$id = $_GET['id'];
	$title = $_GET['title'];
	$year = $_GET['year'];
	$month = $_GET['month'];
	$day = $_GET['day'];
	$date = jmktime(0,0,0,$month,$day,$year);
	mysqli_query($con,"UPDATE events SET title='$title',date='$date' WHERE id=$id");
}
?>
<script type="text/javascript">$('#events').load('pages/ajax/events.php');</script>