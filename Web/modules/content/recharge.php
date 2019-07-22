<?php
	session_start();
	if (isset($_SESSION['user'])){
		if ($_SESSION['timeout'] + 3600 > time()){
			$select_user = $_SESSION['user'];
			$sel_c="select * from users where username='$select_user'";
			$run_get=mysqli_query($con,$sel_c);
			$get_info=mysqli_fetch_row($run_get);
			
			if(isset($_POST['naptien'])){
				$c_code=$_POST['code'];
				$sel_c="select * from carts where code='$c_code'";
				$run_get_code=mysqli_query($con,$sel_c);
				$get_code=mysqli_fetch_row($run_get_code);
				if($get_code[1] == Null){
					echo '<script>alert("Mã thẻ không chính xác!")</script>';
				}else{
					$sel_c="update users set `monney` = '$get_info[6]'+'$get_code[2]'  WHERE `username` = '$get_info[1]'; delete FROM cart WHERE `code` ='$c_code';";
					$run_recharge=mysqli_multi_query($con,$sel_c);
					if($run_recharge == true){
						echo '<script>alert("Nạp tiền thành công")</script>';
						echo '<script>window.location="http://localhost/Project/cmc/index.php?xem=naptien"</script>';
					}else{
						echo '<script>alert("Nạp tiền thất bại! Vui lòng thử lại")</script>';
					}

				}
			}

		?>

<div class="content_right" style="width:100%;">
	<h1 align="center"><p class="pr">Nạp tiền</p></h1>
	<div class='sp'>
		<div>
			<form action="" method="post">
				<h3>Nhập mã thẻ</h3>
				<input type="text" name="code">
				<input type="submit" name="naptien" value="Nạp tiền">
			</form>
		</div>
		<div>
			<?php 
				echo '<h2>Thông tin tài khoản</h2>';
				echo '<h3>Tên đăng nhập: '.$get_info[1].' </h3>';
				echo '<h3>Tên đầy đủ: '.$get_info[3].' </h3>';
				echo '<h3>Số tiền hiện có: '.$get_info[6].' VND </h3>';
			?>
		</div>

	</div>

</div>
<?php


		}else{
			echo '<h1>Bạn cần đăng nhập để nạp tiền</h1>';
			echo '<a href="index.php?xem=dangnhap">Đăng Nhập</a>';
		}
	}else{
		echo '<h1>Bạn cần đăng nhập để nạp tiền</h1>';
		echo '<a href="index.php?xem=dangnhap">Đăng Nhập</a>';
	}

?>