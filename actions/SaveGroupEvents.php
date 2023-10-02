<?php
require_once('config.php');
$id = $_GET['id'];
$group = $_GET['group'];
$result = mysqli_query($con,"SELECT * FROM event_group WHERE event_id = $id AND category_id = $group");
$row = mysqli_fetch_array($result);
if(empty($row['id'])) {
	mysqli_query($con,"INSERT INTO event_group (event_id,category_id) VALUES ($id,$group)");
}
?>
<script>$('#events').load('pages/ajax/events.php');$('#myModalLabel').text('تغییر گروه مناسبت ها');$('#modalText').text("تنظیمات با موفقیت ذخیره شد");$("#myModal").modal()</script>