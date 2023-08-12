<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Name = $_POST['Name'];

		$sql = "INSERT INTO  crop ( crop_name ) VALUES ('$Name')";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/crop.php');	
		} 
		else {
			echo "Failed!";
		}
	$connect->close(); 
	}
?>