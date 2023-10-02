<?php
require_once("../../actions/config.php");
require_once("../../actions/jdf.php");
$result = mysqli_query($con,"SELECT * FROM strategy");
$contact_id = $_GET['id'];
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
        $i = 0;
        while($row = mysqli_fetch_array($result))
        {
            $i+=1;
            $id = $row['id'];
            $title = $row['title'];
            $times_result = mysqli_query($con,"SELECT * FROM strategy_times WHERE strategy_id = $id");
            $times = array();
            $contact_result = mysqli_query($con,"SELECT * FROM contact_strategy WHERE contact_id = $contact_id AND strategy_id = $id");
            $contact_row = mysqli_fetch_array($contact_result);
            if(!empty($contact_row['id'])) {
                $btn = 'btn-primary';
            } else {
                $btn = '';
            }
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
                                <td><?php echo $time['message']; ?></td>
                                <td><?php echo $time['year']; ?></td>
                                <td><?php echo $time['month']; ?></td>
                                <td><?php echo $time['day']; ?></td>
                                <td><?php echo $time['hours']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </td>
                <td class="center">
                    <button type="button" class="btn <?php echo $btn; ?>" onclick="add_contactStrategy(<?php echo $id; ?>,<?php echo $contact_id; ?>);$(this).toggleClass('btn-primary');"><i class="fa fa-check"></i></button>
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
