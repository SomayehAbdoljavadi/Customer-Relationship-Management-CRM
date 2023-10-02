<?php
require_once("../../actions/config.php");
require_once("../../actions/jdf.php");
if(!empty($_GET['id']))
{
	$id = $_GET['id'];
	$result = mysqli_query($con,"SELECT * FROM customers WHERE id = $id");
	$row = mysqli_fetch_array($result);
	$id = $row['id'];
	if(!empty($row['state'])) {
		$state_id = $row['state'];
	} else {
		$state_id = 0;
	}
	if(!empty($row['title_id'])) {
		$title = $row['title_id'];
		$title_result = mysqli_query($con,"SELECT * FROM titles WHERE id = $title");
		$title_row = mysqli_fetch_array($title_result);
		$title = $title_row['title'];
	} else {
		$title = '';
	}
	if(!empty($row['category_id'])) {
		$category_id = $row['category_id'];
		$category_result = mysqli_query($con,"SELECT * FROM category WHERE id = $category_id");
		$category_row = mysqli_fetch_array($category_result);
		$category = $category_row['category'];
	} else {
		$category = '';
	}
	if(!empty($row['state'])) {
		$state_id = $row['state'];
		$state_result = mysqli_query($con,"SELECT * FROM province WHERE id = $state_id");
		$state_row = mysqli_fetch_array($state_result);
		$state = $state_row['name'];
	} else {
		$state = '';
	}
	if(!empty($row['state'])) {
		$state_id = $row['state'];
		$state_result = mysqli_query($con,"SELECT * FROM province WHERE id = $state_id");
		$state_row = mysqli_fetch_array($state_result);
		$state = $state_row['name'];
	} else {
		$state = '';
	}
	if(!empty($row['city'])) {
		$city_id = $row['city'];
		$city_result = mysqli_query($con,"SELECT * FROM city WHERE id = $city_id");
		$city_row = mysqli_fetch_array($city_result);
		$city = $city_row['name'];
		$city_state_id = $city_row['province_id'];
	} else {
		$city = '';
	}
	if(!empty($row['staff_id'])) {
		$staff_id = $row['staff_id'];
		$staff_result = mysqli_query($con,"SELECT * FROM users WHERE id = $staff_id");
		$staff_row = mysqli_fetch_array($staff_result);
		$staff_id = $staff_row['id'];
		$staff_result = mysqli_query($con,"SELECT * FROM user_info WHERE id = $staff_id");
		$staff_row = mysqli_fetch_array($staff_result);
		$staff = $staff_row['name'].' '.$staff_row['family'];
	} else {
		$staff = '';
	}
	$official = $row['official'];
	if($official == 1) {
		$official = 'رسمی';
	}else{
		$official = 'غیر رسمی';
	}
	$gender = $row['gender'];
	if($gender == 1) {
		$gender = 'مرد';
	}elseif($gender == 2) {
		$gender = 'زن';
	}else{
		$gender = 'هردو';
	}
	if(!empty($row['birthdate'])) {
		$birthdate = jdate('Y/m/d',$row['birthdate']);
	} else {
		$birthdate = '';
	}
	if(!empty($row['register_date'])) {
		$register_date = jdate('Y/m/d',$row['register_date']);
	} else {
		$register_date = '';
	}
	?>
	<form action="<?php echo URL; ?>actions/edit_contact.php" method="post">
		<div class="row">
			<div class="col-lg-4">
				<table class="table">
					<tr>
						<td>
							نام خانوادگی
						</td>
						<td>
							<!-- <?php echo $row['family']; ?> -->
							<input type="text" class="noborder" name="family" value="<?php echo $row['family']; ?>">
							<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
						</td>
					</tr>
					<tr>
						<td>
							تاریخ تولد
						</td>
						<td>
							<!-- <?php echo $birthdate; ?> -->
							<input type="text" class="noborder" name="birthdate" id="contact_edit_birthdate" value="<?php echo $birthdate; ?>">
						</td>
					</tr>
					<tr>
						<td>
							استان
						</td>
						<td>
							<!-- <?php echo $state; ?> -->
							<!-- <input type="text" class="noborder" id="contact_edit_state" value="<?php echo $state; ?>"> -->
							<select class="noborder" name="state">
								<option value="0"> استان </option>
								<?php
								$province_result = mysqli_query($con,"SELECT * FROM province ");
								while($province_row = mysqli_fetch_array($province_result))
								{
									?>
									<option value="<?php echo $province_row['id']; ?>" <?php if($row['state'] == $province_row['id']){ echo "selected"; } ?>> <?php echo $province_row['name']; ?> </option>
									<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							کد پستی
						</td>
						<td>
							<!-- <?php echo $row['postcode']; ?> -->
							<input type="text" class="noborder" name="postcode" value="<?php echo $row['postcode']; ?>">
						</td>
					</tr>
					<tr>
						<td>
							رسمیت
						</td>
						<td>
							<!-- <?php echo $official; ?> -->
							<!-- <input type="text" class="noborder" id="contact_edit_official" value="<?php echo $official; ?>"> -->
							<select class="noborder" name="official">
								<option value="3"> نا معلوم </option>
								<option value="1" <?php if($row['official'] == 1){ echo "selected"; } ?>> رسمی </option>
								<option value="2" <?php if($row['official'] == 2){ echo "selected"; } ?>> غیر رسمی </option>
							</select>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-lg-4">
				<table class="table">
					<tr>
						<td>
							نام
						</td>
						<td>
							<input type="text" class="noborder" name="name" value="<?php echo $row['name']; ?>">
						</td>
					</tr>
					<tr>
						<td>
							ایمیل
						</td>
						<td>
							<!-- <?php echo $row['email']; ?> -->
							<input type="text" class="noborder" name="email" value="<?php echo $row['email']; ?>">
						</td>
					</tr>
					<tr>
						<td>
							دسته بندی
						</td>
						<td>
							<select class="form-control" name="categorie" required id="contact-category" onchange="var cats = $(this).val(); $('#categories').val(cats);" multiple="multiple" tabindex="3">
									<?php
									$category_result = mysqli_query($con,"SELECT * FROM category");
									$i = 0;
									while($category_row = mysqli_fetch_array($category_result))
									{
										$category_id = $category_row['id'];
										$cateories = '';
										$category_group_result = mysqli_query($con,"SELECT * FROM contact_groups WHERE contact_id = $id AND category_id = $category_id");
										$category_group_row = mysqli_fetch_array($category_group_result);
										if(!empty($category_group_row['id'])) {
											$category_selected = "selected";
										} else {
											$category_selected = "";
										}
											$i += 1;
											?>
											<option <?php echo $category_selected; ?> value="<?php echo $category_row['id']; ?>"><?php echo $category_row['id']; ?> - <?php echo $category_row['category']; ?></option>
											<?php
									}
									?>
							</select>
							<input type="hidden" name="categories" value="nochange" id="categories" />
						</td>
					</tr>
					<tr>
						<td>
							آدرس
						</td>
						<td>
							<!-- <?php echo $row['address']; ?> -->
							<input type="text" class="noborder" name="address" value="<?php echo $row['address']; ?>">
						</td>
					</tr>
					<tr>
						<td>
							ثبت کننده :
						</td>
						<td>
							<?php echo $staff; ?>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-lg-4">
				<table class="table">
					<tr>
						<td>
							ID
						</td>
						<td>
							<?php echo $id; ?>
						</td>
					</tr>


					<tr>
						<td>
							همراه
						</td>
						<td>
							<!-- <?php echo $row['mobile']; ?> -->
							<input type="text" class="noborder" name="mobile" value="<?php echo $row['mobile']; ?>">
						</td>
					</tr>
					<tr>
						<td>
							عنوان
						</td>
						<td>
							<!-- <?php echo $title; ?> -->
							<!-- <input type="text" class="noborder" id="contact_edit_title" value="<?php echo $title; ?>"> -->
							<select class="noborder" name="title">
								<option value="0"> عنوان </option>
								<?php
								$title_result = mysqli_query($con,"SELECT * FROM titles ");
								while($title_row = mysqli_fetch_array($title_result))
								{
									?>
									<option value="<?php echo $title_row['id']; ?>" <?php if($row['title_id'] == $title_row['id']){ echo "selected"; } ?>> <?php echo $title_row['title']; ?> </option>
									<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							شهر
						</td>
						<td>
							<!-- <?php echo $city; ?> -->
							<!-- <input type="text" class="noborder" id="contact_edit_city" value="<?php echo $city; ?>"> -->
							<select class="noborder" name="city">
								<option value="0"> شهر </option>
								<?php
								$province_result = mysqli_query($con,"SELECT * FROM city WHERE province_id = $state_id ");
								while($province_row = mysqli_fetch_array($province_result))
								{
									?>
									<option value="<?php echo $province_row['id']; ?>" <?php if($row['city'] == $province_row['id']){ echo "selected"; } ?>> <?php echo $province_row['name']; ?> </option>
									<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							تاریخ ثبت
						</td>
						<td>
							<?php echo $register_date; ?>
						</td>
					</tr>
					<tr>
						<td>
							جنسیت
						</td>
						<td>
							<!-- <?php echo $gender; ?> -->
							<select class="noborder" name="gender">
								<option value="0"> نامعلوم </option>
								<option value="1" <?php if($row['gender'] == 1){ echo "selected"; } ?>> مرد </option>
								<option value="2" <?php if($row['gender'] == 2){ echo "selected"; } ?>> زن </option>
							</select>
							<!-- <input type="text" class="noborder" id="contact_edit_gender" value="<?php echo $gender; ?>"> -->
						</td>
					</tr>
					<tr>
						<td>
							توضیحات
						</td>
						<td>
							<!-- <?php echo $row['description']; ?> -->
							<input type="text" class="noborder" name="description" id="contact_edit_description" value="<?php echo $row['description']; ?>">
						</td>
					</tr>
				</table>
			</div>
		</div>
		<?php
	}
	?>
	<style>
	.noborder {
		border: none !important;
		width: 100% !important;
	}
	.modal-dialog {
		right: auto;
		left: 50%;
		width: 900px !important;
		padding-top: 30px;
		padding-bottom: 30px;
	}
</style>
<button type="submit" class="btn btn-primary"> ویرایش </button>
<button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
</form>
<script type="text/javascript">$('#contact-category').multiselect();</script>
