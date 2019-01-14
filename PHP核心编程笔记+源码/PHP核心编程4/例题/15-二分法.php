<?php
$num=array(140,23,78,69,5,12,8);
function sortnum($list) {
	$len=count($list);	//总长度
	if($len==0 || $len==1)
		return $list;
	$temp=$list[0];
	$small=$big=array();
	for($i=1; $i<$len; $i++) {
		if($list[$i]<$temp)
			$small[]=$list[$i];
		else
			$big[]=$list[$i];
	}
	$small_array=sortnum($small);
	$big_array=sortnum($big);
	return array_merge($small_array,array($temp),$big_array);
}
print_r(sortnum($num));

