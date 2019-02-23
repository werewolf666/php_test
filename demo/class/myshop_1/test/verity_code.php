<?php

// 自定义验证码的信息

$char_array=array_merge(range('A','Z'),range('a','z'),range(0,9)); //生成随机字符串
//var_dump($char_array);

$index=array_rand($char_array,4); //随机选取4个字符串
//var_dump($index);

shuffle($index); // 乱序

$str='';
foreach($index as $i){
    $str.=$char_array[$i]; // 拼接选取的字符作为验证吗
}

$img=imagecreate(145,20); // 生成图片
imagecolorallocate($img,0xFF,0x00,0x00); //背景色
$color=imagecolorallocate($img,0xFF,0xFF,0xFF); // 字体框的颜色
$font=5;   // 字体大小字号
$x=(imagesx($img)-imagefontwidth($font)*strlen($str))/2; // 字符串验证码中心位置表示
$y=(imagesy($img)-imagefontheight($font))/2;  // 字符串验证码上下位置表示

imagestring($img,$font,$x,$y,$str,$color);	//将字符串写到图片上

header('content-type:image/jpeg');   // 显示字符
imagejpeg($img);