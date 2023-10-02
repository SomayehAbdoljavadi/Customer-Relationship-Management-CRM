<?php
require_once("../../actions/config.php");
require_once("../../actions/jdf.php");
$id = $_GET['id'];
$result = mysqli_query($con,"SELECT * FROM events WHERE id = $id");
$row = mysqli_fetch_array($result);
$date = $row['date'];
$year = jdate('Y',$date,'','','en');
$month = jdate('m',$date,'','','en');
$month_name = jdate_words(array('mm'=>$month));
$day = jdate('d',$date,'','','en');
?>
<div class="panel-body">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form role="form" action="" method="post" > 
                <div class="form-group col-lg-2">
                  <p style="line-height: 14px">&nbsp</p>
                  <a tabindex="5" type="submit" class="btn btn-primary " data-dismiss="modal" onclick="edit_event(<?php echo $id; ?>,$('#day').val(),$('#year').val(),$('#month').val(),$('#title').val());">ویرایش</a>
                </div>
                <div class="form-group col-lg-4">
                  <label>عنوان مناسبت</label>
                  <input tabindex="4" class="form-control" id="title" value="<?php echo $row['title']; ?>" placeholder="عنوان مناسبت (مثال: عید غدیر)">
                </div>
                <div class="form-group col-lg-2">
                  <label>سال</label>
                  <select tabindex="3" id="year" class="form-control" required>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <option value="1396">1396</option>
                    <option value="1397">1397</option>
                    <option value="1398">1398</option>
                    <option value="1399">1399</option>
                    <option value="1400">1400</option>
                  </select>
                </div>
                <div class="form-group col-lg-2">
                  <label>ماه</label>
                  <select tabindex="2" id="month" class="form-control" required>
                    <option value="<?php echo $month; ?>"><?php echo $month_name['mm']; ?></option>
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
                <div class="form-group col-lg-2">
                  <label>روز</label>
                  <select id="day" tabindex="1" class="form-control" required>
                    <option value="<?php echo $day; ?>"><?php echo (int)$day; ?></option>
                    <option value="01">1</option>
                    <option value="02">2</option>
                    <option value="03">3</option>
                    <option value="04">4</option>
                    <option value="05">5</option>
                    <option value="06">6</option>
                    <option value="07">7</option>
                    <option value="08">8</option>
                    <option value="09">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                  </select>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>