<?php
mysql_connect('localhost','root','aa');
mysql_select_db('php4');
mysql_query('set names utf8');
$rs=mysql_query('select count(*) from products');
$rows=mysql_fetch_row($rs);
$recordcount=$rows[0];
$pagesize=10;
$pagecount=ceil($recordcount/$pagesize);
$pageno=isset($_GET['pageno'])?$_GET['pageno']:1;
$startno=($pageno-1)*$pagesize;
$sql="select * from products limit $startno,$pagesize";
$rs=mysql_query($sql);
$info=array();
while($rows=mysql_fetch_assoc($rs)){
	$info[]=$rows;
}
$info[]=$pagecount;	//将总页码保存到数组中
echo json_encode($info);