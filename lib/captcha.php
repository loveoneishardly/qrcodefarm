<?php
	session_start();
	function LoadPNG($imgname)
	{
	    /* Attempt to open */
	    $im = @imagecreatefrompng($imgname);

	    /* See if it failed */
	    if(!$im)
	    {
	        /* Create a blank image */
	        $im  = imagecreatetruecolor(150, 30);
	        $bgc = imagecolorallocate($im, 255, 255, 255);
	        $tc  = imagecolorallocate($im, 0, 0, 0);

	        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

	        /* Output an error message */
	        imagestring($im, 1, 5, 5, 'Error loading ' . $imgname, $tc);
	    }

	    return $im;
	}

	$img = LoadPNG('img/captcha.png');

	$chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'm', 'n', 'o', 'p', 'q', 'r', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5', '6', '7', '8', '9');
	$str1 = $chars[mt_rand(0, count($chars)-1)];
	$str2 = $chars[mt_rand(0, count($chars)-1)];
	$str3 = $chars[mt_rand(0, count($chars)-1)];
	$str4 = $chars[mt_rand(0, count($chars)-1)];
	$str5 = $chars[mt_rand(0, count($chars)-1)];
	$font = dirname(__FILE__).'/fonts/creativeblock.ttf';
	$size = mt_rand(16, 20);

	$_SESSION['captcha'] = $str1.$str2.$str3.$str4.$str5;



	$angle = mt_rand(-5, 5);
	$color1 = imagecolorallocate($img, 55, 55, 55);
	$color2 = imagecolorallocate($img, 29, 120, 35);
	$color3 = imagecolorallocate($img, 90, 42, 15);
	$color4 = imagecolorallocate($img, 220, 9, 30);
	$color5 = imagecolorallocate($img, 76, 2, 98);

	$textsize = imagettfbbox($size, $angle, $font, "XXXX");

	$twidth = abs($textsize[2]-$textsize[0]);
	$theight = abs($textsize[5]-$textsize[3]);

	$x = mt_rand(5, 50);
	$y = mt_rand(18, 30);

	imagettftext($img, $size, $angle, $x, $y, $color1, $font, $str1);
	imagettftext($img, $size, $angle, $x+mt_rand(20, 25), $y+mt_rand(1, 3), $color2, $font, $str2);
	imagettftext($img, $size, $angle, $x+mt_rand(45, 50), $y+mt_rand(1, 3), $color3, $font, $str3);
	imagettftext($img, $size, $angle, $x+mt_rand(65, 70), $y+mt_rand(1, 3), $color4, $font, $str4);
	imagettftext($img, $size, $angle, $x+mt_rand(85, 90), $y+mt_rand(1, 3), $color5, $font, $str5);

	header("Content-type: image/png");
	imagepng($img);
	imagedestroy($img);

	echo $_SESSION['captcha'];
?>