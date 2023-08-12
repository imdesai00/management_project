<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Fertilizer_no = $_POST['Type'];
		$Name = $_POST['Name'];

		$sql = "update fertilizer set Name='$Name'
        where Fertilizer_no = '$Fertilizer_no'";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/view_fertilizer.php');	
		} 
		else {
			echo "Failed!";
		}
		$connect->close();
	}
?>