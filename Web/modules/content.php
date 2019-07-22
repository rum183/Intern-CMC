
  <div class="content">
        <div class="content_right">
        	<?php
			if(isset($_GET['xem'])){
				$tam=$_GET['xem'];
			}else{
				$tam='';
				}
			
			if($tam=='trangchu'){
				include('modules/content/product.php');
			}else if($tam=='dangky'){
				include('modules/content/register.php');
			}elseif($tam=='dangnhap'){
				include('modules/content/login.php');
			}elseif($tam=='naptien'){
				include('modules/content/recharge.php');
			}elseif($tam=='thongtin'){
				include('modules/content/info.php');
			}elseif($tam=='nangcap'){
				include('modules/content/upgrade.php');
			}elseif($tam=='thanhtoan'){
				include('modules/content/payment.php');
			}elseif($tam=='process'){
				include('modules/content/process.php');
			}elseif($tam=='send'){
				include('modules/content/send.php');
			}elseif($tam=='update'){
				include('modules/content/update.php');
			}elseif($tam=='logout'){
				include('modules/content/logout.php');
			}else
				include('modules/content/product.php');
				
			?>
        </div>
    </div>
    <div class="clear"></div>