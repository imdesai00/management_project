<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Type = $_POST['Type'];

		$sql = "delete from plantation_index where Type='$Type'";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/view_planatation_index.php');	
		} 
		else {
			echo "Failed!";
		}
		$connect->close();
	}
?>