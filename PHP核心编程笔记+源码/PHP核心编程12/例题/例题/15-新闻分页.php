<?php
header('content-type:text/html;charset=utf-8');
$fp=fopen('./news.txt','r');
$str='';
$n=0;
while(!feof($fp)) {
	$str.=fgets($fp);
	if(++$n%20==0)
		$str.='<<<<<';
}
$array=explode('<<<<<',$str);
$pageno=isset($_GET['pageno'])?$_GET['pageno']:1;
echo $array[$pageno-1];
echo '<hr>';
for($i=1,$n=count($array); $i<=$n; $i++) {
	echo "<a href='?pageno={$i}'>{$i}</a>&nbsp;";
}


