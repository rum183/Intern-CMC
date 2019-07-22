<?php
	require_once 'modules/function/check.php';
	session_start();
	if (isset($_SESSION['user'])){
		if ($_SESSION['timeout'] + 3600 > time()){
			if(isset($_POST['thanhtoan'])){
				$sl=$_POST['soluong'];
				$price = $_GET['price'];
				$select_user = $_SESSION['user'];
				checkVIP($select_user);
				$sel_c="select * from users where username='$select_user'";
				$run_get=mysqli_query($con,$sel_c);
				$get_info=mysqli_fetch_row($run_get);
				$total = $sl * $price;
				if($get_info[7] == 1){
					$total -= $total*30/100;
				}

				if ($total > $get_info[6]){
					echo '<script>alert("Bạn không đủ tiền trong tài khoản!")</script>';
				}else{
					$sel_c = "update users set `monney` = '$get_info[6]' - '$total'  WHERE `username` = '$get_info[1]';";
					$run_buy=mysqli_query($con,$sel_c);
						if($run_buy){
							echo '<script>alert("Mua hàng thành công")</script>';
						}else{
							echo '<script>alert("Mua hàng thất bại! Vui lòng thử lại")</script>';
						}
				}
			}
?>
			
<div class="content_right" style="width:100%;">
	<h1 align="center"><p class="pr">Thanh toán</p></h1>
	<div class="sp">
		<div >
			<h5>Nhập số lượng sản phẩm</h5>
			<form action="" method="post">
			<input type="text" name="soluong">
			<input type="submit" name="thanhtoan" value="Thanh toan">
			</form>
		</div>
		<div>
			<h4>Thông tin sản phẩm</h4>
			<p>Tên sản phẫm: Sản phẩm 1</p>
            <img src="./images/laptop1.png" width="200" height="150"/>
            <p>Giá: 1000000</p>
		</div>
			
	</div>

</div>


			<?php
		}else{
			session_unset();
			echo '<h1>Bạn cần đăng nhập để mua hàng</h1>';
			echo '<a href="index.php?xem=dangnhap">Đăng Nhập</a>';
		}
	}else{
		echo '<h1>Bạn cần đăng nhập để mua hàng</h1>';
		echo '<a href="index.php?xem=dangnhap">Đăng Nhập</a>';
	}









