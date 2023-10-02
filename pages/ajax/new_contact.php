<?php
require_once("../../actions/config.php");
?>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group col-lg-4">
            <label>سال تولد</label>
            <select tabindex="14" id="contact-birthdate-year" class="form-control" required>
                <option value="0" selected="">نامعلوم</option>
                <?php 
                for($i = 1396;$i>1300;$i--)
                {
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group col-lg-4">
            <label>ماه تولد</label>
            <select tabindex="13" id="contact-birthdate-month" class="form-control" required>
                <option value="00">نا معلوم</option>
                <option value="01">فروردین</option>
                <option value="02">اردیبهشت</option>
                <option value="03">خرداد</option>
                <option value="04">تیر</option>
                <option value="05">مرداد</option>
                <option value="06">شهریور</option>
                <option value="07">مهر</option>
                <option value="08">آبان</option>
                <option value="09">آذر</option>
                <option value="10">دی</option>
                <option value="11">بهمن</option>
                <option value="12">اسفند</option>
            </select>
        </div>
        <div class="form-group col-lg-4">
            <label>روز تولد</label>
            <select id="contact-birthdate-day" tabindex="12" class="form-control" required>
                <option value="0" selected="">نامعلوم</option>
                <?php 
                for($i = 1;$i<32;$i++)
                {
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group col-lg-8">
            <label>ایمیل</label>
            <input class="form-control" id="contact-email" dir="auto" tabindex="16">
        </div>
        <div class="form-group col-lg-4">
            <label>تلفن همراه <font color="red">*</font></label>
            <input class="form-control" required id="contact-mobile" tabindex="15">
        </div>
        <div class="form-group" style="width: 94%;margin-right: 3%;">
            <label>شرح</label>
            <textarea class="form-control" rows="3" id="contact-description" tabindex="17" dir="auto"></textarea>
        </div>  
        &nbsp;&nbsp;
        <button type="submit" class="btn btn-primary " onclick="new_contact()">افزودن مخاطب</button>
    </div>
    <div class="col-lg-6">
        <form role="form">
            <div class="form-group col-lg-6">
                <label>نام خانوادگی </label>
                <input class="form-control" required id="contact-family" tabindex="2">
            </div>
            <div class="form-group col-lg-6">
                <label>نام</label>
                <input class="form-control" id="contact-name" autofocus tabindex="1">
            </div>
            <div class="form-group col-lg-6">
                <label>رسمی / غیر رسمی</label>
                <select class="form-control" required id="contact-official" tabindex="4">
                    <option value="1">1 - رسمی</option>
                    <option value="2">2 - غیر رسمی</option>
                    <option selected="" value="3">3 - نا معلوم</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label>دسته بندی <font color="red">*</font></label>
                <select class="form-control" required id="contact-category"  multiple="multiple" tabindex="3">
                    <?php 
                    $result = mysqli_query($con,"SELECT * FROM category");
                    $i = 0;
                    while($row = mysqli_fetch_array($result)) 
                    {
                        $i += 1;
                        ?>
                        <option <?php if($i == 1) { echo "selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?> - <?php echo $row['category']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label>جنسیت</label>
                <select class="form-control" required id="contact-gender" tabindex="6">
                    <option value="1">1 - آقا</option>
                    <option value="2">2 - خانم</option>
                    <option value="3" selected="">3 - نامعلوم</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label>عنوان</label>
                <select class="form-control" required id="contact-title" tabindex="5">
                    <?php 
                    $result = mysqli_query($con,"SELECT * FROM titles");
                    while($row = mysqli_fetch_array($result)) 
                    {
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?> - <?php echo $row['title']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>				
            <div class="form-group col-lg-6" id="LoadCity">
                <label>شهر</label>
                <input disabled="" class="form-control" id="Contactcity" tabindex="8">
            </div>
            <div class="form-group col-lg-6">
                <label>استان</label>
                <select class="form-control" required id="Contactstate" onchange="load_city($(this).val());" tabindex="7">
                    <option value="0" selected=""> نا معلوم </option>
                    <?php
                    $province_result = mysqli_query($con,"SELECT * FROM province");
                    while($province_row = mysqli_fetch_array($province_result))
                    {
                        ?>
                        <option value="<?php echo $province_row['id']; ?>"><?php echo $province_row['id']; ?> - <?php echo $province_row['name']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>	
            <div class="form-group col-lg-4 ">
                <label>کد پستی</label>
                <input class="form-control"  id="Contactpostcode" tabindex="11">
            </div>
            <div class="form-group col-lg-8">
                <label>آدرس</label>
                <input class="form-control" id="Contactaddress" tabindex="10">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">$('#contact-category').multiselect();</script>