<?php
require_once("../../actions/config.php");
require_once("../../actions/jdf.php");
$result = mysqli_query($con,"SELECT * FROM events ORDER BY id DESC");
?>
<table class="table table-striped table-bordered table-hover" id="eventTable">
    <thead>
        <tr>
            <th>عنوان</th>
            <th>تاریخ</th>
            <th>گروه</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($row = mysqli_fetch_array($result))
        {
            $id = $row['id'];
            $event_group_result = mysqli_query($con,"SELECT * FROM event_group WHERE event_id = $id");
            ?>
            <tr class="gradeA">
                <td><?php echo $row['title']; ?></td>
                <td class="center"><?php echo jdate('Y/m/d',$row['date']); ?></td>
                <td class="center">
                    <?php 
                    while($event_group_row = mysqli_fetch_array($event_group_result)) 
                    {
                        if(!empty($event_group_row['id'])) {
                            $event_group_category = $event_group_row['category_id'];
                            $event_category_result = mysqli_query($con,"SELECT * FROM category WHERE id = $event_group_category");
                            $event_category_row = mysqli_fetch_array($event_category_result);
                            echo $event_category_row['category'];
                            ?>
                            <a href="javascript:void(0);" onclick="removeGroupEvent(<?php echo $id; ?>,<?php echo $event_group_row['id']; ?>);"> حذف </a><br>
                            <?php
                        } else {
                            $event_cateory = '';
                        }
                    }
                    // echo $event_cateory; 
                    ?>
                </td>
                <td dir="ltr">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-list"></i>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="#">ویرایش</a></li> -->
                            <!-- <a href="<?php echo URL; ?>actions/remove_event.php?id=<?php echo $row['id']; ?>">حذف</a></li> -->
                            <li><a href="javascript:void(0);" onclick="$('#editEventPopup').load('pages/ajax/edit_events.php?id=<?php echo $row['id']; ?>');"  data-toggle="modal" data-target="#eventEditModal" >ویرایش</a></li>
                            <li><a href="javascript:void(0);" onclick="eventGroups(<?php echo $row['id']; ?>);" data-toggle="modal" data-target="#GroupEvents">گروه ها</a></li>
                            <li><a href="javascript:void(0);" onclick="remove_event(<?php echo $row['id']; ?>);">حذف</a></li>
                        </ul>
                    </div> 
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<script type="text/javascript">
  $('#eventTable').DataTable({
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