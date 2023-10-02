<?php
require_once('config.php');
ini_set("display_errors","On");
require_once('jdf.php');
if(!empty($_GET['api']) && !empty($_GET['url']) && !empty($_GET['username']) && !empty($_GET['title'])) {
	$title = $_GET['title'];
	$url = $_GET['url'];
	$password = $_GET['password'];
	$username = $_GET['username'];
	$number = $_GET['number'];
	$signature = $_GET['signature'];
	$api = $_GET['api'];
	$header = $_GET['header'];
	$background = $_GET['background'];
	$sidebar = $_GET['sidebar'];
	if($_SESSION['filename']) {
		$filename = $_SESSION['filename'];
		mysqli_query($con,"UPDATE configuration SET value='$filename' WHERE item='logo'");
	}
	mysqli_query($con,"UPDATE configuration SET value='$signature' WHERE item='signature'");
	mysqli_query($con,"UPDATE configuration SET value='$url' WHERE item='url'");
	mysqli_query($con,"UPDATE configuration SET value='$title' WHERE item='title'");
	mysqli_query($con,"UPDATE configuration SET value='$api' WHERE item='sms_url'");
	mysqli_query($con,"UPDATE configuration SET value='$number' WHERE item='sms_number'");
	mysqli_query($con,"UPDATE configuration SET value='$username' WHERE item='sms_username'");
	mysqli_query($con,"UPDATE configuration SET value='$password' WHERE item='sms_password'");
	mysqli_query($con,"UPDATE configuration SET value='$background' WHERE item='backgroundColor'");
	mysqli_query($con,"UPDATE configuration SET value='$header' WHERE item='headerColor'");
	mysqli_query($con,"UPDATE configuration SET value='$sidebar' WHERE item='sidebarColor'");
?>
<script type="text/javascript">$('#configuration').load('pages/ajax/configuration.php');</script>
<script>$('#alert-msg').text('تنظیمات با موفقیت ذخیره شد');$('.alert').slideDown();</script>
<?php
}
?>