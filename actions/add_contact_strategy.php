<?php
require_once('config.php');
ini_set("display_errors","On");
function time_to_send($year,$month,$day,$hours) {
    $time = time();
    $time = strtotime("+$year years", $time);
    $time = strtotime("+$month month", $time);
    $time = strtotime("+$day day", $time);
    $time = strtotime("+$hours hours", $time);
    return $time;
}
if(!empty($_GET['id']) && !empty($_GET['contact_id'])) {
    $id = $_GET['id'];
    $contact_id = $_GET['contact_id'];
    $contact_result = mysqli_query($con,"SELECT * FROM contact_strategy WHERE contact_id = $contact_id AND strategy_id = $id");
    $contact_row = mysqli_fetch_array($contact_result);
    if(!empty($contact_row['id'])) {
        mysqli_query($con,"DELETE FROM contact_strategy WHERE contact_id = $contact_id AND strategy_id = $id ");
        $st_result = mysqli_query($con,"SELECT * FROM strategy_times WHERE strategy_id = $id");
        while($st_row = mysqli_fetch_array($st_result)) {
            $st_id = $st_row['id'];
            mysqli_query($con,"DELETE FROM strategy_tasks WHERE contact_id = $contact_id AND st_id = $st_id ");
        }
    } else {
        mysqli_query($con,"INSERT INTO contact_strategy (contact_id,strategy_id) VALUES ($contact_id,$id)");
        $st_result = mysqli_query($con,"SELECT * FROM strategy_times WHERE strategy_id = $id ");
        while($st_row = mysqli_fetch_array($st_result)) {
            $st_id = $st_row['id'];
            $new_time = time_to_send($st_row['year'],$st_row['month'],$st_row['day'],$st_row['hours']);
            mysqli_query($con,"INSERT INTO strategy_tasks (contact_id,st_id,send_date) VALUES ($contact_id,$st_id,'$new_time')");
        }
    }
}
?>