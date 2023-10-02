<?php
require_once('config.php');
ini_set("display_errors","On");
if(!empty($_GET['id'])) {
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM tasks WHERE id = $id") or die(mysqli_error($con));
}
?>
<script type="text/javascript">$('#tasks').load('pages/ajax/tasks.php');</script>
