<?php
require_once('config.php');
if(!empty($_GET['id'])) {
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM category WHERE id = $id");
}
?>
<script type="text/javascript">$('#contactCategory').load('pages/ajax/categories.php');</script>