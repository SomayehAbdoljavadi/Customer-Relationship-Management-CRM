<?php
require_once('config.php');
ini_set("display_errors","On");
if(!empty($_GET['title'])) {
	$title = $_GET['title'];
	$result = mysqli_query($con,"SELECT * FROM titles WHERE title = '$title'");
	$row = mysqli_fetch_array($result);
	if(empty($row['id']))
	{
		mysqli_query($con,"INSERT INTO titles (title) VALUES ('$title')");
		?>
		<script>$('#alert-msg').text('عنوان جدید اضافه شد');$('.alert').slideDown();$('#admins').load('pages/ajax/admins.php');</script>
		<?php
	} else 
	{
		?>
		<script>$('#myModalLabel').text('خطا در افزودن عنوان');$('#modalText').text("عنوان موجود می باشد!");$("#myModal").modal()</script>
		<?php
	}
}
?>
<script type="text/javascript">$('#contactTitles').load('pages/ajax/titles.php');</script>