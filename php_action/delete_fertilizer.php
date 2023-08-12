<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Fertilizer_no = $_POST['Type'];

		$sql = "delete from fertilizer where Fertilizer_no='$Fertilizer_no'";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/view_fertilizer.php');	
		} 
		else {
			echo "Failed!";
		}
		$connect->close();
	}
?>