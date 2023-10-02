<?php
require_once('config.php');
$i = 0;
ini_set("display_errors","On");


$result = mysqli_query($con,"SELECT customers.id,events.date,messages.id FROM customers,events,messages,event_group,contact_groups,category WHERE messages.event_id = events.id AND category.id = contact_groups.category_id AND contact_groups.contact_id = customers.id AND category.id = event_group.category_id AND events.id = event_group.event_id ");
while($row = mysqli_fetch_array($result)) {
	// echo $i += 1;
	// echo "<br>";
	
	var_dump($row);
	// echo "<br>";
}

?>