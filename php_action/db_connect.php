<?php

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "farmar";

$connect = new mysqli($localhost, $username, $password, $dbname);

	if($connect->connect_error) {
		die("Connection Failed : " . $connect->connect_error);
	}

?>