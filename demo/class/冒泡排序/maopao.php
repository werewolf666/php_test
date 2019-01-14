<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 下午9:44
 */

$num=array(10,20,13,67,87,19,45);

for($i=1,$n=count($num);$i<$n;$i++){
    for($j=0;$j<$n-$i;$j++){
        if($num[$j]>$num[$j+1]){
            $temp=$num[$j];
            $num[$j]=$num[$j+1];
            $num[$j+1]=$temp;
        }
    }
}

print_r($num);
echo $num;