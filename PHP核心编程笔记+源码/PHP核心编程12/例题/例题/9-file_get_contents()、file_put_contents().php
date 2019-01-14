<?php
//$str="锄禾日当午，\r\n汗滴禾下土。\r\n谁知盘中餐，\r\n粒粒皆辛苦。";
//file_put_contents('./test.txt',$str);	//将内容写进文件中

header('content-type:text/html;charset=utf-8');
echo file_get_contents('./test.txt');

