<?php
require_once 'config.php';
require_once 'jdf.php';
$url = URL;
if(!empty($_FILES['filename']['tmp_name'])) {
	set_time_limit ( 0 );
  move_uploaded_file($_FILES['filename']['tmp_name'], $_FILES['filename']['name']);
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$mysqli->query('SET foreign_key_checks = 0');
	if ($result = $mysqli->query("SHOW TABLES"))
	{
	    while($row = $result->fetch_array(MYSQLI_NUM))
	    {
	        $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
	    }
	}

	$mysqli->query('SET foreign_key_checks = 1');
	$conn = $con;

	$table_name = "items";
	$filename = $_FILES['filename']['name'];
	$templine = '';
	$lines = file($filename);
	foreach ($lines as $line)
	{
		if (substr($line, 0, 2) == '--' || $line == '')
		    continue;
		$templine .= $line;
		if (substr(trim($line), -1, 1) == ';')
		{
				$templine;
		    mysqli_query($con,$templine) ;
		    $templine = '';
		}
	}
 	header("location: ".$url."/#backup");
} else {
	header("location: ".URL."/#backup");
}
