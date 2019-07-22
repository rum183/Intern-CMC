<?php
	session_start();
	if (isset($_SESSION['user'])){
		if ($_SESSION['timeout'] + 3600 > time()){
			$select_user = $_SESSION['user'];
			$sel_c="select * from users where username='$select_user'";
			$run_get=mysqli_query($con,$sel_c);
			$get_info=mysqli_fetch_row($run_get);
			if(isset($_POST['upgrade'])){
				$c_vip=$get_info[7];
				if($c_vip == 1){
					?>
					<div class="sp">
						<div>
							<h3>Bạn đã là thành viên VIP</h3>
						</div>
					</div>
					<?php
				}else{
					$c_monney = $get_info[6];
					if($c_monney <=0){
						echo '<script>alert("Bạn không đủ tiền trong tài khoản")</script>';
					}else{
						header('location:index.php?xem=process');

			}
		}
	}	

?>


<div class="content_right" style="width:100%;">
	<h1 align="center"><p class="pr">Nâng cấp tài khoản</p></h1>
	<div class="sp">
		<div>
			<p>Khi nâng cấp VIP, bạn sẽ được giảm giá 30% khi mua hàng!</p>
			<p>Cần tối thiểu 200.000 VNĐ cho Gói 1 (tháng)</p>
			<p>Cần tối thiểu 1.500.000 VNĐ cho Gói 2 (năm)</p>
		</div>
		<div>
			<form action="" method="post">
				<input type="submit" name="upgrade" value="Nâng Cấp">
			</form>
		</div>
	</div>
</div>
<?php
		}else{
			echo '<h1>Bạn cần đăng nhập để nâng cấp</h1>';
			echo '<a href="index.php?xem=dangnhap">Đăng Nhập</a>';			
		}	

	}else{
			echo '<h1>Bạn cần đăng nhập để nâng cấp</h1>';
			echo '<a href="index.php?xem=dangnhap">Đăng Nhập</a>';			
		}

?>
