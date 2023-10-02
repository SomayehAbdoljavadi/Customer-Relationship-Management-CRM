<?php
require_once "config.php";
$number = $_POST['rows'];
$title = $_POST['title'];
mysqli_query($con,"INSERT INTO strategy (title) VALUES ('$title')");
$result = mysqli_query($con,"SELECT * FROM strategy ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_array($result);
$message = $_POST['message'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
$hours = $_POST['hours'];
$id = $row['id'];
mysqli_query($con,"INSERT INTO strategy_times (strategy_id,year,month,day,hours,message) VALUES ($id,$year,$month,$day,$hours,'$message')");
for($i=2;$i<$number+1;$i++) {
    $message = $_POST["message$i"];
    $year = $_POST["year$i"];
    $month = $_POST["month$i"];
    $day = $_POST["day$i"];
    $hours = $_POST["hours$i"];
    mysqli_query($con,"INSERT INTO strategy_times (strategy_id,year,month,day,hours,message) VALUES ($id,$year,$month,$day,$hours,'$message')");
}
header("location: ".URL."/#/strategies");
?>