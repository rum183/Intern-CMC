<?php
	require_once 'modules/function/check.php';
	session_start();
	if (isset($_SESSION['user'])){
		if ($_SESSION['timeout'] + 3600 > time()){
			$select_user = $_SESSION['user'];
			checkVIP('$select_user');
			$sel_c="select * from users where username='$select_user'";
			$run_get=mysqli_query($con,$sel_c);
			$get_info=mysqli_fetch_row($run_get);
			$vip = 'Bạn chưa là thành viên VIP!';
			if($get_info[7] == 1){
				$vip = 'Bạn đang là thành viên VIP!';
			}

?>
<div class="content_right" style="width:100%;">
	<h1 align="center"><p class="pr">Thông tin cá nhân</p></h1>
	<div class='sp'>
		<div>
			<?php 
				echo '<h2>Thông tin tài khoản</h2>';
				echo '<h3>Tên đăng nhập: '.$get_info[1].' </h3>';
				echo '<h3>Tên đầy đủ: '.$get_info[3].' </h3>';
				echo '<h3>Email: '.$get_info[4].'</h3>';
				echo '<h3>SĐT: '.$get_info[5].'</h3>';
				echo '<h3>Số tiền hiện có: '.$get_info[6].' VND </h3>';
				echo '<h3>Thành viên VIP: '.$vip.'</h3>';
			?>
		</div>
		<div>
			<form action="index.php?xem=update" method="post">
				<input type="submit" name="change" value="Cập nhật thông tin">
			</form>
	</div>
	<?php echo '<h2 align="right"><a href="index.php?xem=logout&action=logout">Đăng xuất</a></h2>';?>
		</div>
</div>

<?php
		}else{
			session_unset();
			echo '<h1>Bạn cần đăng nhập để xem thông tin</h1>';
			echo '<a href="index.php?xem=dangnhap">Đăng Nhập</a>';
		}
	}else{
		echo '<h1>Bạn cần đăng nhập để xem thông tin</h1>';
		echo '<a href="index.php?xem=dangnhap">Đăng Nhập</a>';
		}
?>

