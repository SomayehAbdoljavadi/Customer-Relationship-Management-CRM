<?php
require_once("../../actions/config.php");
require_once("../../actions/jdf.php");
$result = mysqli_query($con,"SELECT * FROM messages");
?>
<div class="dataTable_wrapper">
	<table class="table table-striped table-bordered table-hover" id="messagesTable">
		<thead>
			<tr>
				<th>متن</th>
				<th>مناسبت</th>
				<th>رسمی / غیر رسمی</th>
				<th>مرد / زن</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = mysqli_fetch_array($result))
			{
				$event = $row['event_id'];
				$gender = $row['gender'];
				$official = $row['official'];
				$event_result = mysqli_query($con,"SELECT * FROM events WHERE id = $event");
				$event_row = mysqli_fetch_array($event_result);
				$event = $event_row['title'];
				$event_date = jdate('Y/m/d',$event_row['date']);
				if($gender == 1) {
					$gender = "مرد";
				} elseif($gender == 2) {
					$gender = "زن";
				} else {
					$gender = "هردو";
				}
				if($official == 1) {
					$official = "رسمی";
				} elseif($official == 3) {
					$official = "هردو";
				} else {
					$official = "غیر رسمی";
				}
				?>
				<tr class="gradeA">
					<td><?php echo $row['text']; ?></td>
					<td><?php echo $event; ?> <?php echo $event_date; ?> </td>
					<td class="center"><?php echo $official; ?></td>
					<td class="center"><?php echo $gender; ?></td>
					<td class="center">
						<div class="dropdown">
							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
								<i class="fa fa-list"></i>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="javascript:void(0);" onclick="$('#editMessagePopup').load('pages/ajax/edit_message.php?id=<?php echo $row['id']; ?>');"  data-toggle="modal" data-target="#messageEditModal" >ویرایش</a></li>
								<li><a href="javascript:void(0);" onclick="delete_message(<?php echo $row['id']; ?>);">حذف</a></li>
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
