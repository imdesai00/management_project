<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$crop_id = $_POST['Type'];

		$sql = "delete from crop where crop_id='$crop_id'";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/view_crop.php');	
		} 
		else {
			echo "Failed!";
		}
		$connect->close();
	}
?>