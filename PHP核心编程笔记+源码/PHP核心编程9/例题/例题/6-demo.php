<?php
header('content-type:text/html;charset=utf-8');
$char_array=array('锄','禾','日','当','午','床','前','明','月','光');
$index=array_rand($char_array,4);	//随机取4个字符，返回的是字符下标
shuffle($index);	//打乱下标
//拼接字符串
$str='';
foreach($index as $i) {
	$str.=$char_array[$i];
}
//将中文写到图片上
$font=9;
$img=imagecreate(80,30);
imagecolorallocate($img,255,0,0);
$color=imagecolorallocate($img,255,255,255);
//$x=(imagesx($img)-imagefontwidth($font)*strlen($str))/2;		//文字的起始位置的x轴
//$y=(imagesy($img)-imagefontheight($font))/2;		//文字的起始位置的y轴
ImageTTFText($img, $font, 10, 20, 20, $color, "simhei.ttf", $str);		//中文的输出方法
header('content-type:image/png');
imagepng($img);