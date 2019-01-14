<?php
$char_array=array_merge(range('A','Z'),range('a','z'),range(0,9));//生成一个字母和数字的数组
$index=array_rand($char_array,4);	//随机取4个字符，返回的是字符下标
shuffle($index);	//打乱下标
//拼接字符串
$str='';
foreach($index as $i) {
	$str.=$char_array[$i];
}

//打开背景图
$bg_path='./captcha/captcha_bg'.rand(1,5).'.jpg';	//背景图地址
$img=imagecreatefromjpeg($bg_path);	//打开图片
//定义前景色
$color=imagecolorallocate($img,0,0,0);
if(rand(1,2)==2)
	$color=imagecolorallocate($img,255,255,255);
//将字符串写到图片上
$font=5;
$x=(imagesx($img)-imagefontwidth($font)*strlen($str))/2;
$y=(imagesy($img)-imagefontheight($font))/2;
imagestring($img,$font,$x,$y,$str,$color);
header('content-type:image/png');
imagepng($img);
imagedestroy($img);






