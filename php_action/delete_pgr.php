<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$PGR_no = $_POST['Type'];

		$sql = "delete from pgr where PGR_no ='$PGR_no'";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/view_pgr.php');	
		} 
		else {
			echo "Failed!";
		}
		$connect->close();
	}
?>