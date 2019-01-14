<?php
$max_w=300;		//图片最大宽度
$max_h=300;		//图片最大高度
$dst=imagecreatetruecolor($max_w,$max_h);	//目标图
$src=imagecreatefromjpeg('./4.jpg');		//源图
$src_w=imagesx($src);	//源图的宽度
$src_h=imagesy($src);	//源图的高度
//求目标图片的宽高
if($max_w/$max_h<$src_w/$src_h){
	$dst_w=$max_w;
	$dst_h=$max_w*$src_h/$src_w;
}else {
	$dst_h=$max_h;
	$dst_w=$max_h*$src_w/$src_h;
}
//在目标图上显示的位置
$dst_x=(int)(($max_w-$dst_w)/2);
$dst_y=(int)(($max_h-$dst_h)/2);
//生成缩略图
imagecopyresampled($dst,$src,$dst_x,$dst_y,0,0,$dst_w,$dst_h,$src_w,$src_h);
header('content-type:image/png');
imagepng($dst);