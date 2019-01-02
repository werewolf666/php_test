<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 18-12-17
 * Time: 下午3:53
 */

//$stu=array('name'=>'libai','age'=>18,'sex'=>'male');
//
//$keys=array_keys($stu);//获取所有键值
//print_r($keys);
//echo '<br>';
//$values=array_values($stu);//获取值
//print_r($values);

//将所有的键值对结合起来
//$keys=array('name','sex','age');
//$values=array('libai','male',18);
//
//$ret=array_combine($keys,$values);
//
//print_r($ret);
//var_dump($ret);

////查找数据里面是否存在查找值，不区分大小写 in_array(值，数组)
//$arr=array('name'=>'libai','zhangsan','lisi');
//if(in_array('libai',$arr))
//    echo 'ok';
//else
//    echo 'no';

//implode 将数组的值拼接为字符串
//explode 将字符串分割为数组

$stu=array('y','u','a','n');

echo $ret=implode('',$stu);

$stu1='yuan';

echo $ret1=explode('',$ret);