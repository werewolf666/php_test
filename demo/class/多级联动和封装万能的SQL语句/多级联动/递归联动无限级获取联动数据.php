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
$sql="select * from category";
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
var_dump($temp);
//foreach ($temp as $rows)
//    echo str_repeat('-',$rows['deep']*3),$rows['name'],'<br>'; //分层次显示
//?>
</body>
</html>