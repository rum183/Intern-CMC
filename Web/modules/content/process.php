<?php
	session_start();
	$select_user = $_SESSION['user'];
	$sel_c="select * from users where username='$select_user'";
	$run_get=mysqli_query($con,$sel_c);
	$get_info=mysqli_fetch_row($run_get);
	$select_monney = $get_info[6];
	if(isset($_POST['pack1'])){
		if($select_monney < 200000){
			echo '<script>alert("Tài khoản cần tối thiểu 200.000")</script>';					
		}else{
		echo "<h3>Gói 1: Tài khoản sẽ bị trừ 200.000 VND</h3>";
		?>
		<div class="sp">
			<div>
				<form action="" method="post">
					<input type="submit" name="accept1" value="Chấp nhận">
					<input type="submit" name="cancel" value="Hủy bỏ">
				</form>
			</div>
		</div>
		<?php
		}
	}elseif(isset($_POST['pack2'])){
		if($select_monney < 200000){
			echo '<script>alert("Tài khoản cần tối thiểu 1.200.000")</script>';					
		}else{
		echo "<h3>Gói 2: Tài khoản sẽ bị trừ 1.200.000 VND</h3>";
		?>
		<div class="sp">
			<div>
				<form action="" method="post">
					<input type="submit" name="accept2" value="Chấp nhận">
					<input type="submit" name="cancel" value="Hủy bỏ">
				</form>
			</div>
		</div>
		<?php			
		}		
	}elseif(isset($_POST['accept1'])){
		$time = time() +60;
		$sel_c="update users set `VIP` = '1'  WHERE `username` = '$select_user'; update users set `monney` = '$select_monney'-'200000'  WHERE `username` = '$select_user';update users set `timevip` = '$time'  WHERE `username` = '$select_user';";
		$run_upgrade=mysqli_multi_query($con,$sel_c);
		if($run_upgrade == true){
			echo '<script>alert("Nâng cấp thành công Gói 1")</script>';
			echo '<script>window.location="http://localhost/Project/cmc/index.php?xem=nangcap"</script>';	
		}else{
			echo '<script>alert("Nâng cấp thất bại! Vui lòng thử lại")</script>';
			echo '<script>window.location="http://localhost/Project/cmc/index.php?xem=nangcap"</script>';				
		}
	}elseif(isset($_POST['accept2'])){
		$time = time() + 120;
		$sel_c="update users set `VIP` = '1'  WHERE `username` = '$select_user'; update users set `monney` = '$select_monney'-'1200000'  WHERE `username` = '$select_user';update users set `timevip` = '$time'  WHERE `username` = '$select_user';";
		$run_upgrade=mysqli_multi_query($con,$sel_c);
		if($run_upgrade == true){
			echo '<script>alert("Nâng cấp thành công Gói 2")</script>';
			echo '<script>window.location="http://localhost/Project/cmc/index.php?xem=nangcap"</script>';	
		}else{
			echo '<script>alert("Nâng cấp thất bại! Vui lòng thử lại!")</script>';			
			echo '<script>window.location="http://localhost/Project/cmc/index.php?xem=nangcap"</script>';	
		}
	}elseif(isset($_POST['cancel'])){
		header('location:index.php?xem=process');	
	}else{
		?>
<div class="content_right" style="width:100%;">
	<h1 align="center"><p class="pr">Nâng cấp tài khoản</p></h1>
	<div class="sp">
		<div>
			<form action="" method="post">
				<input type="submit" name="pack1" value="Gói 1">
				<input type="submit" name="pack2" value="Gói 2">
			</form>
		</div>
	</div>
</div>


		<?php
	}

?>
