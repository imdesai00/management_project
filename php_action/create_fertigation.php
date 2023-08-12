<?php 	
require_once 'db_connect.php';

if($_POST) {	

	$date = $_POST['Date'];
	$area  = $_POST['Area'];
	$type  = $_POST['Type'];
    $total  = $_POST['Total'];
    $totalacre = $_POST['Total/Acre'];
	$typeofproduct = $_POST['type'];

	$sql1 = "INSERT INTO fertigation (date, area, type, total, totalacre, typeofproduct) VALUES ('$date', '$area', '$type', '$total', '$totalacre', '$typeofproduct')";

	if($connect->query($sql1) === TRUE) {
		header('location: http://localhost/extra/spray.php');	
	} else {
		echo "Failed!";
   }
   $connect->close();
}?>