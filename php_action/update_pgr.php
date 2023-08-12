<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$PGR_no = $_POST['Type'];
		$Name = $_POST['Name'];
		$Technical = $_POST['Technical'];


		$sql = "update pgr set Name='$Name', Technical='$Technical' where PGR_no = '$PGR_no'";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/view_pgr.php');	
		} 
		else {
			echo "Failed!";
		}
		$connect->close();
	}
?>