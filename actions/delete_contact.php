<?php
require_once('config.php');
if(!empty($_GET['id'])) {
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM customers WHERE id = $id");
	mysqli_query($con,"DELETE FROM special_event WHERE user_id = $id");
}
?>
<script type="text/javascript">$('#customers').load('pages/ajax/customers.php');</script>