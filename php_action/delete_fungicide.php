<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Fungicide_no = $_POST['Type'];

		$sql = "delete from fungicide where Fungicide_no='$Fungicide_no'";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/view_fungicide.php');	
		} 
		else {
			echo "Failed!";
		}
		$connect->close();
	}
?>