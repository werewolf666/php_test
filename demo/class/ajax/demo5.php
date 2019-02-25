<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link rel="stylesheet" type="text/css" href="style/common.css"/>
</head>

<body>
<?php
/**
 * ajax分页操作
 */
header('content-type:text/html,charset=utf8');
mysql_connect('localhost','root','root');
mysql_select_db('project');
mysql_query('set names uft-8');
//总记录数
$rs=mysql_query("select count(*) from category");
$rows=mysql_fetch_row($rs);
//总记录条数
$recordcount=$rows[0];
//页面大小
$pagesize=2;
//总页数
$pagecount=ceil($recordcount/$pagesize);//总页数
//当前页
$pageno=isset($_GET['pageno'])?$_GET['pageno']:1;
if ($pageno<1)
    $pageno=1;
if ($pageno>$pagecount)
    $pageno=$pagecount;
//计算起始位置
$startno=($pageno-1)*$pagesize;
//sql语句
$sql="select * from category limit $startno,$pagesize";
$rs1=mysql_query($sql);
?>
<table>
    <tr>
        <th>编号</th>
        <th>名称</th>
    </tr>
<?php while($rows=mysql_fetch_assoc($rs1)):?>
    <tr>
        <td><?php echo $rows['id']?></td>
        <td><?php echo $rows['name']?></td>
    </tr>
<?php endwhile;?>
    <tr>
        <td colspan="2">
        <?php
        for ($i=1;$i<=$pagecount;$i++){
            echo "<a href='javascript:void(0)' onclick='showList($i)'>{$i}</a>&nbsp;";
        }
        ?>
        </td>
    </tr>
</table>
</body>
</html>