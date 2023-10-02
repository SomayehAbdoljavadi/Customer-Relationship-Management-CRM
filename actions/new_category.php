<?php
require_once('config.php');
ini_set("display_errors","On");
if(!empty($_GET['category'])) {
	$category = $_GET['category'];
	$result = mysqli_query($con,"SELECT * FROM category WHERE category = '$category'");
	$row = mysqli_fetch_array($result);
	if(empty($row['id']))
	{
		mysqli_query($con,"INSERT INTO category (category) VALUES ('$category')");
		?>
		<script>$('#alert-msg').text('دسته جدید اضافه شد');$('.alert').slideDown();$('#categoryTitles').load('pages/ajax/categories.php');</script>
		<?php
	} else 
	{
		?>
		<script>$('#myModalLabel').text('خطا در افزودن دسته');$('#modalText').text("دسته بندی موجود می باشد!");$("#myModal").modal();$('#contactCategory').load('pages/ajax/categories.php');</script>
		<?php
	}
}
?>
<script type="text/javascript">$('#categoryTitles').load('pages/ajax/categories.php');</script>