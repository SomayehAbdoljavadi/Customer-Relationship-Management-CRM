<?php
require_once('config.php');
ini_set("display_errors","On");
if(!empty($_GET['categoryText'])) {
	$id = $_GET['id'];
	$categoryText = $_GET['categoryText'];
	mysqli_query($con,"UPDATE category SET category = '$categoryText' WHERE id = $id");
}
?>
<script type="text/javascript">$('#contactCategory').load('pages/ajax/categories.php');</script>