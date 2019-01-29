<?php
/**
 * 生成等比缩略图
 */
$max_w=300;
$max_h=300;
$dst=imagecreatetruecolor($max_w,$max_h); //目标图
$src=imagecreatefromjpeg('./uploads/2.jpg'); // 源图
$src_w=imagesx($src); //源图宽度
$src_h=imagesy($src); //源图高度
if ($max_w/$max_h<$src_w/$src_h)
{ //计算源图和目标图的等比缩放图宽高度
    $dst_w=$src_w;
    $dst_h=$max_w*$src_h/$src_w;
}else
    {//计算源图和目标图的等比缩放图宽高度
    $dst_h=$max_h;
    $dst_w=$max_h*$src_w/$src_h;
    }
$dst_x=(int)(($max_w-$dst_w)/2); //在目标图上的显示缩略图
$dst_y=(int)(($max_h-$dst_h)/2);

imagecopyresampled($dst,$src,$dst_x,$dst_y,0,0,$dst_w,$dst_h,$src_w,$src_h); //生成缩略图
ob_end_clean();
header('content-type:image/png');
imagepng($dst,'./uploads/since_sm_2.png');
imagedestroy($dst);
imagedestroy($src);