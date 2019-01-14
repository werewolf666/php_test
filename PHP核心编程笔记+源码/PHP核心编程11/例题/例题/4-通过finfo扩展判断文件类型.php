<?php
$path='F:\wamp\apache\htdocs\aa.jpg';
$finfo=finfo_open(FILEINFO_MIME);	//创建一个finfo资源
$info=finfo_file($finfo,$path);
echo $info,'<br>';	//text/html; charset=us-ascii
$array=explode(';',$info);
echo $array[0];