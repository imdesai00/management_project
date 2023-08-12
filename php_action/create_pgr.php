<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Name = $_POST['Name'];
		$Technical = $_POST['Technical'];

		$sql = "INSERT INTO  pgr   (Name, Technical) VALUES ('$Name', '$Technical')";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/pgr.php');	
		} 
		else {
			echo "Failed!";
		}
	$connect->close(); 
	}
?>