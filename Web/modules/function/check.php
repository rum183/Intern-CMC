<?php 
	
	function checkEmpty($value){
		$flag = false;
		if(!isset($value) || trim($value) == ""){
			$flag = true;
		}
		return $flag;
	}

	function checkUsername($value){
		$flag = false;
		$subject = $value;
		$pattern = '#^[a-z0-9_\.\s]{6,32}$#';
		if(preg_match($pattern, $subject, $matches) ==1){
			$flag = true;
		}
		return $flag;
	}

	function checkPassword($value){
		$flag = false;
		$subject = $value;
		$pattern = '#^[a-zA-Z0-9_\s\$\#\@\!\*]{6,32}$#';
		if(preg_match($pattern, $subject, $matches) ==1){
			$flag = true;
		}
		return $flag;
	}

	function checkFullname($value){
		$flag = false;
		$subject = $value;
		$pattern = '#^([a-zA-Z]{2,}\s){1,}[a-zA-Z]{2,}$#';
		if(preg_match($pattern, $subject, $matches) ==1){
			$flag = true;
		}
		return $flag;
	}

	function checkEmail($value){
		$flag = false;
		$subject = $value;
		$pattern = '#^[a-z]{2,30}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
		if(preg_match($pattern, $subject, $matches) ==1){
			$flag = true;
		}
		return $flag;
	}

	function checkPhone($value){
		$flag = false;
		$subject = $value;
		$pattern = '#^0[0-9]{9}$#';
		if(preg_match($pattern, $subject, $matches) ==1){
			$flag = true;
		}
		return $flag;
	}

	function checkMonney($value){
		$flag = false;
		$v = $value;
		if(is_numeric($v)){
			$flag = true;
		}
		return $flag;
	}

	function checkVIP($value){
		$server="localhost";
		$user="root";
		$pass="";
		$db="CMC";
		$con=mysqli_connect($server,$user,$pass,$db)or die('cant connect');
		mysqli_select_db($con,$db);
		mysqli_query($con,"set names 'utf8'");
		$select_user = $value;
		$sel_c="select * from users where username='$select_user'";
		$run_get=mysqli_query($con,$sel_c);
		$get_info=mysqli_fetch_row($run_get);
		if($get_info[8] <= time()){
			$sel_c="update users set `VIP` = '0'  WHERE `username` = '$select_user';update users set `timevip` = '0'  WHERE `username` = '$select_user';";
			$run_get=mysqli_multi_query($con,$sel_c);
		}
	}

?>