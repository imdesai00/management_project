<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Name = $_POST['Name'];
		$Technical = $_POST['Technical'];

		$sql = "INSERT INTO fungicide (Name, Technical) VALUES ('$Name', '$Technical')";

		if($connect->query($sql) === TRUE) {
		header('location: http://localhost/extra/fungicide.php');	
		} 
		else {
			echo "Failed!";
		}
	$connect->close();
	}
?>