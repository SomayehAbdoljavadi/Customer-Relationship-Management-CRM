<?php
require_once("../../actions/config.php");
?>
<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>نام و نام خانوداگی</th>
                <th>ایمیل</th>
                <th>موبایل</th>
                <th>دسترسی</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($con,"SELECT * FROM users");
            while($row = mysqli_fetch_array($result))
            {
                $id = $row['id'];
                $result_info = mysqli_query($con,"SELECT * FROM user_info WHERE user_id = $id");
                $row_info = mysqli_fetch_array($result_info);
                if($row['access'] == 1) {
                    $access = 'مدیر';
                } elseif($row['access'] == 2) {
                    $access = 'ویرایشگر';
                } elseif($row['access'] == 3) {
                    $access = 'مشاهده کننده';
                }
                ?>
                <tr class="gradeA">
                    <td class="center"><?php echo $row_info['name'].' '.$row_info['family']; ?></td>
                    <td class="center"><?php echo $row['email']; ?></td>
                    <td class="center"><?php echo $row_info['mobile']; ?></td>
                    <td class="center"><?php echo $access; ?></td>
                    <td dir="ltr">
                       <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-list"></i>
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                <li><a href="javascript:void(0);" onclick="remove_admin_user(<?php echo $row['id']; ?>);">حذف</a></li>
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