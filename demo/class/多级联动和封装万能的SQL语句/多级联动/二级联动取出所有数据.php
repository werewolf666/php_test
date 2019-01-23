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
$array=array();
while ($rows=mysql_fetch_assoc($rs)){
    $array[]=$rows;
}
echo '<ul>';
foreach ($array as $rows1){
    if ($rows1['parent_id']==0){
        echo '<li>'.$rows1['name'].$rows1['id'].'</li>'; //第一级
        echo '<ul>';
        foreach ($array as $rows2){
            if ($rows2['parent_id']==$rows1['id']){
                echo '<li>'.$rows2['name'].'</li>'; // 第二级
            }
        }
        echo '</ul>';
    }
}
echo '</ul>';
?>
</body>
</html>