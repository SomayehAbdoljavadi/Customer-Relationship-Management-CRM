<?php
require_once("../../actions/config.php");
require_once("../../actions/jdf.php");
?>
<div class="row">
    <div class="col-lg-12">
        <form role="form">
            <div class="form-group col-lg-5">
                <label>متن پیام</label>
                <textarea class="form-control" rows="3" id="messageText"></textarea>
            </div>	
            <div class="form-group col-lg-2">
                <label>جنسیت</label>
                <select class="form-control" required id="messageGender">
                    <option value="1">مرد</option>
                    <option value="2">زن</option>
                    <option value="3">هردو</option>
            </select>
        </div>
            <div class="form-group col-lg-2">
                <label>رسمی / غیر رسمی</label>
                <select class="form-control" required id="messageOfficial">
                    <option value="1">رسمی</option>
                    <option value="2">غیر رسمی</option>
                    <option value="3">هردو</option>
            </select>
        </div>
        <div class="form-group col-lg-3">
            <label>مناسبت</label>
            <select class="form-control" required id="messageEvent">
                <?php 
                $result = mysqli_query($con,"SELECT * FROM events");
                while($row = mysqli_fetch_array($result)) 
                {
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?>   <?php echo jdate('Y/m/d',$row['date']); ?></option>
                    <?php
                }
                ?>
            </select>
        </div>	
        &nbsp;&nbsp;
        <button type="submit" onclick="new_message();" class="btn btn-default ">افزودن پیام</button>
    </form>
</div>
</div>