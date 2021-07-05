<?php
/**
 * 封装万能的insert语句
 * insert语句 中变换的只有键值对
 * 字段名=>值
 */
header('content-type:text/html;charset=utf-8');
$table='category';
$data['name']='电视机';
$data['sort_order']=30;
$data['parent_id']=8;

$fields=array_keys($data); //获取所有键
$values=array_values($data); //获取所有值

// 将数组的里面的数据按照一定的格式封装（将每个键对加上反引号）
$fields=array_map(function ($field){
    return "`{$field}`"; // mysql中表需要用``括起来
},$fields);

//将值加上引号
$values=array_map(function ($value){
    return "'{$value}'"; //mysql表中值需要用''括起来
},$values);

$fields_str=implode(',',$fields); // 将数组内容按照指定符号（','）分开
$values_str=implode(',',$values); // 将数组内容按照指定符号（','）分开

$sql="insert into `{$table}` ($fields_str) values ($values_str)";
echo $sql; //insert into `category` (`name`,`sort_order`,`parent_id`) values ('电视机','30','8')