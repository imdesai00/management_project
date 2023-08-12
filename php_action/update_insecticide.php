<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Insecticide_no = $_POST['Type'];
		$Name = $_POST['Name'];
		$Technical = $_POST['Technical'];
		$Quantity = $_POST['Quantity'];

		$sql = "update insecticide set Quantity ='$Quantity', Name='$Name', Technical='$Technical' where Insecticide_no = '$Insecticide_no'";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/view_insecticide.php');	
		} 
		else {
			echo "Failed!";
		}
		$connect->close();
	}
?>