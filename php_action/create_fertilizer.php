<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Name = $_POST['Name'];

		$sql = "INSERT INTO  fertilizer  (Name) VALUES ('$Name')";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/fertilizer.php');	
		} else {
			echo "Failed!";
	}
	$connect->close();
	}
?>