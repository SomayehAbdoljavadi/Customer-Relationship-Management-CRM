<?php
require_once("config.php");
if (
	!empty($_GET['name']) &&
	!empty($_GET['family']) &&
	!empty($_GET['access']) &&
	!empty($_GET['email']) &&
	!empty($_GET['password']) &&
	!empty($_GET['repassword'])
) {
	$name = $_GET['name'];
	$family = $_GET['family'];
	$email = $_GET['email'];
	$access = $_GET['access'];
	$password = $_GET['password'];
	$repassword = $_GET['repassword'];
	$mobile = $_GET['mobile'].'';
	if($password == $repassword) {
		$result = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
		$row = mysqli_fetch_array($result);
		$id = $row['id'] + 1;
		if(!empty($row['id'])) {
			// user email exist!
			?>
			<script>$('#myModalLabel').text('خطا در افزودن کاربر');$('#modalText').text("ایمیل قبلا ثبت شده است");$("#myModal").modal()</script>
			<?php
		} else {
			mysqli_query($con,"INSERT INTO users (email,password,access) VALUES ('$email','$password',$access)");
			$result = mysqli_query($con,"SELECT * FROM users ORDER BY id DESC LIMIT 1");
			$row = mysqli_fetch_array($result);
			$id = $row['id'];
			mysqli_query($con,"INSERT INTO user_info (name,family,mobile,user_id) VALUES ('$name','$family','$mobile',$id)");
			?>
			
			<script>$('#alert-msg').text('کاربر با موفقیت اضافه شد');$('.alert').slideDown();$('#admins').load('pages/ajax/admins.php');</script>
			<?php
		}
	} else {
		// passwords is not match!
		?>
		<script>$('#myModalLabel').text('خطا در افزودن کاربر');$('#modalText').text("رمز عبور و تکرار رمز عبور باهم برابر نیست!");$("#myModal").modal()</script>
		<?php
	}
} else {
	?>
	<script>$('#myModalLabel').text('خطا در افزودن کاربر');$('#modalText').text("لطفا فرم را تکمیل کنید");$("#myModal").modal()</script>
	<?php
}