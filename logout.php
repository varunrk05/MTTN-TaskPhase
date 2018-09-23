<?php
	require 'core.php';
	session_destroy();

	header('Location: main.php');
?>