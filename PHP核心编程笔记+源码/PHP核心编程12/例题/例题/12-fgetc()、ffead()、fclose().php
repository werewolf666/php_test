<?php
header('content-type:text/html;charset=utf-8');
$fp=fopen('./test.txt','r');
while(!feof($fp)){
	echo fgetc($fp);	//获取一个字节,注意中文占用3个英文大小的字节
}
echo '<hr>';
fclose($fp);	//关闭文件

$path='./test.txt';
$fp=fopen($path,'r');
echo fread($fp,filesize($path));
fclose($fp);

