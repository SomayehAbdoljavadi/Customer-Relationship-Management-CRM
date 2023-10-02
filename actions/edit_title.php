<?php
require_once('config.php');
ini_set("display_errors","On");
if(!empty($_GET['titleText'])) {
	$id = $_GET['id'];
	$titleText = $_GET['titleText'];
	mysqli_query($con,"UPDATE titles SET title = '$titleText' WHERE id = $id");
}
?>
<script type="text/javascript">$('#contactTitles').load('pages/ajax/titles.php');</script>