<?php 	
require_once 'db_connect.php';

if($_POST) {	

	$date = $_POST['Date'];
	$area  = $_POST['Area'];
	$time = $_POST['Time'];
	$Type = $_POST['type'];
	$days = $_POST['days'];
		$sql = "INSERT INTO  irrigation  (date, area, time, type, days) VALUES ('$date', '$area ', '$time','$Type','$days')";
		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/spray.php');	
		} else {
			echo "Failed!";
		}
   $connect->close();
}?>