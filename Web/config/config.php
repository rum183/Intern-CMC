<?php
	$server="localhost";
	$user="root";
	$pass="";
	$db="CMC";
	$con=mysqli_connect($server,$user,$pass,$db)or die('cant connect');
	mysqli_select_db($con,$db);
	mysqli_query($con,"set names 'utf8'");
?>