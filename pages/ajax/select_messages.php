<?php
require_once("../../actions/config.php");
$result = mysqli_query($con,"SELECT * FROM messages");
?>
<label>انتخاب پیام</label>
<select class="form-control" required id="message_id">
	<?php
	while($row = mysqli_fetch_array($result))
	{
		?>
		<option value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></option>
		<?php
	}
	?>
</select>