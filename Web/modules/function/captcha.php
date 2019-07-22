<?php 
	session_start();
	header('Content-type: image/jpeg');
	$captcha = imagecreate(100, 50);

	imagecolorallocate($captcha, 42, 194, 42);

	$content = substr(md5(time()*10 - 1234),0,5);
	$text = imagettftext($captcha, 18,0, 10, 30, imagecolorallocate($captcha, 15, 24, 15), 'font-captcha.ttf', $content);

	imagejpeg($captcha);
	$_SESSION['captcha'] = $content;
	$_SESSION['timeout-cpt'] = time();
	imagedestroy($captcha);
?>
