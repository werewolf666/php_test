<?php
$img=imagecreate(200,100);	//创建图片
imagecolorallocate($img,255,0,0);	//给图片分配一个红色背景
$white=imagecolorallocate($img,255,255,255);	//给图片分配一个白色
imagestring($img,5,100,50,'abcd',$white);		//在红色背景上写白字
$green=imagecolorallocate($img,0,255,0);		//给图片分配一个绿色
imagefill($img,10,10,$green);					//在图片上填充绿色
header('content-type:image/png');
imagepng($img);



