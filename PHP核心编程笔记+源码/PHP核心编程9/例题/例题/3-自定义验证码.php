<?php
$char_array=array_merge(range('A','Z'),range('a','z'),range(0,9));//生成一个字母和数字的数组
$index=array_rand($char_array,4);	//随机取4个字符，返回的是字符下标
shuffle($index);	//打乱下标
//拼接字符串
$str='';
foreach($index as $i) {
	$str.=$char_array[$i];
}
//创建图片
$img=imagecreate(145,20);
imagecolorallocate($img,0xFF,0x00,0x00);	//背景色
$color=imagecolorallocate($img,0xFF,0xFF,0xFF);	//再次给图片分配一个颜色，用来做前景色
$font=5;	//字号
$x=(imagesx($img)-imagefontwidth($font)*strlen($str))/2;		//文字的起始位置的x轴
$y=(imagesy($img)-imagefontheight($font))/2;		//文字的起始位置的y轴
imagestring($img,$font,$x,$y,$str,$color);	//将字符串写到图片上
header('content-type:image/png');
imagepng($img);
imagedestroy($img);


