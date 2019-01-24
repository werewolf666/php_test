<?php
/**
 * 生成缩略图
 * 函数：imagecopyresampled() 剪裁图片
 */
//创建一个真彩色原图
$dst=imagecreatetruecolor(200,200);//创建一个真彩色图 desert
$src=imagecreatefromjpeg('./uploads/1.jpg');//打开源图片
$width=imagesx($src);
$hight=imagesy($src);
//imagecopyresampled($dst,$src,0,0,240,100,200,200,180,176); //所有参数必填
//imagecopyresampled($dst,$src,0,0,240,100,200,200,$width,$hight); //所有参数必填
imagecopyresampled($dst,$src,13,10,240,100,200,200,$width,$hight); //所有参数必填
ob_end_clean();
header('content-type:image/png');
imagepng($dst,'./uploads/sm_1.png');
imagedestroy($dst);
imagedestroy($src);
