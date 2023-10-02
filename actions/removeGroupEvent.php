<?php
require_once('config.php');
$id = $_GET['id'];
$group = $_GET['group'];
mysqli_query($con,"DELETE FROM `event_group` WHERE id = $group");
?>
<script>$('#events').load('pages/ajax/events.php');</script>