<?php
require_once('config.php');
ini_set("display_errors","On");
if(!empty($_GET['messageText'])) {
	$messageText = $_GET['messageText'];
	$messageOfficial = $_GET['messageOfficial'];
	$messageGender = $_GET['messageGender'];
	$messageEvent = $_GET['messageEvent'];
	$result = mysqli_query($con,"SELECT * FROM messages WHERE text = '$messageText'");
	$row = mysqli_fetch_array($result);
	if(empty($row['id']))
	{
		mysqli_query($con,"INSERT INTO messages (text,event_id,gender,official) VALUES ('$messageText','$messageEvent',$messageGender,$messageOfficial)");
		?>
		<script>$('#alert-msg').text('پیام جدید افضافه شد');$('.alert').slideDown();location.replace('#/messages');</script>
		<?php
	} else 
	{
		?>
		<script>$('#myModalLabel').text('خطا در افزودن پیام');$('#modalText').text("پیام موجود می باشد!");$("#myModal").modal();$('#contactCategory').load('pages/ajax/categories.php');</script>
		<?php
	}
}
?>
<script type="text/javascript">location.replace('#/messages');</script>