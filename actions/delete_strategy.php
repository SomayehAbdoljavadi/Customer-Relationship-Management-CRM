<?php
require_once('config.php');
if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($con,"DELETE FROM strategy WHERE id = $id");
    mysqli_query($con,"DELETE FROM contact_strategy WHERE strategy_id = $id");
    $st_result = mysqli_query($con,"SELECT * FROM strategy_times WHERE strategy_id = $id");
    while($st_row = mysqli_fetch_array($st_result)) {
        $st_id = $st_row['id'];
        mysqli_query($con,"DELETE FROM strategy_times WHERE id = $st_id");
        mysqli_query($con,"DELETE FROM strategy_tasks WHERE st_id = $st_id");
    }
}
?>
<script type="text/javascript">$('#strategies').load('pages/ajax/strategies.php');</script>