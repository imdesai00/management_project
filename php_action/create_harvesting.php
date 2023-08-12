<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$type = $_POST['Type'];
		$date = $_POST['date'];
        $totalkgs = $_POST['totalkgs'];

		$sql = "INSERT INTO harvesting (type, date, totalkgs) VALUES ('$type', '$date', '$totalkgs')";

		if($connect->query($sql) === TRUE) {
		header('location: http://localhost/extra/harvesting.php');	
		} 
		else {
			echo "Failed!";
		}
	$connect->close();
	}
?>