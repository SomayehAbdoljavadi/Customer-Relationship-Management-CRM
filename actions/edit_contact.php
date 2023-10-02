<?php
require_once('config.php');
ini_set("display_errors","On");
if(!empty($_POST['id'])) {
	$id = $_POST['id'];
	// echo $id;
	$name = $_POST['name'];
	$family = $_POST['family'].'';
	$mobile = $_POST['mobile'];
	$email = $_POST['email'].'';
	$address = $_POST['address'].'';
	$title_id = $_POST['title'];
	$gender = $_POST['gender'];
	$city = $_POST['city']+0;
	$description = $_POST['description'].'';
	if(empty($_POST['state'])) {
		$state = 0;
	} else {
		$state = $_POST['state'];
	}
	if(empty($_POST['postcode'])) {
		$postcode = 0;
	} else {
		$postcode = $_POST['postcode'];
	}
	$official = $_POST['official'];
	mysqli_query($con,"UPDATE customers SET mobile='$mobile',name='$name',family='$family',email='$email',address='$address',city='$city',state='$state',description='$description',postcode=$postcode,official=$official,title_id=$title_id,gender=$gender WHERE id = $id");
  if($_POST['categories'] != "nochange") {
		$category_id = $_POST['categories'];
		$categories = explode(',', $category_id);
		mysqli_query($con,"DELETE FROM  contact_groups WHERE contact_id = $id ");
		foreach ($categories as $cat) {
			mysqli_query($con,"INSERT INTO  contact_groups (contact_id,category_id) VALUES ($id,$cat) ");
		}
	}
}
header("location: ../#/customers");
?>
