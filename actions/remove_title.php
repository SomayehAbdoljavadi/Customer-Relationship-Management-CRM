<?php
require_once('config.php');
if(!empty($_GET['id'])) {
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM titles WHERE id = $id");
}
?>
<script type="text/javascript">('#contactTitles').load('pages/ajax/titles.php');</script>