<?php
require_once('../../actions/config.php');
?>
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-3">
		<select class="form-control" id="category" onchange="select_adj();">
			<option value="0"> دسته بندی </option>
			<?php 
			$province_result = mysqli_query($con,"SELECT * FROM category ");
			while($province_row = mysqli_fetch_array($province_result))
			{
				?>
				<option value="<?php echo $province_row['id']; ?>"> <?php echo $province_row['category']; ?> </option>
				<?php
			}
			?>
		</select>
	</div>
	<div class="col-lg-3">
		<select class="form-control" id="official" onchange="select_adj();">
			<option value="0"> رسمیت </option>
			<option value="1" > رسمی </option>
			<option value="2" > غیر رسمی </option>
			<option value="3" > هردو </option>
		</select>
	</div>
	<div class="col-lg-3">
		<select class="form-control" id="gender" onchange="select_adj();">
			<option value="0"> جنسیت </option>
			<option value="1" > مرد </option>
			<option value="2" > زن </option>
			<option value="3" > هردو </option>
		</select>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-12"></div>
	<div class="col-lg-12">
		<div id="load-adj">گروه خود را انتخاب کنید</div>
	</div>
</div>