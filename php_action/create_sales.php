<?php 	
require_once 'db_connect.php';

	if($_POST) {	

		$Sales_Id = $_POST['Sales_Id'];
		$Type = $_POST['Type'];
        $Broker_Name = $_POST['Broker_Name'];
		$Kgs = $_POST['Kgs'];
        $Rate = $_POST['Rate'];
		$Total = $_POST['Total'];

		$sql = "INSERT INTO  sales   (sales_id , Type, broker_name, kgs, rate, total) VALUES ('$Sales_Id', '$Type', '$Broker_Name', '$Kgs', '$Rate', '$Total')";

		if($connect->query($sql) === TRUE) {
			header('location: http://localhost/extra/sales.php');	
		} else {
			echo "Failed!";
	}

	$sql = "SELECT * FROM harvesting where type = '$Type'";
	$r_harvesting = $connect->query($sql);
	while($row=$r_harvesting->fetch_assoc())
	{
		$total = $row['totalkgs'];
	}
	$tt = $total - $Kgs;
	$sql = "update harvesting set totalkgs = '$tt' where type = '$Type'";
	$r_update = $connect->query($sql);
	$connect->close();
}
?>