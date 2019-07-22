<?php
    require_once 'modules/function/check.php';
	if(isset($_POST['register'])){
        $error = array();
		$c_fullname=$_POST['c_fullname'];
		$c_username=$_POST['c_username'];
		$c_password=$_POST['c_password'];
		$c_email=$_POST['c_email'];
		$c_phone=$_POST['c_phone'];
        $sel_c="select * from users where username='$c_username'";
        $run_get=mysqli_query($con,$sel_c);
        $get_info=mysqli_fetch_row($run_get);
        
        if(checkEmpty($c_username)){
            $error[] = 'Username: Không được rỗng';
        }else{
            if($c_username == $get_info[1]){
                $error[] = 'Username: Đã tồn tại';
            }elseif(!checkUsername($c_username)){
                $error[] = 'Username: Không hợp lệ';
            }
        }
        if(checkEmpty($c_password)){
            $error[] = 'Password: Không được rỗng';
        }else{
            if(!checkPassword($c_password)){
                $error[] = 'Password: Không hợp lệ';
            }
        }
        if(checkEmpty($c_fullname)){
            $error[] = 'Tên đầy đủ: Không được rỗng';
        }else{
            if(!checkFullname($c_fullname)){
                $error[] = 'Tên đầy đủ: Không hợp lệ';
            }
        }
        if(checkEmpty($c_email)){
            $error[] = 'Email: Không được rỗng';
        }else{
            if(!checkEmail($c_email)){
                $error[] = 'Email: Không hợp lệ';
            }
        }
        if(checkEmpty($c_phone)){
            $error[] = 'SĐT: Không được rỗngg';
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
            $insert_c="insert into users(fullName,username,password,email,phone) values('$c_fullname','$c_username','$c_password','$c_email','$c_phone')";
            $run_c=mysqli_query($con,$insert_c);
            if($run_c){
                echo '<script>alert("Đăng Ký Thành Công")</script>';
            
            }else{
                echo '<script>alert("Đăng Ký Thất Bại! Vui lòng thử lại")</script>';
            }
        }          
    }
?>
        


<div class="content_right" style="width:100%;">
<h1 align="center"><p class="pr">Đăng ký tài khoản</p></h1>
	<form action="index.php?xem=dangky" method="post" enctype="multipart/form-data">
    	<table width="750">
        	<tr>
            	<td>Tên đầy đủ</td>
                <td><input type="text" name="c_fullname" placeholder="Nhập Full Name..."></td>
            </tr>
            <tr>
            	<td>Username</td>
                <td><input type="text" name="c_username" placeholder="Nhập username..."></td>
            </tr>
            <tr>
            	<td>Password</td>
                <td><input type="password" name="c_password" placeholder="Nhập password..."></td>
            </tr>
              <tr>
            	<td>Email</td>
                <td><input type="email" name="c_email" placeholder="Nhập email..."></td>

            </tr>
            <tr>
            	<td>Số Điện Thoại</td>
                <td><input type="phone" name="c_phone" placeholder="Nhập SĐT..."></td>
            </tr>
            <tr>
            	<td align="right"><input type="submit" name="register" value="Đăng ký"></td>
            </tr>
        </table>
    </form>
    <h2><a href="index.php?xem=dangnhap">Quay lại đăng nhập</a></h2>
</div>