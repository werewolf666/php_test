<?php
header('content-type:text/html;charset=utf-8');
mysql_connect('localhost','root','aa');
mysql_query('set names utf8');
mysql_query('use php4');

$table='category';
$data['id']=10;
$data['name']='电视';
$data['sort_order']=30;
$data['parentid']=8;
//获取字段
$fields=array_keys($data);
//获取主键字段
function getPrimaryKey($table) {
	$rs=mysql_query("desc `{$table}`");
	while($rows=mysql_fetch_assoc($rs)) {
		if($rows['Key']=='PRI') {
			return $rows['Field'];
		}
	}
}
$pk=getPrimaryKey($table);
//去除主键
$index=array_search($pk,$fields);	//主键的下标
unset($fields[$index]);	//销毁主键
//遍历循环字段
$fields=array_map(function($field) use ($data){
	return "`{$field}`='{$data[$field]}'";
},$fields);
$fields=implode(',',$fields);
$sql="update `{$table}` set {$fields} where `{$pk}`=$data[$pk]";

echo $sql;