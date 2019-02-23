<?php
// 自定义验证码的信息
$char_array=array_merge(range('A','Z'),range('a','z'),range(0,9)); //生成随机字符串
$index=array_rand($char_array,4); //随机选取4个字符串

shuffle($index); // 乱序
$str='';
foreach($index as $i){
    $str.=$char_array[$i]; // 拼接选取的字符作为验证吗
}
// 打开背景图片
$bg_path='./captcha/captcha_bg'.rand(1,5).'.jpg';
$img=imagecreatefromjpeg($bg_path);
// 定义前景色
$color=imagecolorallocate($img,0,0,0);
if (rand(1,2)==2){
    $color=imagecolorallocate($img,255,255,255);
}
// 将字符串写到图片上
$font=5;   // 字体大小字号
$x=(imagesx($img)-imagefontwidth($font)*strlen($str))/2; // 字符串验证码中心位置表示
$y=(imagesy($img)-imagefontheight($font))/2;  // 字符串验证码上下位置表示
imagestring($img,$font,$x,$y,$str,$color);	//将字符串写到图片上
header('content-type:image/jpeg');   // 显示字符
imagejpeg($img);

