<?php
header('content-type:text/html;charset=utf-8');

$table='category';
$data['name']='电视';
$data['sort_order']=30;
$data['parentid']=8;

$fields=array_keys($data);		//获取所有的键，
$values=array_values($data);	//获取所有值
//将fields数组中的每个元素添加上反引号
$fields=array_map(function($field){
	return "`{$field}`";
},$fields);
$fields_str=implode(',',$fields);	//将字段用逗号分隔
//将values数组中的值每个元素都加上引号
$values=array_map(function($value){
	return "'{$value}'";
},$values);
$values_str=implode(',',$values);
//拼接字符串
$sql="insert into `{$table}` ({$fields_str}) values ($values_str)";
echo $sql;


