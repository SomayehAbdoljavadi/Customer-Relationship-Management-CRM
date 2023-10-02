<?php
require_once("../../actions/config.php");
require_once("../../actions/jdf.php");
$_SESSION['custom_user_select'] = '';
$result = mysqli_query($con,"SELECT * FROM customers");
?>
<form action="actions/custom_task.php" method="post">
  <ul class="nav nav-tabs">
    <li class="active" style="cursor: pointer;"><a data-toggle="tab" data-target="#home">انتخاب مخاطب</a></li>
    <li><a data-toggle="tab" style="cursor: pointer;" data-target="#menu1">متن پیام</a></li>
    <li><a data-toggle="tab" style="cursor: pointer;" data-target="#menu2">زمان ارسال</a></li>
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <p>
        <div class="row">
          <div class="form-group">
            <div class="col-md-12">
              <button class="btn btn-default btn-lg" type="button" onclick="$('.btn').removeClass('active');$(this).toggleClass('active');$('#select_user').load('pages/ajax/select_customer.php');"> دستی </button>
              <button class="btn btn-default btn-lg" type="button" onclick="$('.btn').removeClass('active');$(this).toggleClass('active');$('#select_user').load('pages/ajax/select_adj.php');"> بر اساس صفت </button>
            </div>
            <div id="custom_selected"></div>
          </div>
        </div>
      </p>
      <div id="select_user">
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body" id="customers">
              <form role="form">
                <div class="form-group col-lg-4"></div>
                <div class="form-group col-lg-8">
                  <label>متن پیام</label>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <textarea class="form-control" rows="3" id="messageText" name="message" placeholder="درصورتی که در این قسمت چیزی بنویسید، محتوی این بخش به عنوان متن پیام درنظر گرفته خواهد شد."></textarea>
                    </div>
                    <div class="form-group col-lg-6">
                      <select class="form-control" id="selectMessageText" onchange="var message = ($(this).val());$('#messageText').val(message);">
                        <option disabled=""> متن پیام</option>
                        <?php
                        $message_result = mysqli_query($con,"SELECT * FROM messages");
                        while($message_row = mysqli_fetch_array($message_result))
                        {
                          ?>
                          <option value="<?php echo $message_row['text']; ?>"><?php echo $message_row['text']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <br />
      <br />
      <div class="row">
        <div class="form-group col-lg-8"></div>
        <div class="form-group col-lg-4">
          <input type="text" id="sendtime" class="form-control pull-right">
          <input type="hidden" id="sendtimeAlt" class="form-control pull-right" name="time">
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="form-group col-lg-8"></div>
        <div class="form-group col-lg-4"><button class="btn btn-primary btn-lg" type="submit">ارسال</button></div>
      </div>
    </div>
  </div>
</form>

<!--<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>-->
<script type="text/javascript">
  $(document).ready(function () {
    $('#sendtime').persianDatepicker({
      altField: '#sendtimeAlt',
      altFormat: 'X',
      format: 'YYYY/MM/DD-H:m',
      observer: true,
      timePicker: {
        enabled: true
      },
    });
  });
</script>
