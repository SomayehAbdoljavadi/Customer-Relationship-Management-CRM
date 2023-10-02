<?php
require_once('config.php');
require_once('jdf.php');
ini_set("display_errors","On");
if(!empty($_GET['mobile']) && (strlen($_GET['mobile']) == 11)) {
	$year = $_GET['year'];
	$month = $_GET['month'];
	$day = $_GET['day'];
	$email = $_GET['email'].'';
	$mobile = $_GET['mobile'].'';
	$description = $_GET['description'].'';
	$family = $_GET['family'].'';
	$name = $_GET['name'].'';
	$official = $_GET['official'];
	$category = $_GET['category'];
	$categories = explode(',', $category);
	$gender = $_GET['gender'];
	$title = $_GET['title'].'';
	$city = $_GET['city'];
	$state = $_GET['state'];
	$postcode = $_GET['postcode'];
	if(!empty($_GET['postcode'])) {
		$postcode = $_GET['postcode'];
	} else {
		$postcode = 0;
	}
	$staff_id = $_SESSION['user_info']['id'];
	$date = time();
	$address = $_GET['address'].'';
	$result = mysqli_query($con,"SELECT * FROM customers WHERE mobile = '$mobile'");
	$row = mysqli_fetch_array($result);
	if(($day > 0) && ($month > 0) && ($year > 0)) {
		$birthdate = jmktime(0,0,0,$month,$day,$year);
	} else {
		$birthdate = '';
	}
	if(empty($row['id']))
	{
		mysqli_query($con,"INSERT INTO customers (mobile,birthdate,name,family,title_id,city,email,gender,state,postcode,address,description,official,staff_id,register_date) VALUES ('$mobile','$birthdate','$name','$family',$title,'$city','$email',$gender,'$state',$postcode,'$address','$description',$official,$staff_id,'$date')");

		?>
		<script>$('#alert-msg').text('مخاطب جدید اضافه شد');$('.alert').slideDown();$('#customers').load('pages/ajax/customers.php');location.replace('#/customers');</script>
		<?php
	} else 
	{

		?>
		<script>$('#myModalLabel').text('خطا در افزودن مخاطب');$('#modalText').text("شماره همراه موجود میباشد!");$("#myModal").modal();$('#customers').load('pages/ajax/customers.php');</script>
		<?php
		exit();
	}
	$contact_result = mysqli_query($con,"SELECT id FROM customers ORDER BY id DESC LIMIT 1");
	$contact_row = mysqli_fetch_array($contact_result);
	$contact_id = $contact_row['id'];
	foreach ($categories as $cat) {
		mysqli_query($con,"INSERT INTO  contact_groups (contact_id,category_id) VALUES ($contact_id,$cat) ");
	}
	$event_result = mysqli_query($con,"SELECT * FROM events WHERE title LIKE '%تولد%'");
	$event_row = mysqli_fetch_array($event_result);
	if(!empty($event_row['id'])) {
		if(($day > 0) && ($month > 0) && ($year > 0)) {
			$event_id = $event_row['id'];
			$message_result = mysqli_query($con,"SELECT * FROM messages WHERE event_id = $event_id");
			$message_row = mysqli_fetch_array($message_result);
			if(!empty($message_row['id'])) {
				$message_id = $message_row['id'];
				for($i=0;$i<10;$i++) {
					$year  = jdate('Y',time(),'','','en') + $i;
				//$year = $year + $i;
					$send_date = jmktime(0,0,0,$month,$day,$year);
					$message_user_result = mysqli_query($con,"SELECT * FROM tasks WHERE contact_id = $contact_id AND send_date = '$send_date'");
					$message_user_row = mysqli_fetch_array($message_user_result);
					if(empty($message_user_row['id'])){
						mysqli_query($con,"INSERT INTO tasks (contact_id,message_id,send_date,status) VALUES($contact_id,$message_id,'$send_date',0)") or die(mysqli_error());
					}
				}
			}
		}
	}
	?>
<script type="text/javascript">$('#customers').load('pages/ajax/customers.php');</script>
<?php
} else {
    ?>
    <script>
        alert("لطفا شماره همراه را به صورت صحیح وارد کنید");
    </script>
<?php
}
?>