<?php
$img=imagecreate(200,100);	//创建了200*100的图片
//var_dump($img);	//resource(2) of type (gd) 
imagecolorallocate($img,255,0,0);	//给图片分配一个颜色
//header('content-type:image/jpeg');	//告诉浏览器通过jpeg的格式去解析此图片
//imagejpeg($img);	//图片按jpeg格式显示
imagepng($img,'./aa.png');	//将图片保存为aa.png
imagedestroy($img);	//销毁图片资源

