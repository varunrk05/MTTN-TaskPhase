<?php
    $server_name = "localhost";
	$username = "root";
	$password = "";
	$mysql_db = "mttntp";

	if(@!($conn = mysqli_connect($server_name, $username, $password, $mysql_db)))
		die("Error while connecting:" . mysqli_connect_error());