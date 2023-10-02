<?php
require_once("../../actions/config.php");
require_once("../../actions/jdf.php");
?>
<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>ردیف</th>
                <th>تاریخ ارسال</th>
                <th>مخاطب</th>
                <th>متن پیام</th>
                <th>وضعیت ارسال</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $result = mysqli_query($con,"SELECT * FROM custom_tasks WHERE status = 1 ORDER BY id DESC");
        while($row = mysqli_fetch_array($result))
        {
            $i += 1;
            $send_date = jdate("Y/m/d-H:i",$row['date']);
            $contacts = $row['contacts'];
            $text = $row['message'];
            $mobiles = '';
            $contacts = explode(',', $contacts);
            $status = $row['sms_result'];
            if(($row['sms_result'] == '0') || ($row['sms_result'] == '')) {
                $status_text = '<i class="fa fa-exclamation-triangle"></i>';
            } else {
                $status_text = '<i class="fa fa-check"></i>';
            }
            foreach ($contacts as $contact) {
                $contact_result = mysqli_query($con,"SELECT * FROM customers WHERE id = $contact");
                $contact_row = mysqli_fetch_array($contact_result);
                $mobile = $contact_row['mobile'];
                $mobiles .= $mobile.'<br>';
            }
            ?>
            <tr class="gradeA">
                <td class="center"><?php echo $i; ?></td>
                <td class="center"><?php echo $send_date; ?></td>
                <td class="center"><?php echo $mobiles; ?></td>
                <td class="center"><?php echo $text; ?></td>
                <td class="center"><?php echo $status_text; ?></td>
                <td dir="ltr">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="fa fa-list"></i>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="javascript:void(0);" onclick="re_send(<?php echo $row['id']; ?>);">ارسال مجدد</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onclick="delete_custom_task(<?php echo $row['id']; ?>);">حذف</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php
        }
        $result = mysqli_query($con,"SELECT * FROM tasks WHERE status = 1 ORDER BY id DESC");
        while($row = mysqli_fetch_array($result))
        {
            $i += 1;
            $contact_id = $row['contact_id'];
            $message_id = $row['message_id'];
            $status = $row['sms_result'];
            $send_date = jdate("Y/m/d-H:i",$row['send_date']);
            $contact_result = mysqli_query($con,"SELECT * FROM customers WHERE id = $contact_id");
            $contact_row = mysqli_fetch_array($contact_result);
            $contact = $contact_row['name'].' '.$contact_row['family'].' '.$contact_row['mobile'];
            $message_result = mysqli_query($con,"SELECT * FROM messages WHERE id = $message_id");
            $message_row = mysqli_fetch_array($message_result);
            if(($row['sms_result'] == '0') || ($row['sms_result'] == '')) {
                $status_text = '<i class="fa fa-exclamation-triangle"></i>';
            } else {
                $status_text = '<i class="fa fa-check"></i>';
            }
            $text = $message_row['text'];
            ?>
            <tr class="gradeA">
                <td class="center"><?php echo $i; ?></td>
                <td class="center"><?php echo $send_date; ?></td>
                <td class="center"><?php echo $contact; ?></td>
                <td class="center"><?php echo $text; ?></td>
                <td class="center"><?php echo $status_text; ?></td>
                <td dir="ltr">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="fa fa-list"></i>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="javascript:void(0);" onclick="re_send(<?php echo $row['id']; ?>);">ارسال مجدد</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onclick="delete_task(<?php echo $row['id']; ?>);">حذف</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
        <?php
        $result = mysqli_query($con,"SELECT * FROM strategy_tasks WHERE status = 1 ORDER BY id DESC");
        while($row = mysqli_fetch_array($result))
        {
            $i += 1;
            $contact_id = $row['contact_id'];
//                $message_id = $row['message_id'];
            $st_id = $row['st_id'];
            $status = $row['sms_result'];
            $st_result = mysqli_query($con,"SELECT * FROM strategy_times WHERE id = $st_id");
            $st_row = mysqli_fetch_array($st_result);
            $text = $st_row['message'];
            $send_date = jdate("Y/m/d-H:i",$row['send_date']);
            $contact_result = mysqli_query($con,"SELECT * FROM customers WHERE id = $contact_id");
            $contact_row = mysqli_fetch_array($contact_result);
            $contact = $contact_row['name'].' '.$contact_row['family'].' '.$contact_row['mobile'];
//                $message_result = mysqli_query($con,"SELECT * FROM messages WHERE id = $message_id");
//                $message_row = mysqli_fetch_array($message_result);
//                $text = $message_row['text'];
            if(($row['sms_result'] == '0') || ($row['sms_result'] == '')) {
                $status_text = '<i class="fa fa-exclamation-triangle"></i>';
            } else {
                $status_text = '<i class="fa fa-check"></i>';
            }
            ?>
            <tr class="gradeA">
                <td class="center"><?php echo $i; ?></td>
                <td class="center"><?php echo $send_date; ?></td>
                <td class="center"><?php echo $contact; ?></td>
                <td class="center"><?php echo $text; ?></td>
                <td class="center"><?php echo $status_text; ?></td>
                <td dir="ltr">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="fa fa-list"></i>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="javascript:void(0);" onclick="re_send(<?php echo $row['id']; ?>);">ارسال مجدد</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onclick="delete_task(<?php echo $row['id']; ?>);">حذف</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $('#dataTables-example').DataTable({
        responsive: true,
        language: {
            search: "جستجو: ",
            lengthMenu: "نمایش _MENU_ سطر",
            info: "نمایش _START_ تا _END_ از _TOTAL_ سطر",
            paginate: {
                first: "ابتدا",
                last: "انتها",
                next: "بعدی",
                previous: "قبلی"
            },
        }
    });
</script>