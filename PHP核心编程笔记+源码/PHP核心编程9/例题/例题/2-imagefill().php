<?php
$img=imagecreate(200,100);
$color1=imagecolorallocate($img,255,0,0);	//给图片分配红色
$color2=imagecolorallocate($img,0,255,0);	//给图片分配绿色
$color3=imagecolorallocate($img,0,0,255);	//给图片分配蓝色
$num=rand(1,10);
switch($num%3) {
	case 0:
		imagefill($img,0,0,$color1);	//给图片填充颜色
		break;
	case 1:
		imagefill($img,0,0,$color2);
		break;
	case 2:
		imagefill($img,0,0,$color3);
		break;

}
header('content-type:image/png');
imagepng($img);
imagedestroy($img);