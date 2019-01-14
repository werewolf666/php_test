<?php
//$fp=fopen('./test.txt','w');  //清空写
$fp=fopen('./test.txt','a');	//追加
for($i=1; $i<=10; $i++) {
	fputs($fp,"{$i}:我很好\r\n");
}



