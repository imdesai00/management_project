<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Quantity = $_POST['Quantity'];
		$Name = $_POST['Name'];
		$Technical = $_POST['Technical'];

		$sql = "INSERT INTO  insecticide  (Quantity, Name, Technical) VALUES ('$Quantity', '$Name', '$Technical')";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/insecticide.php');	
		} 
		else {
			echo "Failed!";
		}
	$connect->close();
	}
?>