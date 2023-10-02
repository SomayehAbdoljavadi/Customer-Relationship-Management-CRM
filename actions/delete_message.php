<?php
require_once('config.php');
if(!empty($_GET['id'])) {
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM messages WHERE id = $id");
}
?>
<script type="text/javascript">$('#messages').load('pages/ajax/messages.php');</script>