<?php
/**
 * ajax分页
 */
header('content-type:text/html,charset=utf8');
mysql_connect('localhost','root','root');
mysql_select_db('project');
mysql_query('set names uft-8');
$rs=mysql_query("select count(*) from category");
$rows=mysql_fetch_row($rs);
$recordcount=$rows[0];
$pagesize=2;
$pagecount=ceil($recordcount/$pagesize);//总页数
$pageno=isset($_GET['pageno'])?$_GET['pageno']:1;
$startno=($pageno-1)*$pagesize;
//sql语句
$sql="select * from category limit $startno,$pagesize";
$rs1=mysql_query($sql);
$info=array();
while($rows=mysql_fetch_assoc($rs1)){
    $info[]=$rows;
}
//var_dump($info);
$info[]=$pagecount;//
$str=json_encode($info);
echo $str;