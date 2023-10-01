<?php
	$host = "feenix-mariadb.swin.edu.au";
	$user = "s104193360"; 
	$pwd = "newpwd"; 
	$sql_db = "s104193360_db"; 


	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
	if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>