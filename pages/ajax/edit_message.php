<?php
require_once("../../actions/config.php");
$id = $_GET['id'];
$result = mysqli_query($con,"SELECT * FROM messages WHERE id = $id");
$row = mysqli_fetch_array($result);
?>
<div class="panel-body">
  <div class="row">
    <div class="col-lg-12">
      <form role="form" action="actions/edit_message.php" method="post">
        <div class="form-group col-lg-5">
          <label>متن پیام</label>
          <textarea class="form-control" rows="3" name="text"><?php echo $row['text']; ?></textarea>
          <input type="hidden" value="<?php echo $id; ?>" name="id" />
        </div>
        <div class="form-group col-lg-2">
          <label>جنسیت</label>
          <select class="form-control" required="" name="gender">
            <option value="1" <?php if($row['gender'] == 1){ echo "selected"; } ?>>مرد</option>
            <option value="2" <?php if($row['gender'] == 2){ echo "selected"; } ?>>زن</option>
            <option value="3" <?php if($row['gender'] == 3){ echo "selected"; } ?>>هردو</option>
          </select>
        </div>
        <div class="form-group col-lg-2">
          <label>رسمی / غیر رسمی</label>
          <select class="form-control" required="" name="official">
            <option value="1" <?php if($row['official'] == 1){ echo "selected"; } ?>>رسمی</option>
            <option value="2" <?php if($row['official'] == 2){ echo "selected"; } ?>>غیر رسمی</option>
            <option value="2" <?php if($row['official'] == 3){ echo "selected"; } ?>>هردو</option>
          </select>
        </div>
        <div class="form-group col-lg-3">
          <label>مناسبت</label>
          <select class="form-control" required="" name="event_id">
            <?php
            $event_result = mysqli_query($con,"SELECT * FROM events");
            while($event_row = mysqli_fetch_array($event_result))
            {
              ?>
              <option value="<?php echo $event_row['id']; ?>" <?php if($row['event_id'] == $event_row['id']){ echo "selected"; } ?>><?php echo $event_row['title']; ?></option>
              <?php
            }
            ?>
          </select>

        </div>
        &nbsp;&nbsp;
        <button type="submit" class="btn btn-primary"> ویرایش </button>
<button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
      </form>
    </div>
  </div>
</div>
