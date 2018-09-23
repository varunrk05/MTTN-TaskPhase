<?php
    $server_name = "";
	$username = "";
	$password = "";
	$mysql_db = "";

	if(@!($conn = mysqli_connect($server_name, $username, $password, $mysql_db)))
		die("Error while connecting:" . mysqli_connect_error());