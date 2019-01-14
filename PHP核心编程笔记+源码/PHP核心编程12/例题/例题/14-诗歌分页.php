<?php
header('content-type:text/html;charset=utf-8');
$fp=fopen('./shige.txt','r');
$str='';
while(!feof($fp)) {
	$str.=fgets($fp).'<br>';
}
//通过'--'来分割
$array=explode('--',$str);
$pageno=isset($_GET['pageno'])?$_GET['pageno']:1;
echo $array[$pageno-1];
echo '<hr>';
for($i=1,$n=count($array); $i<=$n; $i++) {
	echo "<a href='?pageno={$i}'>{$i}</a>&nbsp;";
}

