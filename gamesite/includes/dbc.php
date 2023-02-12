<?php
//*********************************************************
// File: dbc.php
// Connect Read-only to MySQL database via PHP
//*********************************************************


	$host = "sql107.epizy.com";
	$userName = "epiz_33346890";
	$password = "uyqPjCrldfl";
	$database = "epiz_33346890_gamesite";
	
	$con = mysqli_connect($host, $username, $password, $database);
	
	$connection_error = mysqli_connect_error();
	if($connection_error !=null){
		echo "<p>Error connecting to database: $connection_error </p>";
	}else{
		echo "Connected to Admin MySQL<br />";
	}
?>
