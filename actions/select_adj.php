<?php 
require_once 'config.php';
$where = " customers.id IS NOT NULL ";
if(!empty($_GET['official'])) {
	$official = $_GET['official'];
	if($official != 3) {
		$where .= " AND customers.official = $official ";
	} else {

	}
}
if(!empty($_GET['gender'])) {
	$gender = $_GET['gender'];
	if($gender != 3) {
		$where .= " AND customers.gender = $gender ";
	} else {

	}
}
if(!empty($_GET['category'])) {
	$category = $_GET['category'];
	$where .= " AND contact_groups.category_id = $category ";
}
if(!empty($_GET['official']) && !empty($_GET['gender']) && !empty($_GET['category'])) {

	$check_result = mysqli_query($con,"SELECT customers.name AS name, customers.family AS family, customers.mobile AS mobile, customers.id as id FROM customers,contact_groups WHERE ".$where." AND customers.id=contact_groups.contact_id");
	$result = mysqli_query($con,"SELECT customers.name AS name, customers.family AS family, customers.mobile AS mobile, customers.id as id FROM customers,contact_groups WHERE ".$where."  AND customers.id=contact_groups.contact_id");
	$check_row = mysqli_fetch_array($check_result) or die(mysqli_error($con));
	if(empty($check_row['id'])) {
		echo "مخاطبی با این مشخصات موجود نمی باشد";
	} else {
		?>
		<table id="selected_adj_table" class="table">
			<tr>
				<td>نام</td>
				<td>نام خانوادگی</td>
				<td>تلفن همراه</td>
			</tr>
			<?php
			$i = 0;
			$_SESSION['custom_user_select'] = '';
			while($row = mysqli_fetch_array($result)) {
				$i += 1;
				if (!empty($row['id'])) {
					if (!empty($_SESSION['custom_user_select'])) {
						if (in_array($row['id'], $_SESSION['custom_user_select'], true)) {
							//$id = $row['id'];
							//$id = 0;
							$newarray = $_SESSION['custom_user_select'];
							$_SESSION['custom_user_select'] = [];
							foreach ($newarray as $element) {
								if ($element === $row['id']) {
								} else {
									array_push($_SESSION['custom_user_select'], $element);
								}
							}
						} else {
							array_push($_SESSION['custom_user_select'], $row['id']);
						}
					} else {
						$_SESSION['custom_user_select'] = [];
						array_push($_SESSION['custom_user_select'], $row['id']);
					}
				}
				?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['family']; ?></td>
					<td><?php echo $row['mobile']; ?></td>
				</tr>
				<?php
				$_SESSION['custom_user_select'];
			}
			?>
		</table>
		<?php
		echo "مجموع مخاطبین : ".$i;
		//print_r($_SESSION['custom_user_select']);
	}

} else {
	echo "لطفا هر سه گزینه را انتخاب نمایید";
}

?>
<script type="text/javascript">
	$('#selected_adj_table').DataTable({
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