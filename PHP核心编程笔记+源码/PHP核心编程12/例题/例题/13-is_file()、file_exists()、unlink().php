<?php
if(is_file('./test.txt'))	//是否是文件
	echo 'yes';
if(file_exists('./test.txt'))	//文件是否存在
	unlink('./test.txt');	//删除文件

