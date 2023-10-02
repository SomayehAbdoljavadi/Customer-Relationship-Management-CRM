<?php
require_once("../../actions/config.php");
require_once("../../actions/jdf.php");
$result = mysqli_query($con,"SELECT * FROM customers");
?>
<div class="dataTable_wrapper">
  <table class="table table-striped table-bordered table-hover" id="customersTable">
    <thead>
      <tr>
        <th>نام خانوادگی</th>
        <th>نام</th>
        <th>تلفن همراه</th>
        <th>دسته بندی</th>
        <th>عنوان</th>
        <th>تاریخ تولد</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_array($result))
      {
        $title_id = $row['title_id'];
        $id = $row['id'];
        if(!empty($row['category_id'])) {
          $category_id = $row['category_id'];
          $category_result = mysqli_query($con,"SELECT * FROM category WHERE id = $category_id");
          $category_row = mysqli_fetch_array($category_result);
          $category = $category_row['category'];
        } else {
          $category = '';
          $category_result = mysqli_query($con,"SELECT * FROM contact_groups WHERE contact_id = $id ");
          while($category_row = mysqli_fetch_array($category_result)) {
            $category_id = $category_row['category_id'];
            $category_name_result = mysqli_query($con,"SELECT * FROM category WHERE id = $category_id");
            $category_name_row = mysqli_fetch_array($category_name_result);
            $category .= $category_name_row['category'].'<br>';
          }
        }
        $title_result = mysqli_query($con,"SELECT * FROM titles WHERE id = $title_id");
        $title_row = mysqli_fetch_array($title_result);
        $title = $title_row['title'];
        if(!empty($row['birthdate'])) {
          $birthdate = jdate('Y/m/d',$row['birthdate']);
        } else {
          $birthdate = '-';
        }
        ?>
        <tr class="gradeA">
          <td><?php echo $row['family']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['mobile']; ?></td>
          <td><?php echo $category; ?></td>
          <td><?php echo $title; ?></td>
          <td class="center"><?php echo $birthdate; ?></td>
          <td class="center">
           <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-list"></i>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="javascript:void(0);" onclick="ContactDetails(<?php echo $row['id']; ?>);" data-toggle="modal" data-target="#detailsModal"><i class="fa fa-address-card"></i> مشاهده جزئیات </a></li>
             <li><a href="javascript:void(0);" onclick="contactStrategies(<?php echo $row['id']; ?>);" data-toggle="modal" data-target="#contactStrategies"><i class="fa fa-calendar"></i> استراتژی ارسال پیام </a></li>
             <li><a href="javascript:void(0);" onclick="delete_contact(<?php echo $row['id']; ?>);"><i class="fa fa-trash"></i> حذف</a></li>
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

</div>
<?php
if($_SESSION['user_info']['access'] == 1) {
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="panel-title pull-right">
                    وارد کردن
                </p>
                <a class="btn btn-primary pull-left" href="actions/export.php" target="_blank">خروجی گرفتن</a>
                <a href="http://my-class.ir/documention/crm/contacts" target="_blank" class="btn btn-default  pull-left"> ❔ راهنما </a>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body" id="customers">
                <form action="actions/import.php" method="post" enctype="multipart/form-data">
                    لطفا یک فایل اکسل انتخاب کنید
                    <input type="file" class="btn" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="وارد کردن" class="btn btn-default" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<script type="text/javascript">
  $('#customersTable').DataTable({
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
