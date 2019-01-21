<?php
$img=imagecreate(100,100);
$color1=imagecolorallocate($img,255,0,0);
$color2=imagecolorallocate($img,0,255,0);
$color3=imagecolorallocate($img,0,0,255);

$num=rand(1,10);
switch ($num%3){
    case 0:
        imagefill($img,0,0,$color1);
        break;
    case 1:
        imagefill($img,0,0,$color2);
        break;
    case 2:
        imagefill($img,0,0,$color3);
        break;
}

header('content-type:image/jpeg');
imagejpeg($img);




