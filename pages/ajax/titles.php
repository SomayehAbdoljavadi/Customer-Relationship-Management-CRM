<?php
require_once("../../actions/config.php");
?>
<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>ID</th>
                <th>عنوان</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($con,"SELECT * FROM titles");
            while($row = mysqli_fetch_array($result))
            {
                ?>
                <tr class="gradeA">
                    <td class="center"><?php echo $row['id']; ?></td>
                    <td class="center"><?php echo $row['title']; ?></td>
                    <td dir="ltr">
                       <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-list"></i>
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                <li><a href="javascript:void(0);" onclick="$('#titleId').val(<?php echo $row['id']; ?>);$('#titleText').val('<?php echo $row['title']; ?>');" data-toggle="modal" data-target="#titleEditModal">ویرایش</a></li>
                                <li><a href="javascript:void(0);" onclick="remove_title(<?php echo $row['id']; ?>);">حذف</a></li>
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