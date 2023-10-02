<?php

require_once("../../actions/config.php");

$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'url'");

$row = mysqli_fetch_array($result);

$url = $row['value'];

$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'title'");

$row = mysqli_fetch_array($result);

$title = $row['value'];

$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'sms_url'");

$row = mysqli_fetch_array($result);

$sms_url = $row['value'];

$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'sms_number'");

$row = mysqli_fetch_array($result);

$sms_number = $row['value'];

$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'signature'");

$row = mysqli_fetch_array($result);

$signature = $row['value'];

$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'sms_username'");

$row = mysqli_fetch_array($result);

$sms_username = $row['value'];

$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'sms_password'");

$row = mysqli_fetch_array($result);

$sms_password = $row['value'];

$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'headerColor'");

$row = mysqli_fetch_array($result);

$headerColor = $row['value'];

$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'sidebarColor'");

$row = mysqli_fetch_array($result);

$sidebarColor = $row['value'];

$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'backgroundColor'");

$row = mysqli_fetch_array($result);

$backgroundColor = $row['value'];

?>

<div class="row">

    <div class="col-lg-6">
<!---->
<!--        <div class="form-group col-lg-12">-->
<!---->
<!--            <label>رنگ پس زمینه </label>-->
<!---->
<!--            <input class="form-control" required id="config-background" dir="auto" value="--><?php //echo $backgroundColor; ?><!--">-->
<!---->
<!--        </div>-->
<!---->
<!--        <div class="form-group col-lg-12">-->
<!---->
<!--            <label>رنگ هدر </label>-->
<!---->
<!--            <input class="form-control" required id="config-header" dir="auto" value="--><?php //echo $headerColor; ?><!--">-->
<!---->
<!--        </div>-->
<!---->
<!--        <div class="form-group col-lg-12">-->
<!---->
<!--            <label>رنگ منو </label>-->
<!---->
<!--            <input class="form-control" required id="config-sidebar" dir="auto" value="--><?php //echo $sidebarColor; ?><!--">-->
<!---->
<!--        </div>-->
<!---->
<!--        <div class="form-group col-lg-12">-->
<!---->
<!--            <label>* پس از تغییر رنگ ها و تصویر لوگو یک بار صفحه را بروز رسانی کنید.</label>-->
<!---->
<!--            <label>* کد رنگ را مانند نمونه وارد کنید. مثال : <span style="visibility: hidden;">s</span>#ddffc9 <a href="https://www.google.com/search?q=color+picker&oq=color+picker&aqs=chrome..69i57l2j69i60l4.2613j0j4&sourceid=chrome&ie=UTF-8" target="_blank"> انتخاب رنگ </a></label>-->
<!---->
<!--            <label>* به علت تیره بودن متن ها لطفا از رنگ های روشن استفاده کنید.</label>-->
<!---->
<!--        </div>-->

  &nbsp;&nbsp;&nbsp;  <label>* جهت تغییر لوگو ، توسط دکمه زیر فایل را انتخاب کرده سپس بر روی دکمه بارگزاری کلیک کنید. در نهایت بر روی ذخیره کلیک نمایید.</label><br>
  &nbsp;&nbsp;&nbsp;  <label>* تغییرات پس از بارگزاری مجدد صفحه قابل مشاهده خواهد بود.</label>
        <div id="upload" class="form-group col-lg-12" ></div>

    </div>

    <div class="col-lg-6">

        <form role="form">

            <div class="form-group col-lg-12">

                <label>آدرس سایت </label>

                <input class="form-control" required id="config-url" dir="auto" value="<?php echo $url; ?>">

            </div>

            <div class="form-group col-lg-12">

                <label>امضای پیامک </label>

                <!-- <input class="form-control" required id="config-signature" dir="auto" value="<?php echo $signature; ?>"> -->
                <textarea class="form-control" rows="3" required id="config-signature" dir="auto"><?php echo $signature; ?></textarea>

            </div>

            <div class="form-group col-lg-12">

                <label>عنوان وبسایت</label>

                <input class="form-control" id="config-title" dir="auto" value="<?php echo $title; ?>">

            </div>

            <div class="form-group col-lg-12">

                <label>آدرس وب سرویس پیامک</label>

                <input class="form-control" id="config-sms-api" dir="auto" value="<?php echo $sms_url; ?>">

            </div>

            <div class="form-group col-lg-12">

                <label>شماره پیامک</label>

                <input class="form-control" id="config-sms-number" dir="auto" value="<?php echo $sms_number; ?>">

            </div>

            <div class="form-group col-lg-12">

                <label>نام کاربری پیامک</label>

                <input class="form-control" id="config-sms-username" dir="auto" value="<?php echo $sms_username; ?>">

            </div>

            <div class="form-group col-lg-12">

                <label>رمزعبور پیامک</label>

                <input class="form-control" id="config-sms-password" dir="auto" value="<?php echo $sms_password; ?>">

            </div>

            <div class="form-group col-lg-12">

                <button type="button" class="btn btn-primary" onclick="save_configuration();"> ذخیره </button>

            </div>

        </form>

    </div>

</div>

<script type="text/javascript">$('#upload').load('actions/upload/upload.php');</script>
