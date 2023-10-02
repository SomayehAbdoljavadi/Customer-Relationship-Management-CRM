<?php
require_once("../../actions/config.php");
$id = $_GET['id'];
$result = mysqli_query($con,"SELECT * FROM category");
?>
<div class="panel-body">
	<div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
						<div class="col-lg-2">
							<button type="button" class="btn btn-primary" onclick="saveGroupEvent(<?php echo $_GET['id']; ?>,$('#GroupEventSelect').val());" data-dismiss="modal">افزودن</button>
						</div>
            <div class="col-lg-9">
<select class="form-control" id="GroupEventSelect">
	<?php
	while($row = mysqli_fetch_array($result))
	{
		?>
		<option value="<?php echo $row['id']; ?>"> <?php echo $row['category']; ?> </option>
		<?php
	}
	?>
</select>
<br>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
