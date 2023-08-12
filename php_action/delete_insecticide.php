<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Insecticide_no = $_POST['Type'];

		$sql = "delete from insecticide where Insecticide_no ='$Insecticide_no'";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/view_insecticide.php');	
		} 
		else {
			echo "Failed!";
		}
		$connect->close();
	}
?>