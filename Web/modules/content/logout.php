<?php 
	session_start();
	if(isset($_GET['action'])){
		session_unset();
		header('location:index.php?xem=dangnhap');	
	}
?>