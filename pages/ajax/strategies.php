<?php
require_once("../../actions/config.php");
require_once("../../actions/jdf.php");
$result = mysqli_query($con,"SELECT * FROM strategy");
?>
<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="messagesTable">
        <thead>
        <tr>
            <th>ردیف</th>
            <th>عنوان استراتژی</th>
            <th>جزئیات</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
//      TODO
        $i = 0;
        while($row = mysqli_fetch_array($result))
        {
            $i+=1;
            $id = $row['id'];
            $title = $row['title'];
            $times_result = mysqli_query($con,"SELECT * FROM strategy_times WHERE strategy_id = $id");
            $times = array();
            while($times_row = mysqli_fetch_array($times_result)) {
                $times[] = $times_row;
            }
            ?>
            <tr class="gradeA">
                <td><?php echo $i; ?></td>
                <td><?php echo $title; ?></td>
                <td>
                    <table>
                        <tr>
                            <td>پیام</td>
                            <td>سال</td>
                            <td>ماه</td>
                            <td>روز</td>
                            <td>ساعت</td>
                        </tr>
                        <?php
                        foreach($times as $time) {
                        ?>
                        <tr>
                            <td><input class="inline-text-input" value="<?php echo $time['message']; ?>" onchange="inlineEditStrategy(<?php echo $time['id']; ?>,'message',$(this).val());"></td>
                            <td><input class="inline-text-input-min" value="<?php echo $time['year']; ?>" onchange="inlineEditStrategy(<?php echo $time['id']; ?>,'year',$(this).val());"></td></td>
                            <td><input class="inline-text-input-min" value="<?php echo $time['month']; ?>" onchange="inlineEditStrategy(<?php echo $time['id']; ?>,'month',$(this).val());"></td></td>
                            <td><input class="inline-text-input-min" value="<?php echo $time['day']; ?>" onchange="inlineEditStrategy(<?php echo $time['id']; ?>,'day',$(this).val());"></td></td>
                            <td><input class="inline-text-input-min" value="<?php echo $time['hours']; ?>" onchange="inlineEditStrategy(<?php echo $time['id']; ?>,'hours',$(this).val());"></td></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
                <td class="center">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <i class="fa fa-list"></i>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0);" onclick="delete_strategy(<?php echo $row['id']; ?>);">حذف</a></li>
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
    $('#messagesTable').DataTable({
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
