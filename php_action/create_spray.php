<?php 	
require_once 'db_connect.php';

if($_POST) {	

	$date = $_POST['Date'];
	$area  = $_POST['Area'];
	$type  = $_POST['type'];
	$TypeInsecticide = $_POST['TypeInsecticide'];
	$TechnicalInsecticide = $_POST['TechnicalInsecticide'];
	$TypeFungicide = $_POST['TypeFungicide'];
	$TechnicalFungicide = $_POST['TechnicalFungicide'];
	$TypeFertilizer = $_POST['TypeFertilizer'];
	$TypePGR = $_POST['TypePGR'];
	$TechnicalPGR = $_POST['TechnicalPGR'];
	$Pump  = $_POST['Pump'];
    $Ltr  = $_POST['Ltr'];

	$sql1 = "INSERT INTO spray (Type, Area, Date, TypeInsecticide, TechnicalInsecticide, TypeFungicide, TechnicalFungicide, TypeFertilizer, TypePGR, TechnicalPGR, Pump, Ltr) VALUES 
		('$type', '$area', '$date', '$TypeInsecticide', '$TechnicalInsecticide', '$TypeFungicide', '$TechnicalFungicide', '$TypeFertilizer', '$TypePGR', '$TechnicalPGR', '$Pump', '$Ltr')";

	if($connect->query($sql1) === TRUE) {
		header('location: http://localhost/extra/spray.php');	
	} else {
		echo "Failed!";
   }
   $connect->close();
}?>