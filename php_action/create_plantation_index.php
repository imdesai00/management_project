<?php 	require_once 'db_connect.php';

	if($_POST) {	

		$Type = $_POST['Type'];
		$company = $_POST['Company'];
		$Variety = $_POST['Varity'];
		$Date_of_plantation = date('y-m-d', strtotime($_POST['Plantation_Date']));
		$Location = $_POST['Location'];
		$Area = $_POST['Area'];
		$Reviews = $_POST['review'];
		$reminder = $_POST['reminder'];

		$sql = "INSERT INTO  plantation_index  (Type, company, Variety, Date_of_plantation, Location, Area,reviews,days) 
		VALUES ('$Type', '$company', '$Variety', '$Date_of_plantation', '$Location', '$Area', '$Reviews', '$reminder')";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/planatation_index.php');	
		} 
		else {
			echo "Failed!";
		}
		$connect->close();
	}
?>