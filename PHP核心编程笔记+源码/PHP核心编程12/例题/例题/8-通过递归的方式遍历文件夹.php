<?php
//通过递归实现遍历文件夹
function getFile($path) {
	$folder=opendir($path);		//打开文件夹
	echo '<ul>';
	while($f=readdir($folder)){
		if($f=='.' || $f=='..')
			continue;
		echo '<li>',$f,'</li>';
		if(is_dir("{$path}/{$f}")){	//如果当前是文件夹继续递归
			getFile("{$path}/{$f}");
		}		
	}
	echo '</ul>';
}
$path=$_SERVER['DOCUMENT_ROOT'];	//根目录
getFile($path);
closedir();	//关闭文件夹

