<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$crop_id = $_POST['Type'];
		$crop_name = $_POST['Name'];


		$sql = "update crop set crop_name='$crop_name' where crop_id = '$crop_id'";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/view_crop.php');	
		} 
		else {
			echo "Failed!";
		}
		$connect->close();
	}
?>