<?php
/**
 * json
 * js中使用json
 */
//将索引数组变换json
$arr=array('tom','jack','alex');
$str=json_encode($arr);//将数组转化为json
echo $str ,'<br>' ;//["tom","jack","alex"]
json_decode($str);//将json转成PHP数据
//将关联数组变换json :变成大括号包括的对象
$stu1=array(
    'name'=>'alex',
    'age'=>18,
    'sex'=>'man'
);
echo json_encode($stu1),'<hr>';//{"name":"alex","age":18,"sex":"man"}
//既有索引数组和关联数组
$stu2=array(
    'name'=>'jack',
    'tom',
    'alex'
);
echo json_encode($stu2),'<hr>';//{"name":"jack","0":"tom","1":"alex"} 只要包含有一个关联数组就转换成对象