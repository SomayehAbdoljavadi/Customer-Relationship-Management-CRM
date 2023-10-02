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
        $category_id = $row['category_id'];
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
        ?>
        <tr class="gradeA">
          <td><?php echo $row['family']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['mobile']; ?></td>
          <td><?php echo $category; ?></td>
          <td><?php echo $title; ?></td>
          <td class="center"><?php echo jdate('Y/m/d',$row['birthdate']); ?></td>
          <td class="center">
            <button class="btn btn-default" type="button" onclick="$(this).toggleClass('active');$('#custom_selected').load('pages/ajax/custom_selected.php?id='+<?php echo $row['id']; ?>);"> انتخاب </button>
         </td>
       </tr>
       <?php
     }
     ?>
   </tbody>
 </table>
</div>
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