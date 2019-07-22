<?php
	require_once 'modules/function/check.php';
	session_start();
	if (isset($_SESSION['user'])){
		if ($_SESSION['timeout'] + 3600 > time()){
			checkVIP($_SESSION['user']);	
			echo '<h2>Xin Chào '.$_SESSION['user'].'</h2>';
			echo '<h2>Bạn đã đăng nhập<h2>';
			echo '<h2 align="right"><a href="index.php?xem=logout&action=logout">Đăng xuất</a></h2>';
		}else{
			session_unset();
			header('location:index.php?xem=dangnhap');
		}
	}else{
		if(isset($_POST['login'])){
			if($_SESSION['timeout-cpt'] + 30 > time()){
				if($_SESSION['captcha'] == $_POST['captcha']){
					$c_username=$_POST['username'];
					$c_pass=$_POST['password'];
					$sel_c="select * from users where password='$c_pass' and username='$c_username'";
					$run_login=mysqli_query($con,$sel_c);
					$check_login=mysqli_num_rows($run_login);
					if($check_login==0){
						echo '<script>alert("Password or Username không chính xác")</script>';
					}else{
						$_SESSION['user']     = $c_username;
						$_SESSION['timeout']  = time();
						checkVIP($_SESSION['user']);
						echo '<script>window.history.go(-2);</script>';
					}
				}else{
					echo '<script>alert("Captcha không chính xác")</script>';
				}
			}else{
				echo '<script>alert("Captcha Đã hết hạn")</script>';
			}
		}
?>
<div class="content_right" style="width:100%;">
	<h1 align="center"><p class="pr">Đăng nhập</p></h1>
    <form action="" method="post">
    <table width="500"  align="center">
    	<tr>
        	<td>Username</td>
            <td><input type="text" name="username" placeholder="Nhập username..." /></td>
        </tr>
        <tr>
        	<td>Password</td>
            <td><input type="password" name="password" placeholder="Nhập password..." /></td>
        </tr>
        <tr>
        	<td><img src="./modules/function/captcha.php"/></td>
        	<td><input type="input" name="captcha" placeholder="Nhập captcha..." /></td>
        </tr>
        <tr>
        	<td><input type="submit" name="login" value="Đăng Nhập" /></td>

        </tr>
    </table>
		<h2 align="right"><a href="index.php?xem=dangky">Đăng ký một tài khoản mới</a></h2>
</form>

</div>

<?php

	}
?>

