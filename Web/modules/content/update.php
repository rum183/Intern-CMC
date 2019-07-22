<?php  
	session_start();
	if(isset($_POST['update'])){
		require_once 'modules/function/check.php';
		$select_user = $_SESSION['user'];
		$sel_c="select * from users where username='$select_user'";
		$run_get=mysqli_query($con,$sel_c);
		$get_info=mysqli_fetch_row($run_get);
		$error = array();
		$select_user = $_SESSION['user'];
		$c_fullname=$_POST['c_fullname'];
		$c_username=$_POST['c_username'];
		$c_password=$_POST['c_password'];
		$c_email=$_POST['c_email'];
		$c_phone=$_POST['c_phone'];
		if(checkEmpty($c_username)){
            $c_username = $get_info[1];
        }else{
            if(!checkUsername($c_username)){
                $error[] = 'Username: Không hợp lệ';
            }
        }
        if(checkEmpty($c_password)){
            $c_password = $get_info[2];
        }else{
            if(!checkPassword($c_password)){
                $error[] = 'Password: Không hợp lệ';
            }
        }
        if(checkEmpty($c_fullname)){
            $c_fullname = $get_info[3];
        }else{
            if(!checkFullname($c_fullname)){
                $error[] = 'Tên Đầy Đủ: Không hợp lệ';
            }
        }
        if(checkEmpty($c_email)){
            $c_email = $get_info[4];
        }else{
            if(!checkEmail($c_email)){
                $error[] = 'Email: Không hợp lệ';
            }
        }
        if(checkEmpty($c_phone)){
            $c_phone = $get_info[5];
        }else{
            if(!checkPhone($c_phone)){
                $error[] = 'SĐT: Không hợp lệ';
            }
        }

        if(count($error)!=0){
            echo '<h2 class="error">Lỗi: </h2>';
            foreach ($error as $value) {
                echo '<h3 class="error">'.$value.'</h3></br>';
            }
            $error =array();
        }else{
			$sel_c="update users set `fullName` = '$c_fullname',`username` = '$c_username',`password`='$c_password',`email`= '$c_email',`phone`= '$c_phone'  WHERE `username` = '$select_user';";	
			$run_update=mysqli_query($con,$sel_c);
			if($run_update){
				echo '<script>alert("Cập nhật thông tin thành công")</script>';
				echo '<script>window.location="http://localhost/Project/cmc/index.php?xem=thongtin"</script>';
				
			}else{
				echo '<script>alert("Cập nhật thông tin thất bại! Vui lòng thử lại")</script>';
				echo '<script>window.location="http://localhost/Project/cmc/index.php?xem=update"</script>';
			}	
		}
	}

?>

<div class="content_right" style="width:100%;">
	<h1 align="center"><p class="pr">Cập nhật thông tin</p></h1>
	<div class='sp'>
		<div>
			<form action="" method="post" enctype="multipart/form-data">
		    	<table width="750">
		        	<tr>
		            	<td>Tên đầy đủ</td>
		                <td><input type="text" name="c_fullname"></td>
		            </tr>
		            <tr>
		            	<td>Username</td>
		                <td><input type="text" name="c_username"></td>
		            </tr>
		            <tr>
		            	<td>Password</td>
		                <td><input type="password" name="c_password"></td>
		            </tr>
		              <tr>
		            	<td>Email</td>
		                <td><input type="email" name="c_email"></td>

		            </tr>
		            <tr>
		            	<td>Số Điện Thoại</td>
		                <td><input type="phone" name="c_phone"></td>
		            </tr>
		            <tr>
		            	<td align="right"><input type="submit" name="update" value="Cập Nhật"></td>
		            </tr>
		        </table>
		    </form>			
		</div>		
	</div>
</div>