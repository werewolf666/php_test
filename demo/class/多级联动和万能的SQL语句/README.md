一、增加多级联动

步骤：
1，创建省表，市表，县表(三级联动)，
思考：如何通过一个表实现无限极联动？
答：在一个表中增加父级id，联动
str_repeat(字符串，指定循环次数),将某个字符串循环多次

实现：递归联动取出所有数据

-------创建表-----------
drop table if exists category;
    create table category(
    id int unsigned auto_increment primary key comment 'id',
    name varchar(50) not null comment '类别名称',
    sort_order int not null default 50 comment '排序',
    parent_id int unsigned not null comment '父级id'
)engine=innodb charset=utf8;

-- 插入数据
insert into category values (1,'图像，音响，数字商品',default,0);
insert into category values (2,'家用电器',default,0);
insert into category values (3,'手机数码',default,0);
insert into category values (4,'电子书',default,1);
insert into category values (5,'数字音乐',default,1);
insert into category values (6,'励志',default,4);
insert into category values (7,'文学',default,4);
insert into category values (8,'家电',default,2);
insert into category values (9,'苹果',default,3);
insert into category values (10,'小米',default,3);

-- 取出数据
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
//连接数据库
$link=mysql_connect('localhost:3306','root','root');
mysql_select_db('project');
mysql_query('set names utf8');
// 获取数据
$sql="select * from category order by sort_order";
$rs=mysql_query($sql);
//将资源转成二维数组
$array=array();
while ($rows=mysql_fetch_assoc($rs)){
    $array[]=$rows;
}
//创建树型结构
function createTree($list,$parent_id=0,$deep=0){
    static $tree=array();
    foreach($list as $rows){
        if ($rows['parent_id']==$parent_id){
            $rows['deep']=$deep;
            $tree[]=$rows;
            createTree($list,$rows['id'],$deep+1);
        }
    }
    return $tree;
}
//测试
echo '<pre>';
$temp=createTree($array);
//var_dump($temp);
foreach ($temp as $rows)
    echo str_repeat('-',$rows['deep']*3),$rows['name'],'<br>'; //分层次显示
?>
</body>
</html>

------------------------------分割线----------------------------------

二、封装万能的SQL语句
通过数组存贮数据，将数组中的数据转换成SQL语句
1、万能的insert语句:

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

2、万能的update语句：
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