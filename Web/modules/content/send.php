<?php 
	require_once 'modules/function/check.php';
	session_start();
	if (isset($_SESSION['user'])){
		if ($_SESSION['timeout'] + 3600 > time()){
			$error = array();
			$select_user = $_SESSION['user'];
			$sel_c="select * from users where username='$select_user'";
			$run_get=mysqli_query($con,$sel_c);
			$get_info=mysqli_fetch_row($run_get);			
			if(isset($_POST['send'])){
				$userrev = $_POST['userrev'];
				$monney = $_POST['monney'];
				if(checkEmpty($userrev)){
		            $error[] = 'Username: Không được rỗng';
		        }else{
		            if(!checkUsername($userrev)){
		                $error[] = 'Username: Không hợp lệ';
		            }
		        }
				if(checkEmpty($monney)){
		            $error[] = 'Số tiền chuyển: Không được rỗng';
		        }else{
		            if(!checkMonney($monney)){
		                $error[] = 'Số tiền chuyển: Không hợp lệ';
		            }
		        }
		    if(count($error)!=0){
	            echo '<h2 class="error">Lỗi: </h2>';
	            foreach ($error as $value) {
	                echo '<h3 class="error">'.$value.'</h3></br>';
	            }
	            $error =array();
	        }else{
				$sel_c = "select * from users where username='$userrev'";
				$run_check = mysqli_query($con,$sel_c);
				$get_info_rev=mysqli_fetch_row($run_check);
				$check=mysqli_num_rows($run_check);

				if($check ==0){
					echo '<script>alert("Người nhận không tồn tại!")</script>';
				}else{
					$select_monney = $get_info[6];
					if($select_monney < $monney){
						echo '<script>alert("Số tiền chuyển cần nhỏ hơn số tiền hiện tại!")</script>';
					}else{
						$sel_c = "update users set `monney` = '$get_info_rev[6]' + '$monney'  WHERE `username` = '$get_info_rev[1]'; update users set `monney` = '$select_monney' - '$monney'  WHERE `username` = '$get_info[1]';";
						$run_send=mysqli_multi_query($con,$sel_c);
						if($run_send){
							echo '<script>alert("Chuyển tiền thành công")</script>';
							echo '<script>window.location="http://localhost/Project/cmc/index.php?xem=send"</script>';	
						}else{
							echo '<script>alert("Chuyển tiền thất bại! Vui lòng thử lại! ")</script>';
							echo '<script>window.location="http://localhost/Project/cmc/index.php?xem=send"</script>';

						}				
					}
				}
			}
		}
?>

<div class="content_right" style="width:100%;">
	<h1 align="center"><p class="pr">Chuyển tiền</p></h1>
	<div class="sp">
		<div>
			<form action="" method="post">
				<p>Nhập username người nhận</p>
				<input type="text" name="userrev">
				<p>Nhập số tiền muốn chuyển</p>
				<input type="text" name="monney">
				<input type="submit" name="send" value="Chuyển tiền">
			</form>
		</div>
		<div>
			<?php 
				echo '<h2>Thông tin tài khoản</h2>';
				echo '<h3>Tên đăng nhập: '.$get_info[1].' </h3>';
				echo '<h3>Tên đầy đủ: '.$get_info[3].' </h3>';
				echo '<h3>Email: '.$get_info[4].'</h3>';
				echo '<h3>SĐT: '.$get_info[5].'</h3>';
				echo '<h3>Số tiền hiện có: '.$get_info[6].' </h3>';
			?>
		</div>		
	</div>
</div>

<?php
		}else{
			echo '<h1>Bạn cần đăng nhập để chuyển tiền</h1>';
			echo '<a href="index.php?xem=dangnhap">Đăng Nhập</a>';
		}		
	}else{
			echo '<h1>Bạn cần đăng nhập để chuyển tiền</h1>';
			echo '<a href="index.php?xem=dangnhap">Đăng Nhập</a>';
		}

?>






