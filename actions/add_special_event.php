<?php
require_once('config.php');
ini_set("display_errors","On");
if(!empty($_GET['message_id']) && !empty($_GET['title']) && !empty($_GET['day']) && !empty($_GET['month'])) {
	$message_id = $_GET['message_id'];
	$title = $_GET['title'];
	$customerId = $_GET['customerId'];
	$month = $_GET['month'];
	$day = $_GET['day'];
	mysqli_query($con,"INSERT INTO special_event (message_id,title,month,day,user_id) VALUES ($message_id,'$title',$month,$day,$customerId)");
}
?>
<script type="text/javascript">$('#events').load('pages/ajax/events.php');</script>