<?php
require_once("../../actions/config.php");
require_once("../../actions/jdf.php");
if(!empty($_GET['id']))
{
  $id = $_GET['id'];
  $result = mysqli_query($con,"SELECT * FROM special_event WHERE user_id = $id");
  ?>
  <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <thead>
        <tr>
          <th>تاریخ</th>
          <th>عنوان</th>
          <th>متن پیام</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        while($row = mysqli_fetch_array($result)) 
        {
          $message_id = $row['message_id'];
          $message_result = mysqli_query($con,"SELECT * FROM messages WHERE id = $message_id");
          $message_row = mysqli_fetch_array($message_result);
          $message = $message_row['text'];
          $title = $row['title'];
          ?>
          <tr class="gradeA">
            <td class="center"><?php echo $row['month'].'/'.$row['day']; ?></td>
            <td><?php echo $title; ?></td>
            <td><?php echo $message; ?></td>
            <td class="center">
             <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-list"></i>
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                 <li><a href="javascript:void(0);" data-dismiss="modal" onclick="delete_contactEvents(<?php echo $row['id']; ?>);"><i class="fa fa-trash"></i> حذف</a></li>
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
 <?php 
}
?>