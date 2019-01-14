<?php
header('content-type:text/html;charset=utf-8');
$fp=fopen('./test.txt','r');	//打开文件读取
while(!feof($fp)){	//文件指针不在文件末尾就读取
	echo fgets($fp),'<br>';
}
fseek($fp,0);	//将文件指针移动到文件的最前面
while(!feof($fp)){	//文件指针不在文件末尾就读取
	echo fgets($fp),'<br>';
}


