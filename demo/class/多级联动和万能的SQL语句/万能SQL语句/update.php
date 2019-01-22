<?php
/**
 * 封装万能的updata语句
 * updata语句 中变换的只有键值对
 * 字段名=>值
 */
$link=mysql_connect('localhost:3306','root','root');
mysql_select_db('project');
mysql_query('set names utf8');

$table='category';
$data['id']=10; //更新主键
$data['name']='电视机';
$data['sort_order']=30;
$data['parent_id']=8;

//获取字段
$fields=array_keys($data);

/**
 *获取主键字段，目的是为了在updata语句中去掉这个主键
 * desc category 结果：
 * Field 	Type 	Null 	Key 	Default 	Extra
id 	int(10) unsigned 	NO 	PRI 	NULL	auto_increment
name 	varchar(50) 	NO 		NULL
sort_order 	int(11) 	NO 		50
parent_id 	int(10) unsigned 	NO 		NULL
 */
function getPrimaryKey($table){
    $sql="desc {$table}";

    $rs=mysql_query($sql);
    while ($rows=mysql_fetch_assoc($rs)){
        if ($rows['Key']=='PRI'){
            return $rows['Field'];
        }
    }
}

//去除主键
$pk=getPrimaryKey($table);
$index=array_search($pk,$fields);//找出主键下标
unset($fields[$index]);//销毁主键，销毁数据内的值

//遍历循环数组内容并给字段加上引号‘’，应该去掉主键，否则updata语句是这样：updata 'category' set 'id'='10','name'='电视机','sort_order'='30','parent_id'='8'
// 重点：匿名函数想要访问外部的数据，可以在函数名字后面使用use 外部变量 解决
$fields=array_map(function ($field) use ($data){
    return "`{$field}`='{$data[$field]}'"; // mysql中表需要用``括起来 ,mysql表中值需要用''括起来
},$fields);

$fields_str=implode(',',$fields); // 将数组内容按照指定符号（','）分开

$sql="update `{$table}` set {$fields_str} where {$pk}=$data[$pk]";
echo $sql; //update `category` set `name`='电视机',`sort_order`='30',`parent_id`='8' where id=10
